@extends('home.template')

@section('title')
Edit Data
@endsection

@section('content')

<form action="{{ route('updatemapel',$mapel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-2">
        <label for="">Nama Mata Pelajaran</label>
        <input type="text" name="namamapel" value="{{ $mapel->namamapel }}" class="p-2 border rounded-md">
        <span>{{ $errors->first('namamapel') }}</span>
    </div>
    <div class="flex flex-col gap-2">
        <label for="">Pengajar</label>
        <input type="pengajar" name="pengajar" value="{{ $mapel->pengajar }}" class="p-2 border rounded-md">
        <span>{{ $errors->first('pengajar') }}</span>
    </div>
    <div class="flex flex-col gap-2">
        <label for="">Jam</label>
        <input type="time" name="jam" value="{{ $mapel->jam }}" class="p-2 border rounded-md">
        <span>{{ $errors->first('jam') }}</span>
    </div>
    <div class="flex flex-col gap-2">
        <label for="">Lokal</label>
        <input type="text" name="lokal" value="{{ $mapel->lokal }}" class="p-2 border rounded-md">
        <span>{{ $errors->first('lokal') }}</span>
    </div>
    <div class="flex flex-col gap-2">
        <label for="">Gambar</label>
        <input type="file" name="gambar" class="p-2 border rounded-md">
        <span>{{ $errors->first('gambar') }}</span>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 w-1/2 p-2 rounded-md text-white">Simpan</button>
    </div>
</form>
@endsection