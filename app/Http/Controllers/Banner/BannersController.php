<?php

namespace App\Http\Controllers\Banner;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannersController extends Controller
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
            $banners = Banner::where('banner_name', 'LIKE', "%$keyword%")
                ->orWhere('width', 'LIKE', "%$keyword%")
                ->orWhere('height', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $banners = Banner::latest()->paginate($perPage);
        }

        return view('banner.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('banner.banners.create');
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
			'banner_name' => 'required',
			'title' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('banner_name')) {
            $requestData['banner_name'] = $request->file('banner_name')
                ->store('uploads', 'public');
        }

        Banner::create($requestData);

        return redirect('banner/banners')->with('flash_message', 'Banner added!');
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
        $banner = Banner::findOrFail($id);

        return view('banner.banners.show', compact('banner'));
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
        $banner = Banner::findOrFail($id);

        return view('banner.banners.edit', compact('banner'));
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
			'banner_name' => 'required',
			'title' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('banner_name')) {
            $requestData['banner_name'] = $request->file('banner_name')
                ->store('uploads', 'public');
        }

        $banner = Banner::findOrFail($id);
        $banner->update($requestData);

        return redirect('banner/banners')->with('flash_message', 'Banner updated!');
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
        Banner::destroy($id);

        return redirect('banner/banners')->with('flash_message', 'Banner deleted!');
    }
}
