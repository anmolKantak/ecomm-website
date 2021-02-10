<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Controllers\Pages\PagesController;

use App\Models\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['superadmin', 'admin','inventory manager','order manager','customer']);
            if($request->user()->hasRole('admin')){
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
                return view('pages/pages.index',compact('pages'));
            }
        return view('admin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
