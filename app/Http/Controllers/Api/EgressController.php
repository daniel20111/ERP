<?php

namespace App\Http\Controllers;

use App\Http\Requests\Egress\StoreEgressRequest;
use App\Http\Requests\Egress\UpdateEgressRequest;
use App\Models\Egress;

class EgressController extends Controller
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
     * @param  \App\Http\Requests\StoreEgressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEgressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function show(Egress $egress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function edit(Egress $egress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEgressRequest  $request
     * @param  \App\Models\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEgressRequest $request, Egress $egress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egress $egress)
    {
        //
    }
}
