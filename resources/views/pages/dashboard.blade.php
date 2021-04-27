@extends('layouts.app')
@section('content')
    {{-- <div class="">
        Dashboard
    </div> --}}

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    @auth
    @include('pages.cart')
    @endauth
    
    <main class="my-8">
        <div class="container mx-auto px-6 p-6">
            {{-- <h3 class="text-gray-700 text-2xl font-medium">Wrist Watch</h3>
            <span class="mt-3 text-sm text-gray-500">200+ Products</span> --}}
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @if ($prods->count()>0)
                @foreach ($prods as $prod)
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110  text-white font-semibold py-3 px-6 rounded-md">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" >
                        <img src="{{ asset('storage/product_images/' . $prod->image) }}">
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase"><a href=" {{route('prod.detail',$prod->id)}}">{{ $prod->prod_name }}</a></h3> 
                        <span class="text-gray-500 mt-2">${{ $prod->price }}</span>
                    </div>
                </div>
                @endforeach                
                @endif

                {{-- transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110  text-white font-semibold py-3 px-6 rounded-md --}}                 
            
        </div>
        {{ $prods->links() }}
    </main>

    @include('layouts.footer')
</div>
@endsection