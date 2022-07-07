<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSale\StoreProductSaleRequest;
use App\Http\Requests\ProductSale\UpdateProductSaleRequest;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSale $productSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSale $productSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSaleRequest  $request
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSaleRequest $request, ProductSale $productSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSale $productSale)
    {
        //
    }

    public function stimateTime($id)
    {
        //$productSale = ProductSale::where('product_id', '=', $id)->get();
        for ($i = 1; $i <= Carbon::now()->month; $i++)
        {
            $productSale = ProductSale::where('product_id', '=', $id)->whereMonth('created_at', '=', $i)->sum('quantity');
            dump($productSale);
        }
        
        //dd(Carbon::now()->month(1));
        
    }

    public function totalQuotation(Request $request)
    {
        if ($request->has('period'))
        {
            if ($request->period == 'today')
            {
                $quotations = Quotation::whereDate('date_quotation', '=', Carbon::now()->toDateString())->count();
                $value = Quotation::whereDate('date_quotation', '=', Carbon::now()->toDateString())->sum('price_quotation');
                return response()->json(['numberOfQuotations' => $quotations, 'valueOfQuotations' => $value], 200);
            }

            if ($request->period == 'thisMonth')
            {
                $quotations = Quotation::whereMonth('date_quotation', '=', Carbon::today()->month)->count();
                $value = Quotation::whereMonth('date_quotation', '=', Carbon::today()->month)->sum('price_quotation');
                return response()->json(['numberOfQuotations' => $quotations, 'valueOfQuotations' => $value], 200);
            }

            if ($request->period == 'thisYear')
            {
                $quotations = Quotation::whereYear('date_quotation', '=', Carbon::today()->year)->count();
                $value = Quotation::whereYear('date_quotation', '=', Carbon::today()->year)->sum('price_quotation');
                return response()->json(['numberOfQuotations' => $quotations, 'valueOfQuotations' => $value], 200);
            }
        }
    }

    public function soldProducts(Request $request) 
    {

        if ($request->has('period'))
        {
            if ($request->period == 'today')
            {
                $data = [];
                $products = Product::get('id');
                $i = 0;
                foreach ($products as $product)
                {
                    $productName = Product::findOrFail($product, ['model_product']);
                    $productModel = $productName[0]->model_product;

                    $soldQuantity = ProductSale::whereDate('created_at', '=', Carbon::now()->toDateString())->where('product_id', '=', $product['id'])->sum('quantity');

                    $totalIncome = ProductSale::whereDate('created_at', '=', Carbon::now()->toDateString())->where('product_id', '=', $product['id'])->sum('total_price');

                    $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];


                    $i = $i +1;
                    //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
                }
                return response()->json($data);
            }

            if ($request->period == 'thisMonth')
            {
                $data = [];
                $products = Product::get('id');
                $i = 0;
                foreach ($products as $product)
                {
                    $productName = Product::findOrFail($product, ['model_product']);
                    $productModel = $productName[0]->model_product;

                    $soldQuantity = ProductSale::whereMonth('created_at', '=', Carbon::today()->month)->where('product_id', '=', $product['id'])->sum('quantity');

                    $totalIncome = ProductSale::whereMonth('created_at', '=', Carbon::today()->month)->where('product_id', '=', $product['id'])->sum('total_price');

                    $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];


                    $i = $i +1;
                    //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
                }
                return response()->json($data);
            }

            if ($request->period == 'thisYear')
            {
                $data = [];
                $products = Product::get('id');
                $i = 0;
                foreach ($products as $product)
                {
                    $productName = Product::findOrFail($product, ['model_product']);
                    $productModel = $productName[0]->model_product;

                    $soldQuantity = ProductSale::whereYear('created_at', '=', Carbon::today()->year)->where('product_id', '=', $product['id'])->sum('quantity');

                    $totalIncome = ProductSale::whereYear('created_at', '=', Carbon::today()->year)->where('product_id', '=', $product['id'])->sum('total_price');

                    $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];


                    $i = $i +1;
                    //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
                }
                return response()->json($data);
            }
        }

        $data = [];
        $products = Product::get('id');
        $i = 0;
        foreach ($products as $product)
        {
            $productName = Product::findOrFail($product, ['model_product']);
            $productModel = $productName[0]->model_product;

            $soldQuantity = ProductSale::where('product_id', '=', $product['id'])->sum('quantity');

            $totalIncome = ProductSale::where('product_id', '=', $product['id'])->sum('total_price');

            $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];


            $i = $i +1;
            //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
        }
        return response()->json($data);
    }

    public function bestSeller()
    {
        $data = [];
        $products = Product::get('id');
        $i = 0;
        foreach ($products as $product)
        {
            $productName = Product::findOrFail($product, ['model_product']);
            $productModel = $productName[0]->model_product;

            $soldQuantity = ProductSale::where('product_id', '=', $product['id'])->sum('quantity');

            $totalIncome = ProductSale::where('product_id', '=', $product['id'])->sum('total_price');

            $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];
            
            $i = $i +1;
            //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
        }

        return max($data);
    }

    public function leastSeller()
    {
        $data = [];
        $products = Product::get('id');
        $i = 0;
        foreach ($products as $product)
        {
            $productName = Product::findOrFail($product, ['model_product']);
            $productModel = $productName[0]->model_product;

            $soldQuantity = ProductSale::where('product_id', '=', $product['id'])->sum('quantity');

            $totalIncome = ProductSale::where('product_id', '=', $product['id'])->sum('total_price');

            $data[$i] = ['productModel' => $productModel, 'soldQuantity' => $soldQuantity, 'totalIncome' => $totalIncome];
            
            $i = $i +1;
            //dump (response()->json(['productModel' => $productModel, 'soldQuantity' => $soldQuantity]));
        }

        return min($data);
    }
}
