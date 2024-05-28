@extends('home.template')

@section('title')
Halaman Mata Pelajaran
@endsection

@section('content')
<div class="flex justify-between">
    <div class="text-xl font-bold">Data Mata Pelajaran</div>
    <div>
        <a href="{{ route('tambah.mapel') }}" class="bg-blue-500 hover:bg-blue-300 text-white p-2 border rounded-md">Tambah Data</a>
    </div>
</div>

<table class="table-auto w-full mt-5">
    <thead>
        <tr class="border p-3 bg-gray-400 text-white">
            <th class="text-center border p-3">No</th>
            <th class="text-center border p-3">Nama Mata Pelajaran</th>
            <th class="text-center border p-3">Pengajar</th>
            <th class="text-center border p-3">Jam</th>
            <th class="text-center border p-3">Lokal</th>
            <th class="text-center border p-3">Gambar</th>
            <th class="text-center border p-3">#</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mapel as $i => $a)
        <tr>
            <td class="text-center border p-3">{{ $i+1 }}</td>
            <td class="text-center border p-3">{{ $a->namamapel }}</td>
            <td class="text-center border p-3">{{ $a->pengajar }}</td>
            <td class="text-center border p-3">{{ $a->jam }}</td>
            <td class="text-center border p-3">{{ $a->lokal }}</td>
            <td class="text-center border p-3"><img src="{{ asset('foto/mapel/'.$a->gambar) }}" alt="{{ $a->gambar }}" width="100px" height="100px" class="mx-auto"></td>
            <td class="text-center border p-3">
                <div class="flex gap-3 justify-center">
                    <a href="{{ route('editmapel',$a->id) }}" class="bg-blue-500 flex items-center justify-center hover:bg-blue-400 text-white rounded-md w-14 h-8">Edit</a>
                    <a href="{{ route('hapusmapel',$a->id) }}" class="bg-red-500 items-center justify-center hover:bg-red-400 text-white rounded-md w-14 h-8">Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection