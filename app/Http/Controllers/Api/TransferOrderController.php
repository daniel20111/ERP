<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TransferOrder\StoreTransferOrderRequest;
use App\Http\Requests\TransferOrder\UpdateTransferOrderRequest;
use App\Models\TransferOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransferOrder\TransferOrderCollection;
use App\Http\Resources\TransferOrder\TransferOrderResource;

use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use MathPHP\LinearAlgebra\Vector;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Average;
use MathPHP\Statistics\Descriptive;

class TransferOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TransferOrderCollection(TransferOrder::with('transfer', 'transfer.branch', 'transfer.user', 'transfer.user.employee', 'transfer.user.role')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransferOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TransferOrderResource(TransferOrder::with(
            'transfer',
            'transfer.branch',
            'transfer.user',
            'transfer.user.employee',
            'transfer.user.role',
            'transfer.product_transfers',
            'transfer.product_transfers.product',
            'sent_by_user',
            'sent_by_user.employee',
            'sent_by_user.role',
            'received_by_user',
            'received_by_user.employee',
            'received_by_user.role',
        )->findOrFail($id));
        //return TransferOrder::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransferOrderRequest  $request
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransferOrderRequest $request, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferOrder $transferOrder)
    {
        //
    }

    public function register_transfer(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $transfer_order = TransferOrder::findOrFail($id);
            if ($transfer_order->send_date != null) {
                throw new Exception('Registro ya modificado');
            }
            $transfer_order->sent = true;
            $transfer_order->send_date = now();
            $transfer_order->sent_by_user()->associate($request->user());
            $transfer_order->save();
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (Exception $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    public function register_reception(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $transfer_order = TransferOrder::findOrFail($id);

            if ($transfer_order->received_date != null) {
                throw new Exception('Registro ya modificado');
            }
            $transfer_order->received = true;
            $transfer_order->received_date = now();
            $transfer_order->received_by_user()->associate($request->user());
            $transfer_order->save();
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    public function try($Z)
    {
        // $standard_normal = new Continuous\StandardNormal();
        // $pdf = $standard_normal->pdf($Z);
        // $cdf = $standard_normal->cdf($Z);
        // $mean = $standard_normal->mean();
        // $variance = $standard_normal->variance();
        // return ([$mean, $variance, $pdf, $cdf]);
        $standard_desviation = 7;
        $mean = 15;
        $normal = new Continuous\Normal($mean, $standard_desviation);

        $a = 10;
        $b = 100;
        $uniform = new Continuous\Uniform($a, $b);

        $lamda = 0.6;
        $exponential = new Continuous\Exponential($lamda);


        $data_normal = array();
        for ($i = 0; $i < 100; $i++) {
            $random = $normal->rand();

            array_push($data_normal, $random);
        }

        $data_exponential = array();
        for ($i = 0; $i < 100; $i++) {
            $random = $exponential->rand();

            array_push($data_exponential, $random);
        }

        $data_uniform = array();
        for ($i = 0; $i < 100; $i++) {
            $random = $uniform->rand();

            array_push($data_uniform, $random);
        }

        $example = [1.9, 2.3, 3.3, 3.4, 4.5, 4.5, 4.8, 4.8, 5.6, 6.0];
        $example2 = [75, 92, 80, 80, 84, 72, 84, 77, 81, 77, 75, 81, 80, 92, 72, 77, 78, 76, 77, 86, 77, 92, 80, 78, 68, 78, 92, 68, 80, 81, 87, 76, 80, 87, 77, 86];

        dump([
            TransferOrderController::kolmogorov($example2, 'normal'),
            TransferOrderController::kolmogorov($example2, 'uniform'),
            TransferOrderController::kolmogorov($example2, 'exponential'),
            TransferOrderController::kolmogorov($example2, 'standard')
        ]);

        // dump($data_normal);
        // dump($data_exponential);
        // dump($data_uniform);

        // dump([
        //     TransferOrderController::kolmogorov($data_normal, 'normal'),
        //     TransferOrderController::kolmogorov($data_normal, 'uniform'),
        //     TransferOrderController::kolmogorov($data_normal, 'exponential')
        // ]);

        // dump([
        //     TransferOrderController::kolmogorov($data_exponential, 'normal'),
        //     TransferOrderController::kolmogorov($data_exponential, 'uniform'),
        //     TransferOrderController::kolmogorov($data_exponential, 'exponential')
        // ]);

        // dump([
        //     TransferOrderController::kolmogorov($data_uniform, 'normal'),
        //     TransferOrderController::kolmogorov($data_uniform, 'uniform'),
        //     TransferOrderController::kolmogorov($data_uniform, 'exponential')
        // ]);

    }

    function empiric_acumulative_probability_positive($number_elements)
    {
        $empiric_positive = array();

        for ($i = 1; $i <= $number_elements; $i++) {
            $probability = $i / $number_elements;
            array_push($empiric_positive, $probability);
        }
        $empiric_vector = new Vector($empiric_positive);

        return $empiric_vector;
    }

    function empiric_acumulative_probability_negative($number_elements)
    {
        $empiric_positive = array();

        for ($i = 1; $i <= $number_elements; $i++) {
            $probability = ($i - 1) / $number_elements;
            array_push($empiric_positive, $probability);
        }
        $empiric_vector = new Vector($empiric_positive);

        return $empiric_vector;
    }


    public function kolmogorov(array $data, $distribution)
    {
        $empiric_probability_positive = TransferOrderController::empiric_acumulative_probability_positive(count($data));
        $empiric_probability_negative = TransferOrderController::empiric_acumulative_probability_negative(count($data));

        switch ($distribution) {
            case 'uniform':
                $uniform_probability = TransferOrderController::uniform_distribution($data);
                $is_uniform = TransferOrderController::calculated_statistic($empiric_probability_positive, $empiric_probability_negative, $uniform_probability);
                return $is_uniform ? 'Es uniforme' : 'No es unifome';
                break;
            case 'exponential':
                $exponential_probability = TransferOrderController::exponential_distribution($data);
                $is_exponential = TransferOrderController::calculated_statistic($empiric_probability_positive, $empiric_probability_negative, $exponential_probability);
                return $is_exponential ? 'Es Exponencial' : 'No es exponencial';
                break;
            case 'normal':
                $normal_probability = TransferOrderController::normal_distribution($data);
                $is_normal = TransferOrderController::calculated_statistic($empiric_probability_positive, $empiric_probability_negative, $normal_probability);
                return $is_normal ? 'Es normal' : 'No es Normal';
                break;
            case 'standard':
                $standard_probability = TransferOrderController::standard_normal_distribution($data);
                $is_standard_normal = TransferOrderController::calculated_statistic($empiric_probability_positive, $empiric_probability_negative, $standard_probability);
                return $is_standard_normal ? 'Es noraml estandar' : 'No es normal estandar';
                break;
            default:
                break;
        }
    }

    public function calculated_statistic(Vector $empiric_positive, Vector $empiric_negative, Vector $calculated)
    {
        $difference_positive = $empiric_positive->subtract($calculated);

        $max_positive = $difference_positive->max();
        $min_positive = $difference_positive->min();

        $max_abs_positive = abs((float)($max_positive));
        $min_abs_positive = abs((float)($min_positive));

        $difference_negative = $calculated->subtract($empiric_negative);

        $max_negative = $difference_negative->max();
        $min_negative = $difference_negative->min();

        $max_abs_negative = abs((float)($max_negative));
        $min_abs_negative = abs((float)($min_negative));

        dump([$max_abs_positive, $max_abs_negative, $min_abs_positive, $min_abs_negative]);
        $d_calculated = max([$max_abs_positive, $max_abs_negative, $min_abs_positive, $min_abs_negative]);
        dump($d_calculated);
        $d_kolmogorv = 1.36 / sqrt($empiric_positive->count());


        if ($d_calculated < $d_kolmogorv) {
            return true;
        } else {
            return false;
        }
    }

    public function uniform_distribution(array $data)
    {
        sort($data);
        $data_vector = new Vector($data);
        $a = $data_vector->min();
        $b = $data_vector->max();

        $uniform = new Continuous\Uniform((float)$a, (float)$b);

        $cdf = array();

        foreach ($data as $datum) {
            array_push($cdf, $uniform->cdf($datum));
        }

        $CDF = new Vector($cdf);

        return $CDF;
    }

    public function normal_distribution(array $data)
    {
        sort($data);
        $sd = Descriptive::sd($data);
        $mean = Average::mean($data);

        $normal = new Continuous\Normal($mean, $sd);

        $cdf = array();
        foreach ($data as $datum) {
            array_push($cdf, $normal->cdf($datum));
        }

        $CDF = new Vector($cdf);

        return $CDF;
    }

    public function exponential_distribution(array $data)
    {
        sort($data);
        $mean = Average::mean($data);
        $lamda = 1 / $mean;

        $exponential = new Continuous\Exponential($lamda);

        $cdf = array();
        foreach ($data as $datum) {
            array_push($cdf, $exponential->cdf($datum));
        }

        $CDF = new Vector($cdf);

        return $CDF;
    }

    public function standard_normal_distribution(array $data)
    {
        sort($data);
        $sd = Descriptive::sd($data);
        $mean = Average::mean($data);

        dump(['Media: ', $mean]);
        dump(['Desviacion Estandar: ', $sd]);
        $Z = array();

        foreach ($data as $datum) {
            array_push($Z, ($datum - $mean) / $sd);
        }

        $standard_normal = new Continuous\StandardNormal();

        $cdf = array();
        foreach ($Z as $z) {
            array_push($cdf, $standard_normal->cdf($z));
        }

        $CDF = new Vector($cdf);

        return $CDF;
    }

    final function eoq($ch, $c0, $demand, $time, $inventoryCost, array $data, $distribution)
    {
        $Q = sqrt(($time * $c0 * $demand) / $ch);

        switch($distribution)
        {
            case 'normal':
                sort($data);
                $sd = Descriptive::sd($data);
                $mean = Average::mean($data);
                $normal = new Continuous\Normal($mean, $sd);

                $sample_mean = $demand  / 12;
                $sample_sd = $sd / sqrt(12);

                $ip = ($ch * $demand) / ($inventoryCost * $demand);

                $icdf = $normal->inverse($ip);

                $R = ($icdf * $sample_sd) - $sample_mean;

                return [$Q, $R];
                break;
            case 'uniform':
                //TODO
                break;
            case 'exponential':
                //TODO
                break;  
        }
    }
}
