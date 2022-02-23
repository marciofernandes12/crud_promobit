<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tags = Tag::::all();
        return view('tags', ['tags' => $tags]);
    }


    public function create()
    {
        return view('form_tags');
    }


    public function store(Request $request)
    {
        $tags = Tag::where('name', $request->name)->first();
        if ($tags) {
            toastr()->error('Tag já cadastrada!');
            return  redirect(route('tags@view'));
        }
        $tag = new Tag();
        $tag->name = $request->name ?? "";
        $tag->is_deleted = 0;
        $tag->description = $request->description ?? "";
        $tag->save();
        toastr()->success('Tag Cadastrada com Sucesso!');
        return  redirect(route('tags@view'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('update_tags', ['tag' => $tag]);
    }


    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name ?? $tag->name;
        $tag->description = $request->description ?? $tag->description;
        $tag->save();
        toastr()->success('Tag Alterada com Sucesso!');
        return  redirect(route('tags@view'));
    }

    public function destroy($id)
    {
        $product_tag = ProductTag::where('tag_id', $id);
        $product_tag->delete();
        $tag = Tag::findOrFail($id);
        $tag->delete();
        toastr()->success('Tag Deletada com Sucesso!');
        return  redirect(route('tags@view'));
    }
}
