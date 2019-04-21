<?php

namespace App\Http\Controllers;
use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index(){

        $popularPosts = Post::orderBy('views','desc')->take(3)->get();
        return view('FrontEnd.Layouts.home')->with('popularPosts',$popularPosts);
    }

    public function blogPage(){
        $posts=Post::orderBy('created_at', 'desc')->paginate(12);
        $latestPosts = Post::orderBy('id', 'desc')->take(4)->get();
        $categories=Category::all();
        return view('FrontEnd.Layouts.blog',['posts'=>$posts,'latestPosts'=>$latestPosts,'categories'=>$categories]);
    }

    public function SinglePost($slug){
        $post=Post::where('slug',$slug)->with('comments', 'comments.user')->first();
        $previous_id = Post::where('id','<',$post->id)->max('id');
        $next_id = Post::where('id','>',$post->id)->min('id');

        $next = Post::find($next_id);
        $previous = Post::find($previous_id);

         $latestPosts = Post::orderBy('id', 'desc')->take(4)->get();
         $categories=Category::all();
        //$articles =Post::where('slug',$slug)->with('comments', 'comments.user')->first();

        return view('FrontEnd.Layouts.singlepost',['Post'=>$post,'latestPosts'=>$latestPosts,'categories'=>$categories]) ->with('previous_id',$next)->with('next_id',$previous);
    }


    public function CategoriesPost($category_slug){
        $latestPosts = Post::orderBy('id', 'desc')->take(4)->get();
        $categories=Category::all();
        $category= Category::where('slug',$category_slug)->first();
        $posts = $category->posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('FrontEnd.Layouts.blog',['posts'=>$posts,'latestPosts'=>$latestPosts,'categories'=>$categories]);
    }

    public function Search(Request $request){

        $query= $request['query'];


        $posts = Post::Where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')->paginate(12);
        $latestPosts = Post::orderBy('id', 'desc')->take(4)->get();
        $categories=Category::all();


        return view('FrontEnd.Layouts.blog',['posts'=>$posts,'latestPosts'=>$latestPosts,'categories'=>$categories]);
    }
}
