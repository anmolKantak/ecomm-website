<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categories = Category::where('category_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categories = Category::latest()->paginate($perPage);
        }
        $levels = Category::where(['parent_id' => 0])->get();
       
       /* $categories = Category::whereNull('parent_id')->with('childrenCategories')->get();*/
       

        return view('categories.categories.index')->with(compact('categories','levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {    $categoryDetails = Category::where(['id' => $id])->first();
         $levels = Category::where(['parent_id' => 0])->get();
        
        return view('categories.categories.create')->with(compact('levels','categoryDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'category_name' => 'required'
        ]);
    
        $requestData = $request->all();

        
      
      
        
        Category::create($requestData);

        return redirect('category/categories')->with('flash_message', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request,$id)
    {
        
        
        
        $levels = Category::where(['parent_id'=>0])->get();
        
        $categoryDetails = Category::where(['parent_id'=>$levels])->first();
        $category = Category::findOrFail($id);

        return view('categories.categories.edit', compact('category','categoryDetails','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id,$levels)
    {
        $this->validate($request, [
			'category_name' => 'required'
		]);
        $requestData = $request->all();
      
        $category = Category::findOrFail($id);
        
        $category = Category::findOrFail($levels);
        $category->update($requestData);

        return redirect('category/categories')->with('flash_message', 'Category updated!',compact('levels'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('category/categories')->with('flash_message', 'Category deleted!');
    }
}
