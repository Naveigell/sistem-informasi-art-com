<?php

namespace App\Http\Controllers\Client;

use App\Enums\RequestStatus;
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
        $requests = \App\Models\Request::whereHas('client', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
            ->latest()
            ->where('status', RequestStatus::PENDING)
            ->with('client', 'product')
            ->paginate(10);

        return view('client.request.history', compact('requests'));
    }

    /**
     * The readyPayment function returns a view for the 'client.request.ready-payment' template.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function readyPayment()
    {
        $requests = \App\Models\Request::whereHas('client', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
            ->whereDoesntHave('payment')
            ->latest()
            ->where('status', RequestStatus::APPROVED)
            ->with('client', 'product')
            ->paginate(10);

        return view('client.request.ready-payment', compact('requests'));
    }

    /**
     * Get the active request view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function active()
    {
        $requests = \App\Models\Request::whereHas('client', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
            ->has('payment')
            ->latest()
            ->where('status', RequestStatus::APPROVED)
            ->with('client', 'product')
            ->paginate(10);

        return view('client.request.active', compact('requests'));
    }

    /**
     * Returns the view for the ready to review page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function readyReview()
    {
        $requests = \App\Models\Request::whereHas('client', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
            ->has('payment')
            ->latest()
            ->where('status', RequestStatus::FINISHED)
            ->with('client', 'product')
            ->paginate(10);

        return view('client.request.ready-review', compact('requests'));
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
     * @param  \App\Models\Request  $request  The request model instance
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response  The view for displaying the specified resource
     */
    public function show(\App\Models\Request $request)
    {
        $request->load('product', 'client');

        return view('client.request.show', compact('request'));
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
     * @param \Illuminate\Http\Request $validation The request object that holds the data to be validated.
     * @param \App\Models\Request $request The request model that represents the resource to be updated.
     * @param string $type The new status value for the resource.
     * @return \Illuminate\Http\RedirectResponse The redirect response after the resource has been updated.
     */
    public function update(Request $validation, \App\Models\Request $request, $type)
    {
        $request->update(["status" => $type]);

        return redirect(route('client.requests.history'))->with('success', 'Request berhasil diubah');
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
