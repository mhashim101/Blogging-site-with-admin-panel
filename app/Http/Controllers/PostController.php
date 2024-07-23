<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $user = Auth::user();
        $post = Post::with('user')->where('user_id',$user->id)->paginate(4);
        return view('allposts',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|numeric',
            'category_id' => 'nullable|numeric',
            'image' => 'nullable|image', // Assuming 'image' is a file upload field
        ]);

        
        // Initialize $imagePath variable
        $imagePath = null;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() .'_'. $image->getClientOriginalName();
            $image->move(public_path('img'),$imageName);
            $imagePath = 'img/'. $imageName;
        }
        // return gettype($request->user_id);
        // $user_id = (int) $request->user_id;
        if(Auth::check()){
            // $user_id = Auth::user()->id;
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'image' => $imagePath,
            ]);
        }

        if ($post) {
            // Redirect to a specific route (e.g., login page) after successful registration
            return redirect()->route('post.index',$post->id)->with('success', 'Successful Posted!');
        } else {
            // Handle registration failure if necessary
            return redirect()->back()->withInput()->withErrors(['error' => 'Your post is Unsuccessfully not posted. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('user')->find($id);

        // Return the view with the post data
        return view('viewpost', compact('post'));
        // return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::with('user','category')->find($id);
        return view('updatepost',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($postId, Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric',
            'image' => 'nullable|image', // Make image nullable since it's not always required
        ]);
        
        // Find the post by ID
        $post = Post::with('user')->find($postId); // Replace $postId with the actual ID of the post
        // return $post->image;
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        
         
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
           File::delete(public_path('img/'.$post->image));

            $image = $request->file('image');
            $imageName = time() .'_'. $image->getClientOriginalName();
            $image->move(public_path('img'),$imageName);
            $imagePath = 'img/'.$imageName;
            $post->image = $imagePath;
            $post->save();
        }
       
        // Redirect with success message
        return redirect()->route('post.show', $post->id)->with('success', 'Post successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            File::delete(public_path('img/'.$post->image));
        }
        $post->delete();
        return redirect()->route('post.index')->with('success','Post Successfully Deleted!');
    }


    // Cutom Mehtod

    public function showPostById(Request $request){
        $request->validate([
            'id' => 'required|numeric',
        ]);
        $id = Auth::user()->id;
        $categories = Category::all();
        $post = Post::where('user_id',$id)->find($request->id);
        // dd($post,$categories);
        return view('updateById',compact(['post','categories']));
    }

    public function showPostOnDelete(Request $request){
        $request->validate([
            'id' => 'required|numeric',
        ]);
        $id = Auth::user()->id;
        $post = Post::where('user_id',$id)->find($request->id);
        // return $post;
        if(isset($post)){
            return view('deletebyid',['post'=>$post]);
        }else{
            return redirect()->route('updateById')->with('error', 'Post not found.');
        }
    }

    public function destroyById($id)
    {

        $post = Post::find($id);
        if ($post->image) {
            File::delete(public_path('img/'.$post->image));
        }
        $post->delete();
        return redirect()->route('post.index')->with('success','Post Successfully Deleted!');
    }
}
