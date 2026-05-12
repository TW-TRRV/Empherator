@extends('layouts.master')

@section('content')

<div 
    class="bg-obscure-darker min-h-screen font-sans text-clarity-lighter"
    x-data="cartSystem()"
    x-init="initCart()"
>
    @include('partials.navbar')

    <main class="max-w-7xl mx-auto px-4 md:px-8 lg:px-20 py-16">

        {{-- HEADER --}}
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight uppercase">
                Your Arsenal
            </h1>

            <div class="w-16 h-1 bg-emph mt-3"></div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">

            {{-- PRODUCTS --}}
            <div class="grow w-full lg:w-2/3" style="direction: rtl;">

                <div class="max-h-[700px] overflow-y-auto pr-2 pl-4 custom-scrollbar">

                    <div class="flex flex-col gap-6" style="direction: ltr;">

                        {{-- ITEMS --}}
                        <template x-for="item in cartItems" :key="item.id">

                            <div class="bg-obscure-lighter border border-obscure-light p-6 flex flex-col md:flex-row gap-6 relative group">

                                {{-- REMOVE --}}
                                <button
                                    @click="removeItem(item.id)"
                                    class="absolute top-4 right-4 text-clarity-light hover:text-red-500 transition-colors"
                                >
                                    ✕
                                </button>

                                {{-- IMAGE --}}
                                <div class="w-32 h-32 bg-obscure-lightest shrink-0 overflow-hidden border border-obscure-light">

                                    <img
                                        :src="item.image"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                                {{-- INFO --}}
                                <div class="flex flex-col justify-between grow">

                                    <div>
                                        <h3
                                            class="text-xl font-bold text-clarity-lighter mb-1 uppercase tracking-tight"
                                            x-text="item.name"
                                        ></h3>

                                        <p
                                            class="text-[10px] text-clarity-dark mb-4 tracking-widest leading-tight"
                                            x-text="item.specs"
                                        ></p>
                                    </div>

                                    <div class="flex justify-between items-end mt-4">

                                        {{-- QUANTITY --}}
                                        <div class="flex items-center border border-obscure-light bg-obscure">

                                            <button
                                                @click="updateQuantity(item.id, -1)"
                                                class="px-3 py-1 text-clarity-light hover:bg-obscure-light"
                                            >
                                                -
                                            </button>

                                            <span
                                                class="px-4 py-1 text-sm font-mono font-bold text-emph"
                                                x-text="item.quantity"
                                            ></span>

                                            <button
                                                @click="updateQuantity(item.id, 1)"
                                                class="px-3 py-1 text-clarity-light hover:bg-obscure-light"
                                            >
                                                +
                                            </button>
                                        </div>

                                        {{-- PRICE --}}
                                        <div class="text-right">

                                            <p class="text-[9px] text-clarity-dark mb-1 font-bold uppercase">
                                                Price
                                            </p>

                                            <p
                                                class="text-xl font-bold text-emph-light font-mono"
                                                x-text="'$' + (item.price * item.quantity).toFixed(2)"
                                            ></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- EMPTY --}}
                        <div
                            x-show="cartItems.length === 0"
                            class="text-center py-20 border border-dashed border-obscure-light"
                        >
                            <p class="text-clarity-dark uppercase tracking-widest text-xs">
                                Arsenal Empty. Return to Base.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            {{-- SUMMARY --}}
            <div class="w-full lg:w-1/3">

                <div class="bg-obscure-lighter border border-obscure-light p-8 shadow-2xl">

                    <h2 class="text-xl font-bold text-clarity-lighter mb-8 border-l-4 border-emph pl-4 uppercase">
                        Order Summary
                    </h2>

                    {{-- TOTALS --}}
                    <div class="space-y-4 text-xs mb-8 border-b border-obscure-light pb-6 font-bold tracking-wider">

                        <div class="flex justify-between">
                            <span class="text-clarity-dark">SUBTOTAL</span>

                            <span
                                class="text-clarity-lighter font-mono"
                                x-text="'$' + subtotal().toFixed(2)"
                            ></span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-clarity-dark">TAX (8%)</span>

                            <span
                                class="text-clarity-lighter font-mono"
                                x-text="'$' + tax().toFixed(2)"
                            ></span>
                        </div>

                    </div>

                    {{-- FINAL TOTAL --}}
                    <div class="flex justify-between items-center mb-8">

                        <span class="text-clarity-dark text-xs font-bold uppercase">
                            Total Credits
                        </span>

                        <span
                            class="text-3xl font-bold text-emph"
                            x-text="'$' + total().toFixed(2)"
                        ></span>
                    </div>

                    {{-- CHECKOUT --}}
                    <button
                        class="w-full bg-emph hover:bg-emph-light text-obscure-darker font-black py-4 mb-4 transition-all uppercase tracking-tighter"
                    >
                        Proceed to Checkout
                    </button>

                    {{-- CONTINUE --}}
                    <a
                        href="{{ route('home') }}"
                        class="block text-center w-full border border-obscure-light text-clarity-lighter hover:bg-obscure-light font-bold py-3 text-[10px] tracking-widest uppercase transition-colors"
                    >
                        Continue Shopping
                    </a>

                    {{-- SECURITY --}}
                    <div class="flex items-center justify-center gap-2 mt-6 text-[10px] text-clarity-dark uppercase tracking-widest">
                        <span>🔒</span>
                        <span>Encrypted Checkout Processing</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</div>

{{-- ALPINE --}}
<script>

function cartSystem() {

    return {

        cartItems: [],

        initCart() {

            const saved = localStorage.getItem('cart');

            this.cartItems = saved
                ? JSON.parse(saved)
                : [];
        },

        updateQuantity(id, delta) {

            this.cartItems = this.cartItems.map(item => {

                if(item.id == id){

                    return {
                        ...item,
                        quantity: Math.max(1, item.quantity + delta)
                    };
                }

                return item;
            });

            this.save();
        },

        removeItem(id) {

            this.cartItems = this.cartItems.filter(item => item.id != id);

            this.save();
        },

        save() {

            localStorage.setItem('cart', JSON.stringify(this.cartItems));
        },

        subtotal() {

            return this.cartItems.reduce((sum, item) => {

                return sum + (item.price * item.quantity);

            }, 0);
        },

        tax() {

            return this.subtotal() * 0.08;
        },

        total() {

            return this.subtotal() + this.tax();
        }
    }
}

</script>

@endsection