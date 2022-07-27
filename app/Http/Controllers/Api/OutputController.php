<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Output\StoreOutputRequest;
use App\Http\Requests\Output\UpdateOutputRequest;
use App\Models\Output;

class OutputController extends Controller
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
     * @param  \App\Http\Requests\StoreOutputRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutputRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function show(Output $output)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function edit(Output $output)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutputRequest  $request
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutputRequest $request, Output $output)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function destroy(Output $output)
    {
        //
    }
}
