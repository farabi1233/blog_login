<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Session;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category:: orderBy('created_at','DESC')->paginate(20);
        return view('admin.category.index', compact('categories'));

    }
    public function create()
    {
        return view('admin.category.create');

    }

    
    public function store(Request $request)
    {
               
              // validation
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
        ]);

        Session::flash('success', 'Category created successfully');
        
        return redirect()->back();
    }

   
    public function show(Category $category)
    {
        return "show page";
    }

    public function edit(Category $category)
    {
        return "edit page";
    }

  
    public function update(Request $request, Category $category)
    {
        //
    }

   
    public function destroy(Category $category)
    {
        return "delete page";
    }
}
