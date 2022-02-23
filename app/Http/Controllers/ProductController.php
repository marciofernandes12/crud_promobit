<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }


    public function create()
    {
        $tags = Tag::where('is_deleted', 0)->get();
        return view('form_products', ['tags' => $tags]);
    }


    public function store(Request $request)
    {
        $products = Product::where('name', $request->name)->first();
        if ($products) {
            toastr()->error('Produto já cadastrado!');
            return redirect(route('products@view'));
        }
        $product = new Product();
        $product->name = $request->name ?? "";
        $product->is_deleted = 0;
        $product->description = $request->description ?? "";
        $product->save();


        foreach ($request->tag as $key => $tag) {
            $product_tag = new ProductTag();
            $product_tag->product_id = $product->id;
            $product_tag->tag_id = $tag;
            $product_tag->save();
        }
        toastr()->success('Produto Cadastrado com Sucesso!');
        return  redirect(route('products@view'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('update_products', ['product' => $product]);
    }


    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->name ?? $product->name;
        $product->description = $request->description ?? $product->description;
        $product->save();
        toastr()->success('Produto Alterado com Sucesso!');
        return  redirect(route('products@view'));
    }

    public function destroy($id)
    {
        $product_tag = ProductTag::where('product_id', $id);
        $product_tag->delete();
        $product = Product::findOrFail($id);
        $product->delete();

        toastr()->success('Produto Deletado com Sucesso!');
        return  redirect(route('products@view'));
    }
}
