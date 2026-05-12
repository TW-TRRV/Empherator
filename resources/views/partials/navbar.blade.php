<nav x-data="{ isSearchOpen: false, isMobileMenuOpen: false }" class="fixed z-50 top-0 bg-obscure-darker border-b border-obscure-lightest h-20 w-full px-4 md:px-8 lg:px-20 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="/" class="text-clarity-lighter font-black text-2xl tracking-tighter">EMPHERATOR</a>
    </div>
    
    <div class="hidden md:flex gap-8 items-center">
        <a href="/" class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all">HOME</a>
        <a href="/catalogo" class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all">HARDWARE</a>
        <a href="/login" class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all">LOGIN</a>
    </div>

    <div class="flex items-center gap-5 text-2xl text-clarity-light">
        <button @click="isSearchOpen = true" class="hover:text-emph-light transition-all cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
        <a href="/cart" class="hover:text-emph-light transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </a>
    </div>

    <div x-show="isSearchOpen" class="fixed inset-0 bg-obscure-darker/95 z-[60] flex items-center justify-center p-4" style="display: none;">
        <div class="w-full max-w-3xl relative">
            <button @click="isSearchOpen = false" class="absolute -top-12 right-0 text-4xl">&times;</button>
            <input type="text" placeholder="SEARCH CATALOG..." class="w-full bg-transparent border-b border-emph p-4 text-2xl outline-none focus:ring-0">
        </div>
    </div>
</nav>
<div class="h-20"></div>