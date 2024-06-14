<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shipping;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingRequest;
use App\Http\Requests\UpdateShippingRequest;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
