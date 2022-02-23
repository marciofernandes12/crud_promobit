<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $values['products'] = Product::count();
        $values['tags'] = Tag::count();
        $values['table'] = DB::table('product')
            ->leftjoin('product_tag', function ($join) {
                $join->on('product.id', '=', 'product_tag.product_id');
            })->leftjoin('tag', function ($join) {
                $join->on('tag.id', '=', 'product_tag.tag_id');
            })
            ->select(DB::raw('COUNT(product.id) as total'), "tag.name")
            ->groupBy('tag.id')
            ->get();

        return view('home', ['values' => $values]);
    }
}
