<?php

namespace App\Http\Controllers\Client;

use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ExploreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $query = Product::with('artist');

        // search by name if there is a query parameter
        if (request()->query('query')) {
            $query->where('name', 'like', '%' . request()->query('query') . '%');
        }

        $products = $query->paginate(10)->withQueryString();

        return view('client.explore.index', compact('products'));
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
     * Show the given product.
     *
     * @param Product $product The product to be shown.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The view for displaying the product.
     */
    public function show(Product $product)
    {
        return view('client.explore.show', compact('product'));
    }

    /**
     * Edit a product.
     *
     * @param Product $product The product to edit.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The view for the product edit form.
     */
    public function edit(Product $product)
    {
        return view('client.explore.form', compact('product'));
    }

    /**
     * Update a product.
     *
     * @param ExploreRequest $request The explore request object.
     * @param Product $product The product object.
     * @return \Illuminate\Http\RedirectResponse The redirect response object.
     */
    public function update(ExploreRequest $request, Product $product)
    {
        $product->requests()->create(array_merge($request->validated(), [
            'user_id'        => auth()->id(),
            'status'         => RequestStatus::PENDING,
            'requested_date' => now()->toDateTimeString(),
        ]));

        return redirect(route('client.explores.index'))->with('success', 'Berhasil mengirim request');
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
