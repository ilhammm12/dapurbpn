<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maToko;
use App\Models\maUser;
use App\Models\maMenu;
use App\Models\maTransaksi;

class maTransaksiController extends Controller
{
    public function index()
    {
        $maTransaksis = maTransaksi::join('ma_menus','ma_transaksis.idMenu','=','ma_menus.idMenu')->orderBy('ma_menus.idMenu')->paginate(5);

        return view('maTransaksis.index',compact('maTransaksis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
        //
    }
}
