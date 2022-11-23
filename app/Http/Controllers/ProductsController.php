<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Products::all();
        return Inertia::render('Products/Index', ['products' => $products]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $products = new Iroducts([
            'title' => $request->get('title'),
            'description' => $request->get('description')
          ]);
          $products->save();
          dd($request);
          return response()->json('Successfully added');
        // Validator::make($request->all(), [
        //     'title' => ['required'],
        //     'description' => ['required'],
        // ])->validate();

        // dd($request);
        // Products::create($request->all());
        // return redirect()->route('products.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Products $Products)
    {
        return Inertia::render('Products/Edit', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        Post::find($id)->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Show the form for creating a new resource.
     * delete item
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('products.index');
    }
}
