<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Http\Requests\MapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use illuminate\Support\Facades\File;

class MapelController extends Controller
{
    public function index()
    {
        $data['mapel'] = Mapel::get();
        return view('mapel.home', $data);
    }

    public function tambah()
    {
        return view('mapel.tambah');
    }

    public function save(MapelRequest $r)
    {
        if ($r->validated()) {
            //cara upload file
            $foto = $r->gambar->getClientOriginalName();
            $r->gambar->move('foto/mapel/', $foto);

            Mapel::create([
                'namamapel' => $r->namamapel,
                'pengajar' => $r->pengajar,
                'jam' => $r->jam,
                'lokal' => $r->lokal,
                'gambar' => $foto
            ]);

            return redirect('mapel')->with('pesan', 'input data berhasil');
        }
    }

    public function edit($id)
    {
        $data['mapel'] = Mapel::where('id', $id)->first();
        return view('mapel.edit', $data);
    }

    public function update(UpdateMapelRequest $r, $id)
    {
        if ($r->validated()) {
            if ($r->gambar) {
                $cek = Mapel::where('id', $id)->first();
                if (File::exists(public_path('foto/mapel/' . $cek->gambar))) {
                    File::delete(public_path('foto/mapel/' . $cek->gambar));
                }
                $foto = $r->gambar->getClientOriginalName();
                $r->gambar->move('foto/mapel/', $foto);

                $data['gambar'] = $foto;
            }

            $data['namamapel'] = $r->namamapel;
            $data['pengajar'] = $r->pengajar;
            $data['jam'] = $r->jam;
            $data['lokal'] = $r->lokal;

            Mapel::where('id', $id)->update($data);

            return redirect('mapel');
        }
    }

    public function hapus($id)
    {
        mapel::where('id', $id)->delete();
        return back();
    }
}
