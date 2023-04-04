<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $rules = [
        'category_name' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::whereUserId(auth()->id())->withCount('albums')->paginate(8);
        $categories = Category::getCategoriesByUserId(auth()->user())->paginate(4);
        $category = new Category();
        return view('categories.index', compact('categories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $res = Category::create([
            'category_name' => $request->category_name,
            'user_id' => auth()->id()
        ]);

        $message = $res ? 'Category created' : 'Problem creating category';
        session()->flash('message', $message);
        if($request->ajax()){
            return [
                'message' => $message,
                'success' => $res
            ];
        }else{
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, $this->rules);
        $category->category_name = $request->category_name;
        $res = $category->save();
        $message = $res ? 'Category updated' : 'Problem editing category';
        session()->flash('message', $message);
        if ($request->ajax()) {
            return [
                'message' => $message,
                'success' => $res
            ];
        } else {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        $res = $category->delete();
        $message = $res ? 'Category deleted' : 'Problem deleting category';
        session()->flash('message', $message);
        if ($request->ajax()) {
            return [
                'message' => $message,
                'success' => $res
            ];
        } else {
            return redirect()->route('categories.index');
        }
    }
}
