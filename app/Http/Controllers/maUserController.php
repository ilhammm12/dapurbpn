<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maUser;

class maUserController extends Controller
{
    
    public function index()
    {
        $maUsers = maUser::latest()->paginate(5);

        return view('maUsers.index',compact('maUsers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function create()
    {
        return view('maUsers.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        maUser::create($request->all());

        return redirect()->route('maUsers.index')
                        ->with('success','User created successfully.');
    }

    public function show($id)
    {
        $maUsers = maUser::where('id', $id)->first();

        return view('maUsers.show',compact('maUsers'));
    }

    public function edit($id)
    {
        $maUsers = maUser::where('id', $id)->first();
        return view('maUsers.edit',compact('maUsers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $alamat = $request->input('alamat');
        $no_hp = $request->input('password');

        maUser::where('id', $id)->update(array('nama' => $nama,
                                                'email' => $email,
                                                'password' => $password,
                                                'alamat' => $alamat,
                                                'no_hp' => $no_hp
                                                 ));

        return redirect()->route('maUsers.index')
                        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        maUser::where('id', $id)->delete();

        return redirect()->route('maUsers.index')
                        ->with('success','User deleted successfully');
    }
}
