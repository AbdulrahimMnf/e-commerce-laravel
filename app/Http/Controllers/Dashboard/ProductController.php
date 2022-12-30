<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.products.index',
            [
                'products' => Product::with('Category')->latest()->paginate(3)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'dashboard.products.create',
            [
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:250',
                'category_id' => 'required|integer',
                'price' => 'required',
            ]
        );
        $file = $request->file('image');
        $filename =  time() . $file->getClientOriginalName();
        $file->move('uploads/products/', $filename);

        Product::create(
            [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'topic' => $request->topic,
                'image' => 'uploads/products/' . $filename,
                'price' => $request->price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->title, '-')
            ]
        );
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        return view(
            'dashboard.products.show',
            [
                'Product' => $Product
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        return view(
            'dashboard.products.edit',
            [
                'categories' => Category::all(),
                'product' => $Product
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
        $request->validate(
            [
                'title' => 'required|max:250',
                'category_id' => 'required|integer',
                'price' => 'required',
            ]
        );
        $Product->fill($request->post())->update();
        $Product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('products.index');
    }
}
