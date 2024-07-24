<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Homepage of site
    public function showHomePage(){
        if(Auth::guest()){
            $categories = Category::all();
            $latestPost = Post::orderBy('created_at', 'desc')->first();
            $posts = Post::with('user','category')->paginate(4);
            return view('Home.homepage',compact(['posts','latestPost','categories']));
        }else{
            return redirect()->route('dashboard');
        }
    }
    // Homepage of site
    public function showPostBlogPage(){
        if(Auth::guest()){
            // $post = Post::with('user','category')->where('id',$id)->get();
            return view('Home.postblog');
        }else{
            return redirect()->route('dashboard');
        }
    }
    // Homepage of site
    public function showBlogPosts($id){
        if(Auth::guest()){
            $posts = Post::with('user','category')->where('id',$id)->get();
            $comments = Comment::where('post_id',$id)->get();
            if($comments){
                return view('Home.postblog',compact(['posts','comments']));
            }
            return view('Home.postblog',compact('posts'));
        }else{
            return redirect()->route('dashboard');
        }
    }
     // Show registration form
     public function showRegistrationForm()
     {  
        if(Auth::guest()){
            return view('register');
        }else{
            return redirect()->route('dashboard');
        }
     }

     // Show login form
     public function showLoginForm()
     {
        // return view('login');
        if(Auth::guest()){
            return view('login');
        }else{
            return redirect()->route('dashboard');
        }
         
     }
     // Show dashboard form
     public function dashboardPage()
     {
         return view('dashboard');
     }
     // Show dashboard form
     public function showAllUsersPage()
     {
        $users  = User::where('id','!=',Auth::user()->id)->paginate(5);
         return view('allusers',compact('users'));
     }
     // Show addPostPage form
     public function addPostPage()
     {
        $categories = Category::all();
         return view('addpost',compact('categories'));
     }
     // Show showCategoriesPage
     public function showCategoriesPage()
     {  
        $categories = Category::all();
         return view('categories',compact('categories'));
     }
     // Show Categories on Addpost page
    //  public function showCategoriesOnAddPostPage()
    //  {  
    //     $categories = Category::all();
    //      return view('addpost',compact('categories'));
    //  }
    //  // Show showAddCategoryPage
     public function showAddCategoryPage()
     {
         return view('addcategory');
     }
     // Show showAddCategoryPage
     public function addcategory(Request $request)
     {
        $request->validate([
            'name' => 'required|string',
        ]);
        $categories = Category::create([
            'name' => $request->name,
        ]);
        if($categories){
            return redirect()->route('categories')->with('success','Category Successfully Added!');
        }
     }

    //  Delete Category
    public function destroyCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('success','Post Successfully Deleted!');
    }
     // Show allPostsPage form
     public function allPostsPage()
     {
         return view('allposts');
     }
     // Show deletePostPage form
     public function deletePostPage()
     {
         return view('deletebyid');
     }
     // Show updatePostPage form
     public function updatePostPage()
     {
         return view('updatepost');
     }
     // Show Upate post by Id form
     public function updateById()
     {
        $categories = Category::all();
         return view('updateById',compact('categories'));
     }
 
     // Show viewPostPage form
     public function viewPostPage()
     {
         return view('viewpost');
     }
 
     // Handle registration form submission
     public function register(Request $request)
     {
         // Validate the form data
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'role' => 'string',
             'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
         
         if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName); // Move the image to public/img directory
            $imagePath = 'img/' . $imageName; // Relative path to store in the database
        }

         // Create a new user record
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'profile' => $imagePath,
         ]);
         
         if ($user) {
            // Redirect to a specific route (e.g., login page) after successful registration
            return redirect()->route('loginPage')->with('success', 'Registration successful!');
        } else {
            // Handle registration failure if necessary
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
         
     }


     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    // Logout method
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
