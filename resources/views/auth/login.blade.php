@extends('layouts.master')

@section('content')
{{-- Usamos las variables exactas del @theme de v4 --}}
<div class="min-h-screen flex flex-col bg-obscure-darker font-sans text-clarity-lighter">
    @include('partials.navbar')

    <main class="flex-1 flex items-center justify-center w-full py-32">

        <div class="w-full max-w-md bg-obscure-lighter border border-obscure-lightest p-10 flex flex-col items-center mx-4">
            
            <div class="w-full text-left mb-8">
                <h1 class="text-xl font-bold tracking-widest text-clarity-lighter mb-1">SYSTEM ACCESS</h1>
                <p class="text-[10px] text-clarity font-bold uppercase tracking-widest">NEW ERA OPERATIONAL INTERFACE</p>
            </div>

            <form class="w-full" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="block text-[10px] font-bold text-clarity mb-2 uppercase tracking-widest">OPERATOR ID</label>
                    <input
                        type="text"
                        name="email"
                        placeholder="OP-XXXX-X"
                        value="{{ old('email') }}"
                        {{-- focus:border-emph-light ahora funciona nativamente --}}
                        class="w-full h-12 bg-obscure border border-obscure-lightest px-4 text-sm text-clarity-lighter focus:outline-none focus:border-emph-light transition-colors @error('email') border-red-500 @enderror"
                    />
                    @error('email')
                        <p class="text-red-500 text-[10px] mt-1 uppercase tracking-widest">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-[10px] font-bold text-clarity mb-2 uppercase tracking-widest">PASSWORD</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        class="w-full h-12 bg-obscure border border-obscure-lightest px-4 text-sm text-clarity-lighter focus:outline-none focus:border-emph-light transition-colors @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="text-red-500 text-[10px] mt-1 uppercase tracking-widest">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    {{-- bg-emph-lighter y text-obscure-darker vienen de tu @theme --}}
                    class="w-full h-12 bg-emph-lighter hover:bg-emph-light text-obscure-darker font-bold text-sm tracking-wider transition-colors duration-300"
                >
                    LOG IN
                </button>
            </form>

            {{-- Divider --}}
            <div class="w-full my-8 flex items-center justify-center">
                <div class="h-px bg-obscure-lightest flex-1"></div>
                <span class="px-4 text-[9px] text-clarity uppercase tracking-widest">EXTERNAL ACCESS</span>
                <div class="h-px bg-obscure-lightest flex-1"></div>
            </div>

            {{-- Social Buttons --}}
            <div class="flex gap-4 justify-center mb-8">
                {{-- Las clases hover:border-clarity-lighter ahora son 100% compatibles --}}
                <button class="w-10 h-10 border border-obscure-lightest flex items-center justify-center text-clarity-light hover:text-clarity-lighter hover:border-clarity-lighter transition-all duration-300">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                </button>
                <button class="w-10 h-10 border border-obscure-lightest flex items-center justify-center text-clarity-light hover:text-clarity-lighter hover:border-clarity-lighter transition-all duration-300">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.4 24H0V12.6h11.4V24zM24 24H12.6V12.6H24V24zM11.4 11.4H0V0h11.4v11.4zM24 11.4H12.6V0H24v11.4z"/>
                    </svg>
                </button>
                <button class="w-10 h-10 border border-obscure-lightest flex items-center justify-center text-clarity-light hover:text-clarity-lighter hover:border-clarity-lighter transition-all duration-300">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </button>
            </div>

            <a href="#" class="text-[9px] text-clarity-light hover:text-clarity-lighter uppercase tracking-widest border-b border-transparent hover:border-clarity-lighter transition-all duration-300">
                SYSTEM LOCKED? REQUEST RESET
            </a>
        </div>
    </main>

    @include('partials.footer')
</div>
@endsection