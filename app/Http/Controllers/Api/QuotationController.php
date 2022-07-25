<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotation\StoreQuotationRequest;
use App\Http\Requests\Quotation\UpdateQuotationRequest;
use App\Http\Resources\Quotation\QuotationCollection;
use App\Http\Resources\Quotation\QuotationResource;
use App\Models\ProductQuotation;
use App\Models\Quotation;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new QuotationCollection(Quotation::with('productQuotation')->whereDate('date_quotation', Carbon::today())->get());
        //return new QuotationCollection(Quotation::with('productQuotation')->whereBetween('date_quotation', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        //dump(Carbon::now()->month);
        //return new QuotationCollection(Quotation::with('productQuotation')->whereMonth('date_quotation', Carbon::now()->month)->get());
        //return new QuotationCollection(Quotation::whereMonth('date_quotation', Carbon::now()->month)->get());
        return new QuotationCollection(Quotation::all()->sortByDesc('date_quotation'));
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
     * @param  \App\Http\Requests\StoreQuotationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotationRequest $request)
    {
        // $quotation = new Quotation;
        // $quotation->name_quotation = $request->name_quotation;
        // $quotation->price_quotation = $request->price_quotation;
        // $quotation->date_quotation = $request->date_quotation;
        // $quotation->expiration_date = $request->expiration_date;
        // $quotation->user_id = $request->user_id;
        // $quotation->branch_id = $request->branch_id;
        $validatedRequest = $request->validated();

        DB::beginTransaction();
        try {
            $quotation = Quotation::create($validatedRequest);

            foreach ($validatedRequest['product_quotations'] as $productQuotation)
            {
                $createdProductQuotation = new ProductQuotation($productQuotation);
                $createdProductQuotation->quotation()->associate($quotation);
                $createdProductQuotation->save();
            }

            DB::commit();
            return response()->json(['id' => $quotation->id], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new QuotationResource(Quotation::with('productQuotation', 'productQuotation.product:id,model_product,format_product')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuotationRequest  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotationRequest $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }

    public function quotationData()
    {
        $totalQuotations = Quotation::count();
        $totalSales = Sale::count();
        $salesWithQuotations = Sale::whereNotNull('quotation_id')->count();
        $ratioQuotationsSales = ($salesWithQuotations / $totalSales) * 100;
        return response()->json([
            'totalQuotations' => $totalQuotations,
            'totalSales' => $totalSales,
            'salesWithQuotations' => $salesWithQuotations,
            'ratioQuotationsSales' => $ratioQuotationsSales
        ]);
    }

    public function exportPDF($id)
    {
        $quotation = Quotation::with('productQuotation', 'productQuotation.product', 'branch')->findOrFail($id);

        $pdf = PDF::loadView('quotation', ['data' => $quotation]);

        return $pdf->download('quotation.pdf');
    }
}
