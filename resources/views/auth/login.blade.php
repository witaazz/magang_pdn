@extends('auth.template')

@section('title')
Login
@endsection

@section('content')


<div class="flex min-h-full h-screen flex-col justify-center px-6 py-12 lg:px-8 grid gap-4 place-content-center bg-slate-100">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="mt-5 text-center text-3xl font-bold leading-9 tracking-tight text-blue-800">Selamat Datang. Silakan Login.</h1>
    </div>
    <div class="border-gray border-2 min-w-96 rounded-xl bg-white">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
            @if(session('pesan'))
            @if(session('pesan')=='Login berhasil')
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 ml-2 mr-2 mt-2" role="alert">
                <p class="text-sm">{{ session('pesan') }}</p>
            </div>
            @else
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 ml-2 mr-2 mt-2" role="alert">
                <p class="text-sm">{{ session('pesan') }}</p>
            </div>
            @endif
            @endif

        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6 ml-4 mr-4" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email <span class="text-red-500">{{ $errors->first('email') }}</span></label>
                    <div class="mt-1">
                        <input id="email" name="email" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password <span class="text-red-500">{{ $errors->first('password') }}</span></label>
                    </div>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>

            <p class="mt-5 text-center text-sm text-gray-500 mb-10">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold leading-6 text-blue-800 hover:text-indigo-500">Register</a>
            </p>
        </div>
    </div>

</div>


@endsection