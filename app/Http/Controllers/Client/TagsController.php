<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Tag;

class TagsController extends Controller
{
    public function show($id)
    {
        $recent_articles    = DB::table('articles')->orderBy('id', 'DESC')->limit(2)->get();
        $categories         = DB::table('categories')->get();
        $tags               = DB::table('tags')->get();
        $tag           = Tag::find($id);
        return view('client.tags.show_article')->with([
            'tag'               => $tag,
            'recent_articles'   => $recent_articles,
            'categories'        => $categories,
            'tags'              => $tags
        ]);
    }
}
