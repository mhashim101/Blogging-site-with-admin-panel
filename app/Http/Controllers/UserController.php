<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // Homepage of site
    public function showHomePage(){
        // return view('Home.homepage');
        if(Auth::guest()){
            return view('Home.homepage');
        }else{
            return redirect()->route('dashboard');
        }
    }
    // Homepage of site
    public function showPostBlogPage(){
        // return view('Home.postblog');
        if(Auth::guest()){
            return view('Home.postblog');
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
         return view('addpost');
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
         return view('updatebyid');
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
