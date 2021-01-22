<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maMenu;
use App\Models\maToko;

class maMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $maTokos = maToko::where('idToko', $id)->first();
        
        return view('maMenus.create',compact('maTokos','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'idToko' => 'required',
            'namaMenu' => 'required',
            'fotoMenu' => 'required',
            'hargaMenu' => 'required',
            'stok' => 'required'
        ]);

        $idTokox = $request->idToko;
        if (isset($request->fotoMenu)) {
            $extention = $request->fotoMenu->extension();
            $image_name = time() . '.' . $extention;
            $request->fotoMenu->move(public_path('img'), $image_name);
        } else {
            $image_name = null;
        }
        maMenu::create([
            'idToko' => $request->idToko,
            'namaMenu' => $request->namaMenu,
            'fotoMenu' => $image_name,
            'hargaMenu' => $request->hargaMenu,
            'stok' => $request->stok
        ]);
        return redirect()->route('maTokos.show',$idTokox)
                        ->with('success','User created successfully.');
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
        $menuId = maMenu::where('idMenu', $id)->first();
        $idTokox = $menuId->idToko;
        maMenu::where('idMenu', $id)->delete();

        // maMenu::join('ma_tokos','ma_menus.idToko','=','ma_tokos.idToko')->where('ma_menus.idToko',$idTokox)->delete();

        return redirect()->route('maTokos.show',$idTokox)
                        ->with('success','User deleted successfully');
    }
}
