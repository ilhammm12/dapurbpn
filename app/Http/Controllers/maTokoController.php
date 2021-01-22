<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maToko;
use App\Models\maUser;
use App\Models\maMenu;

class maTokoController extends Controller
{
    public function index()
    {
        //$maTokos = maToko::latest()->paginate(5);
        $maTokos = maToko::join('ma_users','ma_tokos.idUser','=','ma_users.id')
                        ->orderBy('ma_users.id')->paginate(5);

        return view('maTokos.index',compact('maTokos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create($id)
    {
        $maUsers = maUser::where('id', $id)->first();
        return view('maTokos.create',compact('maUsers','id'));
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'idUser' => 'required',
            'namaToko' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required'
        ]);
        if (isset($request->foto)) {
            $extention = $request->foto->extension();
            $image_name = time() . '.' . $extention;
            $request->foto->move(public_path('img'), $image_name);
        } else {
            $image_name = null;
        }
        maToko::create([
            'idUser' => $request->idUser,
            'namaToko' => $request->namaToko,
            'alamat' => $request->alamat,
            'foto' => $image_name,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup
        ]);
        return redirect()->route('maTokos.index')
                        ->with('success','User created successfully.');
    }
    public function show($id)
    {
        $maTokos = maToko::where('idToko', $id)->first();
        $maMenus = maMenu::where('idToko', $id)->latest()->paginate(5);
        return view('maTokos.show',compact('maTokos','maMenus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        maToko::where('idToko', $id)->delete();

        return redirect()->route('maTokos.index')
                        ->with('success','User deleted successfully');
    }
}
