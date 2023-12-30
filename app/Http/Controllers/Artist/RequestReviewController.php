<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestReviewController extends Controller
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
     * Edit the given review.
     *
     * @param \App\Models\Request $review The review to be edited.
     * @return \Illuminate\View\View The view for editing the review.
     */
    public function edit(\App\Models\Request $review)
    {
        $review->load('client', 'product');

        return view('artist.request.review', compact('review'));
    }

    /**
     * Update the resource.
     *
     * @param Request $request the HTTP request object
     * @param \App\Models\Request $review the review model instance
     * @param mixed $type the type of the resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, \App\Models\Request $review, $type)
    {
        // TODO: admin can bypass the type, not updated to accepted but updated to finished directly, @see the route
        //       you can add more validation for this
        $review->update(['status' => $type]);

        return redirect()->back()->with('success', 'Berhasil memperbarui status.');
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
