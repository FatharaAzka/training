<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\Role;
use Session;
use Auth;
use View;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['ROLE_USER', 'ROLE_ADMIN']);
        if($request->user()->hasRole('ROLE_USER')) {
            // $data = $request->user()->id;
            $id = $request->user()->id;
            $data = User::find($id)->userDetail;
            // $avatar = UserDetail::where('user_id',Auth::user()->id)->pluck('avatar');
            // dd($data);
            if( empty($data)) {
                Session::flash("notice","Anda belum mengisi detail profile");
            }
        
            return view('layouts/admin')->with('data', $data);

        } elseif ($request->user()->hasRole('ROLE_ADMIN')) {
            # code...
            $cv = UserDetail::with('users')->orderBy('id', 'ASC')->get();
            $user = User::with('roles','userDetail')->get();

            return View::make('layouts/admin')->with('cv',$cv)->with('user',$user);

        }
    }
}
