<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
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
            $pages = Page::where('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('conf_password', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pages = Page::latest()->paginate($perPage);
        }

        return view('pages.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.pages.create');
    }

    public function mainPage( Request $request){
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pages = Page::where('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('conf_password', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pages = Page::latest()->paginate($perPage);
        }
        //dd($pages);
        return view('pages.pages.index', compact('pages'));
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
			'name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'password' => 'alpha_num|min:8|max:12|required',
			'conf_password' => 'required',
			'status' => 'required',
			'role' => 'required'
		]);
        $requestData = $request->all();
        
        Page::create($requestData);

        return redirect('pages/pages')->with('flash_message', 'Page added!');
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
        $page = Page::findOrFail($id);

        return view('pages.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('pages.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'password' => 'alpha_num|min:8|max:12|required',
			'conf_password' => 'required',
			'status' => 'required',
			'role' =>  'required',
		]);
        $requestData = $request->all();
        
        $page = Page::findOrFail($id);
        $page->update($requestData);

        return redirect('pages/pages')->with('flash_message', 'Page updated!');
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
        Page::destroy($id);

        return redirect('pages/pages')->with('flash_message', 'Page deleted!');
    }
}
