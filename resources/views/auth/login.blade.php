@extends('layouts.app', ['nav_bar' => false])

@section('content')
<div class="h-screen w-screen overflow-hidden flex justify-center items-center">
    <div class="flex justify-center bg-white shadow rounded-lg">
        <div class="bg-radial from-white from-30% to-slate-300 flex items-center rounded-l-lg">
            <div class="px-10">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="w-52" preload>
            </div>
        </div>
        <div class="px-10 py-5">
            <form method="post" action="{{ route('action.login') }}">
                @csrf
                <div class="pb-3">
                    <small>Welcome</small>
                    <div class="bg-linear-to-r from-cyan-500 to-blue-500 rounded-full w-full h-1"></div>
                </div>
                <div class="py-3">
                    <h3 class="text-2xl font-semibold">Login</h3>
                    <small>Sign In With Your Account</small>
                </div>
                <div class="">
                    <label for="email" class="text-slate-800 font-normal">{{ __('Email') }}</label>

                    <div class="mt-1">
                        <input id="email" type="email" class="w-full bg-white border border-slate-300 rounded-sm py-2 px-3 text-sm focus:outline-none" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">

                        @error('email')
                        <div class="text-sm text-red-800 w-[18rem]">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <label for="password" class="text-slate-800 font-normal">{{ __('Password') }}</label>

                    <div class="mt-2">
                        <input id="password" type="password" class="w-full bg-white border border-slate-300 rounded-sm py-2 px-3 text-sm focus:outline-none" name="password" placeholder="Password">

                        @error('password')
                        <div class="text-sm text-red-800 w-[18rem]">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 mt-12">
                    <button type="submit" class="bg-slate-700 text-white w-80 rounded-sm py-2 px-2 font-medium cursor-pointer">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection