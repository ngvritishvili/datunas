<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use App\Http\Requests\StoreSmsRequest;
use App\Http\Requests\UpdateSmsRequest;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms = Sms::first();

        return view('admin.sms.index', compact('sms'));
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
    public function store(StoreSmsRequest $request)
    {
        Sms::create($request->validated());

        return redirect()->route('sms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSmsRequest $request, Sms $sms)
    {
        $sms->update($request->validated());

        return redirect()->route('sms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
