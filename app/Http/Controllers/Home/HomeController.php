<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Pengguna;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $data['user'] = Pengguna::get();
        return view('home.home', $data);
    }

    public function tambah()
    {
        return view('home.tambah');
    }

    public function save(UserRequest $r)
    {
        if ($r->validated()) {
            //cara upload file
            $foto = $r->foto->getClientOriginalName();
            $r->foto->move('foto/', $foto);

            Pengguna::create([
                'nama' => $r->nama,
                'email' => $r->email,
                'telpon' => $r->telpon,
                'foto' => $foto
            ]);

            return redirect('home')->with('pesan', 'input data berhasil');
        }
    }

    public function edit($id)
    {
        $data['pengguna'] = Pengguna::where('id', $id)->first();
        return view('home.edit', $data);
    }

    public function update(UpdateRequest $r, $id)
    {
        if ($r->validated()) {
            if ($r->foto) {

                $cek = Pengguna::where('id', $id)->first();
                if (File::exists(public_path('foto/' . $cek->foto))) {
                    File::delete(public_path('foto/' . $cek->foto));
                }
                $foto = $r->foto->getClientOriginalName();
                $r->foto->move('foto/', $foto);

                $data['foto'] = $foto;
            }

            $data['nama'] = $r->nama;
            $data['email'] = $r->email;
            $data['telpon'] = $r->telpon;

            Pengguna::where('id', $id)->update($data);

            return redirect('home');
        }
    }

    public function hapus($id)
    {
        Pengguna::where('id', $id)->delete();
        return back();
    }
}
