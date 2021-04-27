@extends('layouts.admin')
@section('content1')
    

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div  class="bg-white">
    <header>
        
    </header>
    
    <main class="my-8">
        <div class="container mx-auto px-6 p-6">
            {{-- <h3 class="text-gray-700 text-2xl font-medium">Wrist Watch</h3>
            <span class="mt-3 text-sm text-gray-500">200+ Products</span> --}}
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @if ($prods->count())
                @foreach ($prods as $prod)
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110  text-white font-semibold py-3 px-6 rounded-md">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" >
                        {{-- <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </button> --}}
                        <img src="{{ asset('storage/product_images/' . $prod->image) }}">
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase"><a href="{{ url('/admin/product/edit?pid='.$prod->id) }}">{{ $prod->prod_name }}</a></h3> 
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