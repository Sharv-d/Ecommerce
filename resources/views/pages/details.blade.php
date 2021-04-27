@extends('layouts.app')
@section('content')
    <!-- tailwind.config.js -->
{{-- module.exports = {}; --}}



<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <!--   cart -->
    @include('pages.cart')
    @if (session()->has('message'))
    <div class="bg-red-500 p-2 text-center">{{session()->get('message')}}
    </div>
    @endif
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center">
               
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                    <img class="h-fit w-fit rounded-md object-cover max-w-lg mx-auto" src="{{ asset('storage/product_images/' . $prod[0]->image) }}" alt="Nike Air">
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-gray-700 uppercase text-lg">{{ $prod[0]->prod_name }}</h3>
                    <span class="text-gray-500 mt-3"></span>
                    <hr class="my-3">
                    {{-- <div class="mt-2">
                        <label class="text-gray-700 text-sm" for="count">Count:</label>
                        <div class="flex items-center mt-1">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="text-gray-700 text-lg mx-2">1</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div> --}}
                    <div class="mt-2">
                        <span class="text-gray-500 mt-3">{{ $prod[0]->company_name }}</span>
                    </div>
                    <div class="mt-2">
                        <h3 class="text-gray-700 uppercase text-lg">${{ $prod[0]->price }}</h3>
                    </div>
                    
                    <hr class="my-3">
                    <div class="mt-2">
                        <h3 class="text-gray-700 uppercase text-lg">Description:</h3><br>
                        <span class="text-gray-500 mt-3">{{ $prod[0]->description }}</span>
                    </div>
                    @if ($carts->contains('product_id',$prod[0]->id))
                      <div class="flex items-center mt-6">
                        <div class="px-8 py-2  text-black text-md font-medium  focus:outline-none ">Already added to Cart</div>
                      </div>
                    @else
                      <div class="mt-2">
                        <h3 class="text-gray-700 uppercase text-lg">Quantity:</h3><br>
                        <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                              <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-quantity" value="1">
                          <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                          </button>
                        </div>
                      </div>
                      <div class="flex items-center mt-6">
                        <div class="px-8 py-2  text-black text-md font-medium  focus:outline-none ">Add to Cart</div>
                                      
                        <form action="{{route('addcart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$prod[0]->id}}">
                            <input type="hidden" name="name" value="{{$prod[0]->prod_name}}">
                            <input type="hidden" name="company_name" value="{{$prod[0]->company_name}}">
                            <input type="hidden" name="price" value="{{$prod[0]->price}}">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <input type="hidden" name="image" value="{{$prod[0]->image}}">
                            <button type="submit" class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none ">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </form>
                      
                    </div>  
                    @endif
                    
                    {{-- <div class="mt-3">
                        <label class="text-gray-700 text-sm" for="count">Color:</label>
                        <div class="flex items-center mt-1">
                            <button class="h-5 w-5 rounded-full bg-blue-600 border-2 border-blue-200 mr-2 focus:outline-none"></button>
                            <button class="h-5 w-5 rounded-full bg-teal-600 mr-2 focus:outline-none"></button>
                            <button class="h-5 w-5 rounded-full bg-pink-600 mr-2 focus:outline-none"></button>     bg-indigo-400
                        </div>
                    </div> --}}
                    {{--  --}}
                    
                </div>
            </div>
            
        </div>
    </main>

    @include('layouts.footer')
</div>
<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  
    .custom-number-input input:focus {
      outline: none !important;
    }
  
    .custom-number-input button:focus {
      outline: none !important;
    }
  </style>
  
<script>
    function decrement(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      if(value!=1){
          value--;
          target.value = value;
        }else{
            target.value = value;
        }
        document.getElementById('quantity').value=value;
    }
  
    function increment(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      value++;
      target.value = value;
      document.getElementById('quantity').value=value;
      
    }
  
    const decrementButtons = document.querySelectorAll(
      `button[data-action="decrement"]`
    );
  
    const incrementButtons = document.querySelectorAll(
      `button[data-action="increment"]`
    );
  
    decrementButtons.forEach(btn => {
      btn.addEventListener("click", decrement);
    });
  
    incrementButtons.forEach(btn => {
      btn.addEventListener("click", increment);
    });
  </script>
@endsection