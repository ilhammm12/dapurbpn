<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\maMenu;
use App\Models\maToko;
use App\Models\maUser;
use App\Models\maTransaksi;

class PageController extends Controller
{
    public function index()
    {
        // $maMenus = maMenu::latest()->paginate(5);
        $maMenus = maMenu::join('ma_tokos','ma_menus.idToko','=','ma_tokos.idToko')
                        ->orderBy('ma_tokos.idToko')->paginate(10);

        return view('front.homepage',compact('maMenus'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($id){
    	$maTokos = maToko::where('idToko', $id)->first();
        $maMenus = maMenu::where('idToko', $id)->latest()->paginate(5);
        return view('front.show',compact('maTokos','maMenus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function masuk(){
        return view('front.masuk');
    }

    public function keluar(){
        Auth::guard('pengguna')->logout();
        return redirect('/masuk');
    }

    public function daftar(){
        return view('front.daftar');
    }



    public function storeUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        // maUser::create($request->all());
        maUser::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('front.masuk')
                        ->with('success','Berhasil membuat akun');
    }



    public function transaksi($id){
    	$maMenus = maMenu::where('idMenu', $id)->first();

        return view('front.transaksi',compact('maMenus'));
    }


    public function storeTransaksi(Request $request){
    	$request->validate([
            'idUser' => 'required',
            'tglTransaksi' => 'required',
            'idMenu' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'totalharga' => 'required'
        ]);

    	$id = $request->idMenu;
        $stoklama = maMenu::find($id);

        $hasil = $stoklama->stok - $request->jumlah;
        $stoklama->stok = $hasil;
        if ($stoklama->stok < 0) {
            return redirect()->route('front.transaksi',$id)->with('success','stok tidak sesuai');
        }else{
            $stoklama->save();
            maTransaksi::create($request->all());
            return redirect()->route('front.homepage')
                        ->with('success','Berhasil transaksi');
        }
    }


	public function profile($id){
    	$maUsers = maUser::where('id', $id)->first();
        $maTokos = maToko::where('idUser', $id)->paginate(5);
        $maMenus = new maMenu;

        return view('front.profile',compact('maUsers','maTokos','maMenus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function buatToko($id){
        $maUsers = maUser::where('id', $id)->first();
        return view('front.buatToko',compact('maUsers','id'));
    }
	public function storeToko(Request $request, $id)
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
        return redirect()->route('front.profile',$request->idUser);
    }
    public function buatMenu($id)
    {
        $maTokosold = maToko::where('idToko', $id)->first();
        $maTokos = maToko::where('idToko', $maTokosold->idToko)->first();
        return view('front.buatMenu',compact('maTokos','id'));
    }
    public function storeMenu(Request $request, $id)
    {
        $request->validate([
            'idToko' => 'required',
            'namaMenu' => 'required',
            'fotoMenu' => 'required',
            'hargaMenu' => 'required',
            'stok' => 'required'
        ]);

        $idTokox = $request->idToko;
        $idTokoNew = maToko::where('idToko', $idTokox)->first();

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
        return redirect()->route('front.profile',$idTokoNew->idUser);
    }



    public function ubahUser($id){
        $maUsers = maUser::where('id', $id)->first();
        return view('front.ubahUser',compact('maUsers'));
    }


    public function validateLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        // dd(\Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $password]));

        if (Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('front.homepage');
        }else{
            return redirect()->route('front.masuk')->with('success','Email atau password tidak sesuai');
        }
    }
}
