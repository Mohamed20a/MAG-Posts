<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $post = Post::all();

        return view('home.index', compact('post'));

    }


    // Upload Post
    public function uploaded(Request $request) {

        $data = new Post;

        $data ->username= Auth::user()->name;
        $data ->description = $request->description;

        $image = $request->image;

        if($image){

        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('posts', $image_name);

        $data->image = $image_name;

        }

        $data->save();

        return redirect()->back();

    }

    // View Posts
    public function view() {

        $name = Auth::user()->name;

        $post = Post::where('username', '=', $name)->get();

        return view('post-page', compact('post'));

    }

    // Delete Post
    public function delete($id) {

        $data = Post::find($id);

        $data -> delete();

        return redirect()->back();

    }

    // Update Post
    public function update($id) {

        $data = Post::find($id);

        $data -> update();

        return view('update-post', compact('data'));

    }

    // confirm Post
    public function confirm(Request $request, $id) {

        $data = Post::find($id);

        $data ->description = $request->description;

        $image_upload = $request->image;

        if($image_upload){

        $image_name = time() . '.' . $image_upload->getClientOriginalExtension();
        $request->image->move('posts', $image_name);

        $data->image = $image_name;

        }

        $data->save();

        return redirect()->back();

    }

}
