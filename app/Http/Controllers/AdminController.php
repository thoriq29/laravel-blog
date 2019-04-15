<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admins;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admins::paginate(20);
        return view('admins.index', compact('data'));
    }

    public function insertForm() {
        return view('admins.insertForm');
    }

    public function create(Request $request)
    {
        $name = $request->input('name');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $is_active = false;
        $this->validate($request,[
            'name' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'phone'=> array('required','regex:/^(^\+62\s?|^0)(\d{3,4}-?){2}\d{3,4}$/'),
        ]);
        if (!Admins::where('email','=', $email) -> exists() && !Admins::where('phone','=', $phone) -> exists()) {
            $admin = new Admins;
            $admin->name = $name;
            $admin->fullname = $fullname;
            $admin->email = $email;
            $admin->phone = $phone;
            $admin->is_active = false;
            $admin->save();
            return redirect('/list-of-admin');
        }else{
            echo 'sudah ada';
        }
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Admins::where('id', $id)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
