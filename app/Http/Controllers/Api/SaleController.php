<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleCollection;
use App\Http\Resources\Sale\SaleResource;
use App\Models\ProductSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('branch')) {
            if ($request->filled('branch')) {
                if ($request->branch == 1) {
                    return new SaleCollection(Sale::all()->sortByDesc('date_sale'));
                }
                return new SaleCollection(Sale::where('branch_id', '=', $request->branch)->get()->sortByDesc('date_sale'));
            }
        }
        //return Sale::whereMonth('date_sale', '=', 6)->sum('total_sale');
        //return Sale::whereDay('date_sale', '=', Carbon::now()->today())->sum('total_sale');
    }

    public function dateSales($id)
    {
        $todaySales = Sale::whereDay('date_sale', '=', Carbon::now()->today())->where('branch_id', '=', $id)->sum('total_sale');
        $numberTodaySales = Sale::whereDay('date_sale', '=', Carbon::now()->today())->where('branch_id', '=', $id)->count();
        //$thisWeekSales = Sale::whereBetween('date_sale', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('branch_id', '=', $id)->sum('total_sale');
        $thisMonthSales = Sale::whereMonth('date_sale', '=', Carbon::now()->month)->where('branch_id', '=', $id)->sum('total_sale');
        $numberMonthSales = Sale::whereMonth('date_sale', '=', Carbon::now()->month)->where('branch_id', '=', $id)->count();

        $thisYearSales = Sale::whereYear('date_sale', '=', Carbon::now()->year)->where('branch_id', '=', $id)->sum('total_sale');
        $numberYearSales = Sale::whereYear('date_sale', '=', Carbon::now()->year)->where('branch_id', '=', $id)->count();
        return response()->json([
            'today' => [$todaySales, $numberTodaySales],
            //'week' => $thisWeekSales,
            'month' => [$thisMonthSales, $numberMonthSales],
            'year' => [$thisYearSales, $numberYearSales],
        ]);
    }

    public function salesMonth($id, Request $request)
    {

        if ($request->has('from')) {
            if ($request->filled('from')) {
                if ($request->from = 'all') {
                    $currentMonth = Carbon::now()->month;
                    $data = [];
                    for ($i = 1; $i <= $currentMonth; $i++) {
                        $monthSales = Sale::whereMonth('date_sale', '=', $i)->sum('total_sale');
                        //$data[$i - 1] = ['month' => Carbon::now()->subMonth($currentMonth - $i)->monthName, 'sales' => $monthSales];
                        $data[$i - 1] = ['month' => Carbon::now()->subMonth($currentMonth - $i)->month, 'sales' => $monthSales];
                        //dump([$monthSales, Carbon::now()->subMonth($currentMonth - $i)->monthName]);
                    }
                    return response()->json($data);
                }
            }
        }
        $currentMonth = Carbon::now()->month;
        //$period = now()->subMonths(12)->monthsUntil(now());
        // $period = now()->addMonth(12)->monthsUntil(now());
        // dump($period);
        // foreach ($period as $date)
        // {
        //     dump($date->monthName);
        // }
        $data = [];
        for ($i = 1; $i <= $currentMonth; $i++) {
            $monthSales = Sale::whereMonth('date_sale', '=', $i)->where('branch_id', '=', $id)->sum('total_sale');
            $data[$i - 1] = ['month' => Carbon::now()->subMonth($currentMonth - $i)->monthName, 'sales' => $monthSales];
            //dump([$monthSales, Carbon::now()->subMonth($currentMonth - $i)->monthName]);
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $validatedRequest = $request->validated();

        DB::beginTransaction();
        try {
            $sale = Sale::create($validatedRequest);

            foreach ($validatedRequest['product_sales'] as $productSale) {
                $newProductSale = new ProductSale($productSale);
                $newProductSale->sale()->associate($sale);
                $newProductSale->save();
            }

            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
        
        return $sale;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return new SaleResource(Sale::with('productSale')->findOrFail($id));
        return new SaleResource(Sale::with('productSale', 'productSale.product')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
