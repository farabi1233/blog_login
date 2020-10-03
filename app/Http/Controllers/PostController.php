<?php

namespace App\Http\Controllers;
use Session;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

   
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            // 'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            
        }
        
        $post->save();
        Session::flash('success', 'Post Create successfully');
        return redirect()->back();

       
        
    }

    
    public function show(Post $post)
    {
        //
    }

   
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact(['post','categories']));

    }

  
    public function update(Request $request, Post $post)
    {

        
        $this->validate($request, [
            'title' => 'required|unique:posts,title, $post->id',
            'description' => 'required',
            'category' => 'required',
        ]);         
        
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->category_id = $request->category;
            $post->description = $request->description;
           
        

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            
        }
        $post->save();
        Session::flash('success', 'Post Update successfully');
        return redirect()->back();

    }

    
    public function destroy(Post $post)
    {
        if($post)
            if(file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }
        
            $post->delete();
            Session::flash('success', 'Post Deleted successfully');
            return redirect()->back();


            
    }
}
