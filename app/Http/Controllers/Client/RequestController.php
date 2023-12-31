<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Retrieve the view for the client request history.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function history()
    {
        return view('client.request.history');
    }

    /**
     * The readyPayment function returns a view for the 'client.request.ready-payment' template.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function readyPayment()
    {
        return view('client.request.ready-payment');
    }

    /**
     * Get the active request view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function active()
    {
        return view('client.request.active');
    }

    /**
     * Returns the view for the ready to review page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function readyReview()
    {
        return view('client.request.ready-review');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('client.request.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
