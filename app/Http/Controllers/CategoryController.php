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
        return view('admin.category.edit', compact('category'));
    }

  
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => "required|unique:categories,name,$category->name",
        ]);

        $category->name = $request->name;
            
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->save();
    

        Session::flash('success', 'Category update successfully');
        
        return redirect()->route('category.index');
    }

   
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();
            Session::flash('success', 'Category Deleted successfully');
            return redirect()->route('category.index');
        



        }
    }
}
