<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::get();
        return new ArticleCollection($article);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          "title" => "required|min:3",
          "body" => "required|min:10",
          "subject_id" => "required"
        ]);

        $article = auth()->user()->articles()->create([
          "title" => $request->title,
          "slug" => \Str::slug($request->title),
          "body" => $request->body,
          "subject_id" => $request->subject_id
        ]);

        return response($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article = Article::where("slug",$id)->first();
      return new ArticleResource($article);
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
        $request->validate([
          "title" => "required",
          "subject_id" => "required",
          "body" => "required"
        ]);

        $article = Article::find($id);
        $article->update([
          "title" => $request->title,
          "body" => $request->body,
          "slug" => \Str::slug($request->title),
          "subject_id" => $request->subject_id
        ]);

        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return response("Success Delete Article");
    }
}
