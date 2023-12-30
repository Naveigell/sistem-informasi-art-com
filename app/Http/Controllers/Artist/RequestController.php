<?php

namespace App\Http\Controllers\Artist;

use App\Enums\PaymentStatus;
use App\Enums\RequestStatus;
use App\Enums\RequestType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the finish resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function finish()
    {
        $requests = \App\Models\Request::whereIn('status', [RequestStatus::FINISHED])
            ->whereHas('payment', function ($query) {
                $query->where('status', PaymentStatus::PAID);
            })
            ->whereHas('product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->latest()
            ->with('product.artist', 'client')
            ->paginate(10);

        return view('artist.request.finish', compact('requests'));
    }

    /**
     * Display a listing of the request resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function active()
    {
        $requests = \App\Models\Request::whereIn('status', [RequestStatus::APPROVED])
            ->whereHas('payment', function ($query) {
                $query->where('status', PaymentStatus::PAID);
            })
            ->whereHas('product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->latest()
            ->with('product.artist', 'client')
            ->paginate(10);

        return view('artist.request.active', compact('requests'));
    }

    /**
     * Display a listing of the incoming resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function incoming()
    {
        $requests = \App\Models\Request::whereIn('status', [RequestStatus::PENDING, RequestStatus::REJECTED])
            ->whereHas('product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->latest()
            ->with('product.artist', 'client')
            ->paginate(10);

        return view('artist.request.incoming', compact('requests'));
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
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(\App\Models\Request $request)
    {
        $request->delete();

        return redirect()->back()->with('success', 'Request berhasil dihapus');
    }
}
