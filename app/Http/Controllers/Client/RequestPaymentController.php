<?php

namespace App\Http\Controllers\Client;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestPaymentController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Edit the specified request.
     *
     * @param  \App\Models\Request  $request The request to be edited.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response The view for editing the request.
     */
    public function edit(\App\Models\Request $request)
    {
        $request->load('product', 'client');

        return view('client.payment.payment', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $validation The request object containing the data to be validated
     * @param  \App\Models\Request  $request The request object representing the resource to be updated
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector The response indicating the update was successful
     */
    public function update(Request $validation, \App\Models\Request $request)
    {
        $request->payment()->create([
            "amount" => $request->sub_total,
            "status" => PaymentStatus::PAID,
        ]);

        return redirect(route('client.requests.ready-payment'))->with('success', 'Berhasil melakukan pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
