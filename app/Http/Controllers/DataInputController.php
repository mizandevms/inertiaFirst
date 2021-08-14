<?php

namespace App\Http\Controllers;

use App\Models\dataInput;
use Illuminate\Http\Request;

class DataInputController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataInput  $dataInput
     * @return \Illuminate\Http\Response
     */
    public function show(dataInput $dataInput)
    {
        dd($dataInput);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataInput  $dataInput
     * @return \Illuminate\Http\Response
     */
    public function edit(dataInput $dataInput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dataInput  $dataInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dataInput $dataInput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataInput  $dataInput
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataInput $dataInput)
    {
        //
    }
}
