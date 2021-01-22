<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maUser;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('front.masuk');
    }

    public function validateLogin(Request $request)
    {
        dd(\Auth::attempt(['email' => $request->email, 'password' => $request->password]));

        // $this->validate($request, [
        //   'email' => 'required|email',
        //   'password' => 'required'
        // ]);

        // if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //   return "Hai";
        // }

    }

    // public function logout()
    // {
    //     if (Auth::guard('admin')->check()) {
    //       Auth::guard('admin')->logout();
    //     } elseif (Auth::guard('user')->check()) {
    //       Auth::guard('user')->logout();
    //     }

    //     return redirect('/');

    // }
    public function index()
    {
        //
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
        //
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
