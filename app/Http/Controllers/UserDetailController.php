<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Http\Requests\UserDetailRequest;
use Session;
use Carbon;


class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() { 
        $this->middleware(['auth','role:ROLE_USER']);
    }

    public function index()
    {
        //
        return view('layouts.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailRequest $request)
    {
        //
        $file = $request->file('avatar');
        $destination_path = 'img/uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        $data = new UserDetail();
        $data->user_id = $request->user_id;
        $data->jk = $request->jk;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->avatar = $destination_path . $filename;
        $data->save();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('layouts.admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::with('userDetail')->where('id', $id)->get();
        $user2 = User::find($id);
        
        return view('user.profile')
            ->with('data', $user)
            ->with('data2', $user2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'jk' => 'required|in:l,p',
            'no_telp' => 'required|min:10|max:13',
            'alamat' => 'required',
            'avatar' => 'sometimes|image|mimes:jpeg,png,gif|min:1',
        ]);  

        // dd($validator);

        if($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        }   

        $data = UserDetail::where('user_id',$id)->first();
        if($request->hasFile('avatar')) {
            if (! empty($data->avatar)) {
                if (is_file($data->avatar)) {
                    unlink($data->avatar);
                }
            }

            $file = $request->file('avatar');
            $destination_path = 'img/uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);

            $data->avatar = $destination_path . $filename;
        }

        $data->user_id = $request->input('user_id');
        $data->jk = $request->input('jk');
        $data->no_telp = $request->input('no_telp');
        $data->alamat = $request->input('alamat');

        $data->save();

        return redirect()->route('detail.edit', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadCV() {
        $user = User::find(Auth::user()->id)->userDetail;
        // dd($user);
        return view('user.cv')->with('user',$user);
    }

    public function storeCV(Request $request, $id) {
        // $user = User::find(Auth::user()->id)->userDetail;
        // // dd($user);
        // return view('cv')->with('user',$user);
        $validator = Validator::make($request->all(), [
            'file_cv' => 'required|mimes:pdf',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        }

        $user = UserDetail::where('user_id',$id)->first();
        
        if($request->hasFile('file_cv')) {
            if( empty($user->file_cv) || ($user->status == "2") ){
                if (! empty($user->file_cv)) {
                    if (is_file($user->file_cv)) {
                        unlink($user->file_cv);
                    }
                }

                $file = $request->file('file_cv');
                $destination_path = 'resume/';
                $filename = now()->toDateString()."_".Auth::user()->name.".".$file->getClientOriginalExtension();
                $file->move($destination_path, $filename);

                $user->file_cv = $destination_path . $filename;
                $user->status = "0";
                
                $user->save();
            } else {
                Session::flash('notice','Anda hanya bisa mengupload cv sebanyak 1 kali');
            }

            return redirect()->route('cv.upload');
        }

        return redirect()->route('cv.upload');
    }
}
