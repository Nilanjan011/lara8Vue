<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{
    // all posts
    public function index()
    {
        $posts = Post::all()->toArray();
        return array_reverse($posts);
    }

    // add post
    public function add(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'image'=> 'required',
        ]);
        $image=$request->file('image');
		$ext=$image->extension();
		$file=time().'.'.$ext;
		// $image->move(public_path('images'),$file);
        $image->storeAs('ava',$file,'public'); // laravel storage use 

        $post = new Post([
            'title' => $request->input('title'),
            'image' => $file
        ]);
        $post->save();
        return response()->json('The post successfully added');
    //-------------------without image---------------------------
        // $post = new Post([
        //     'title' => $request->input('title'),
        //     'image' => $request->input('image')
        // ]);
        // $post->save();

        // return response()->json('The post successfully added');
    }

    // edit post
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    // update post
    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json('The post successfully updated');
    }

    // delete post
    public function delete($id)
    {
        $post = Post::find($id);
         
        // unlink(public_path('images/'.$post->image));
        storage::delete("./public/ava/$post->image");  /// use Illuminate\Support\Facades\Storage; ata add korte hobe
        $post->delete();

        return response()->json('The post successfully deleted');
    }
}
