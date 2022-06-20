<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    //
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(){
        $all_categories = $this->category->all();

        return view('users.admin.categories.index')->with('all_categories', $all_categories);
    }

    public function store(Request $request){
        #validation
        $request->validate([
            'category_name'    => 'required',
            'category_slug' => 'required'
        ]);

        #save to categories
        $this->category->name = $request->category_name;
        $this->category->slug = $request->category_slug;
        $this->category->save();

        return redirect()->back();
    }


    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return view('users.admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request,$id)
    {
         #validation
         $request->validate([
            'category_name'    => 'required',
            'category_slug' => 'required'
        ]);

        $category          = $this->category->findOrFail($id);
        $category->name   = $request->category_name;
        $category->slug    = $request->category_slug;

        $category->save();

        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $this->category->destroy($id);
        return redirect()->back();
    }

}
