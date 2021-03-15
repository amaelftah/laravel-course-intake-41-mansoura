<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($post)
    {
        $post = Post::find($post);
        // $post = Post::where('title', 'Javascript')->first(); //this makes limit 1 and returns first result  select * from posts where title = 'Javascript' limit 1;
        // $postsWithTitle = Post::where('title', 'Javascript')->get(); //this gets all results select * from posts where title = 'Javascript';

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(Request $myRequestObject)
    {
        $data = $myRequestObject->all();
        //$data = request()->all();
        // request()->title == $data['title']

        $myRequestObject->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required']
        ],[
            'title.required' => 'watch out the title is required dadasd',
        ]);

        Post::create($data);

        // Post::create($myRequestObject->all());

        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'id' => 1, //those will be ignore cause they aren't in fillable
        //     'ajsnhdoiqwjsd' => 'aikoshdiahsdui' //those will be ignore cause they aren't in fillable
        // ]);

        //with this syntax you don't need fillable
        // $post = new Post;
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->save();

        return redirect()->route('posts.index');
    }
}
