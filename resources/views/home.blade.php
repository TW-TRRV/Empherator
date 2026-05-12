@extends('layouts.master') 
@section('content')
    @include('partials.navbar')
    
    <main>
        @include('partials.hero')
        @include('partials.categories')
        @include('partials.featured')
        @include('partials.newsletter')
    </main>

    @include('partials.footer')
@endsection