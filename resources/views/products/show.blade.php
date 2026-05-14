@extends('layouts.master')
 
@section('content')
<div
    class="bg-neutral-950 min-h-screen text-white font-sans"
    x-data="{
        mainImage: '{{ asset('') }}' + '{{ $product->image }}',
        activeSwitch: 'standard',
        qty: 1
    }"
>
    @include('partials.navbar')
 
    <main class="w-full">
 
        {{-- ── PRODUCT SECTION ── --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
 
                {{-- LEFT — Images --}}
                <div class="flex flex-col gap-4">
 
                    {{-- Main Image --}}
                    <div class="w-full aspect-[16/10] bg-neutral-800 overflow-hidden border border-neutral-700">
                        <img
                            :src="mainImage"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-contain p-8 transition-all duration-500"
                        >
                    </div>
 
                    {{-- Thumbnails --}}
                    <div class="grid grid-cols-4 gap-4">
                        @foreach(range(1, 4) as $i)
                        <button
                            @click="mainImage = '{{ $product->image }}'"
                            :class="mainImage === '{{ $product->image }}'
                                ? 'border-blue-500'
                                : 'border-neutral-700 hover:border-blue-500'"
                            class="aspect-square bg-neutral-800 border-2 overflow-hidden transition-all"
                        >
                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }} thumbnail {{ $i }}"
                                class="w-full h-full object-contain p-2"
                            >
                        </button>
                        @endforeach
                    </div>
 
                </div>
 
                {{-- RIGHT — Info --}}
                <div class="flex flex-col">
 
                    {{-- Category --}}
                    <div class="text-blue-500 text-xs font-black tracking-[0.25em] uppercase mb-4">
                        {{ $product->category }} / Peripherals
                    </div>
 
                    {{-- Name --}}
                    <h1 class="text-5xl lg:text-7xl font-black uppercase tracking-tighter leading-none mb-8">
                        {{ $product->name }}
                    </h1>
 
                    {{-- Description --}}
                    <p class="text-neutral-400 text-base leading-relaxed mb-12 max-w-xl">
                        {{ $product->description }}
                    </p>
 
                    {{-- Price --}}
                    <div class="flex items-end justify-between border-b border-neutral-700 pb-6 mb-10">
                        <span class="text-xs uppercase tracking-[0.2em] text-neutral-400 font-bold">
                            Precio
                        </span>
                        <span class="text-5xl font-black text-white">
                            ${{ number_format($product->price, 0) }}
                        </span>
                    </div>
 
                    {{-- Add to Cart --}}
                    <button
                        @click="
                            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
                            let existing = cart.find(item => item.id === {{ $product->id }});
                            if (existing) {
                                existing.quantity += qty;
                            } else {
                                cart.push({
                                    id: {{ $product->id }},
                                    name: '{{ addslashes($product->name) }}',
                                    specs: '{{ addslashes($product->description) }}',
                                    price: {{ $product->price }},
                                    quantity: qty,
                                    image: '{{ asset($product->image) }}'
                                });
                            }
                            localStorage.setItem('cart', JSON.stringify(cart));
                            window.location.href = '{{ route('cart.index') }}';
                        "
                        class="w-full h-14 bg-blue-600 hover:bg-blue-500 text-white text-sm font-black tracking-[0.2em] uppercase transition-all duration-300 cursor-pointer"
                    >
                        Add to Cart
                    </button>
 
                    {{-- Footer Info --}}
                    <div class="mt-6 flex items-center justify-center gap-4 text-[10px] uppercase tracking-widest text-neutral-600">
                        <span>Global Shipping Available</span>
                        <span class="w-1 h-1 bg-neutral-600 rounded-full"></span>
                        <span>2-Year Limited Warranty Included</span>
                    </div>
 
                </div>
            </div>
        </section>
 
        {{-- ── TECHNICAL PROWESS ── --}}
        <section class="bg-neutral-900 border-t border-neutral-800 py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
 
                <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tight mb-3">
                    Technical Prowess
                </h2>
                <div class="w-16 h-1 bg-blue-600 mb-16"></div>
 
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
 
                    <div class="lg:col-span-2 bg-neutral-800 border border-neutral-700 p-8 hover:border-blue-500 transition-all flex flex-col justify-center min-h-[200px]">
                        <div class="text-4xl mb-4">⚡</div>
                        <h3 class="text-xl font-bold uppercase mb-3">Ultra-Low Latency</h3>
                        <p class="text-neutral-400 text-sm">
                            Neural-link processing ensures every action is registered with sub-1ms response time.
                        </p>
                    </div>
 
                    <div class="bg-neutral-800 border border-neutral-700 p-8 hover:border-blue-500 transition-all flex flex-col justify-center min-h-[200px]">
                        <div class="text-4xl mb-4">🦾</div>
                        <h3 class="text-sm font-bold uppercase mb-3">Titanium Chassis</h3>
                        <p class="text-neutral-400 text-xs">
                            Reinforced structure designed for elite tactical durability.
                        </p>
                    </div>
 
                    <div class="bg-neutral-800 border border-neutral-700 p-8 hover:border-blue-500 transition-all flex flex-col justify-center min-h-[200px]">
                        <div class="text-4xl mb-4">💡</div>
                        <h3 class="text-sm font-bold uppercase mb-3">Dynamic RGB</h3>
                        <p class="text-neutral-400 text-xs">
                            16.8M colors with hardware-level control.
                        </p>
                    </div>
 
                    <div class="lg:col-span-2 bg-neutral-800 border border-neutral-700 p-8 flex flex-col justify-center min-h-[200px]">
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-2xl">📈</div>
                            <div class="text-right">
                                <div class="text-3xl font-black text-blue-500">98.4%</div>
                                <div class="text-[10px] text-neutral-400 uppercase tracking-widest">Input Accuracy</div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold uppercase mb-4">Performance Rating</h3>
                        <div class="w-full h-2 bg-neutral-950">
                            <div class="h-full bg-blue-600" style="width: 98.4%"></div>
                        </div>
                    </div>
 
                </div>
            </div>
        </section>
 
        {{-- ── FIELD REPORTS ── --}}
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
 
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                    <div>
                        <h2 class="text-3xl font-black uppercase tracking-tight mb-2">
                            Field Reports
                        </h2>
                        <p class="text-neutral-400 text-sm">Verified intelligence from the front lines.</p>
                    </div>
                    <div class="text-right">
                        <div class="text-blue-500 text-xl mb-1 flex justify-end gap-1">★ ★ ★ ★ ★</div>
                        <div class="text-xl font-bold">5.0 / 5.0</div>
                    </div>
                </div>
 
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    @foreach([
                        ['user' => 'XenthoS / Pro User',     'text' => 'The latency difference is actually perceptible. Best typing experience of my career.'],
                        ['user' => 'NovaSpy / Ranked Player', 'text' => 'Switched from a top-tier competitor and never looked back. Zero missed inputs.'],
                        ['user' => 'Kr4ken / Streamer',       'text' => 'Chat noticed the difference before I did. Insane build quality for the price point.'],
                    ] as $review)
                    <div class="bg-neutral-900 border border-neutral-700 p-8 hover:border-blue-500 transition-all">
                        <div class="flex justify-between items-start mb-6">
                            <div class="text-xs text-neutral-400 uppercase tracking-wider">{{ $review['user'] }}</div>
                            <div class="text-[10px] font-black text-blue-500 uppercase tracking-widest bg-blue-500/10 px-2 py-1">
                                Verified
                            </div>
                        </div>
                        <p class="text-white text-sm italic leading-relaxed mb-6">
                            "{{ $review['text'] }}"
                        </p>
                        <div class="text-blue-500 text-sm flex gap-1">★ ★ ★ ★ ★</div>
                    </div>
                    @endforeach
                </div>
 
                <div class="flex justify-center">
                    <button class="border border-neutral-700 hover:border-white text-neutral-400 hover:text-white text-xs font-black uppercase tracking-widest py-4 px-8 transition-colors cursor-pointer">
                        Read All Reviews
                    </button>
                </div>
 
            </div>
        </section>
 
    </main>
 
    @include('partials.footer')
</div>
@endsection