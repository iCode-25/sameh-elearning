<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Card;
use App\Models\Level;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::latest()->get();
        $categories = Card::all();
        $news = News::orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        // $news = News::get();
        // dd($news);
        return view('front.pages.blog.index', get_defined_vars());
    }

    // public function details($slug)
    // {
    //     $categories = Level::all();
    //     $blog = Blog::where('slug', $slug)->first();
    //     if (!$blog) {
    //         abort(404);
    //     }
    //     $blogs = Blog::latest()->limit(5)->where('id', '!=', $blog->id)->get();
    //     return view('front.pages.blog.details', get_defined_vars());
    // }

    // public function category($slug)
    // {
    //     $category = Level::with('blogs')->where('slug', $slug)->first();

    //     if (!$category) {
    //         abort(404);
    //     }

    //     $categories = Level::all();
    //     return view('front.pages.blog.category', compact('category', 'categories'));
    // }



    // public function tag($tag_slug)
    // {
    //     $tag = Tag::where('slug', $tag_slug)->first();
    //     $blogs = Blog::query()->whereHas('tags', function ($q) use ($tag_slug) {
    //         $q->where('tags.slug', $tag_slug);
    //     })->get();
    //     $categories = Level::get();

    //     return view('front.pages.blog.tag', compact('blogs', 'tag', 'categories'));
    // }

}
