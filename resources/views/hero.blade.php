<section class="relative h-[600px] w-full flex items-center overflow-hidden border-b border-obscure-lightest">
    <div class="absolute inset-0 -z-10 bg-cover bg-center grayscale" 
         style="background-image: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(0,0,0,0.5) 100%), url('{{ asset('assets/home-hero.png') }}')">
    </div>

    <div class="px-8 md:px-20">
        <p class="text-emph text-sm font-bold mb-4 tracking-widest">EST. 2024</p>
        <h1 class="text-white text-6xl md:text-8xl font-black mb-6 tracking-tighter">THE NEW ERA</h1>
        <p class="text-clarity-light max-w-lg mb-10 text-lg">Engineered for those who demand absolute precision. Experience zero-latency execution.</p>
        <div class="flex gap-4">
            <a href="{{ route('catalogo') }}" class="px-10 py-4 bg-emph hover:bg-emph-light text-white font-bold transition-all transform hover:scale-105">EXPLORE HARDWARE</a>
            <a href="/systems" class="px-10 py-4 border border-clarity-light text-clarity-light hover:text-white font-bold transition-all">VIEW SYSTEMS</a>
        </div>
    </div>
</section>