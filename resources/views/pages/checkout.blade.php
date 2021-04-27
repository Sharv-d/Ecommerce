@extends('layouts.app')
@section('content')
   



<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    @include('pages.cart')
    <h3 class="text-gray-700 p-3 text-2xl font-medium">Checkout</h3>
    <main class="my-8">
        
        <div class="container mx-auto px-6">
            
            <div class="flex flex-col lg:flex-row mt-8">
                <div class="w-full lg:w-1/2 order-2">
                    {{-- <div class="flex items-center">
                        <button class="flex text-sm text-blue-500 focus:outline-none"><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">1</span> Contacts</button>
                        <button class="flex text-sm text-gray-700 ml-8 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">2</span> Shipping</button>
                        <button class="flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span> Payments</button>
                    </div> --}}
                    
                    <form class="mt-8 lg:w-3/4" method="POST" action="{{route('checkout')}}">
                        @csrf
                        <div >
                            <h4 class="text-sm text-gray-500 font-medium">Delivery method</h4>
                            <div class="mt-6">
                                <div class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none">
                                    <label class="flex items-center">
                                        <input type="radio" name="deliverytype" id="prime" class="form-radio h-5 w-5 text-blue-600" value="prime" checked><span class="ml-2 text-sm text-gray-700">Prime Delivery (Delivery in 2 days)</span>
                                    </label>

                                    <span class="text-gray-600 text-sm">$30</span>
                                </div>
                                
                                <div class="mt-6 flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none">
                                    <label class="flex items-center">
                                        <input type="radio" name="deliverytype" id="normal" class="form-radio h-5 w-5 text-blue-600" value="normal"><span class="ml-2 text-sm text-gray-700">Normal Delivery (Delivery within a week)</span>
                                    </label>

                                    <span class="text-gray-600 text-sm">$10</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Delivery address</h4>
                            <div class="mt-6 flex">
                                {{-- <label class="block w-3/12">
                                    <select class="form-select text-gray-700 mt-1 block w-full">
                                        <option>NY</option>
                                        <option>DC</option>
                                        <option>MH</option>
                                        <option>MD</option>
                                    </select>
                                </label> --}}
                                <label class="block flex-1 ml-3">
                                    <input type="text" name="addresss" class="form-input mt-1 block w-full text-gray-700" placeholder="Address">
                                </label>
                            </div>
                        </div>
                        {{-- <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Date</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1">
                                    <input type="date" name="date" class="form-input mt-1 block w-full text-gray-700" placeholder="Date">
                                </label>
                            </div>
                        </div> --}}

                        <div class="flex items-center justify-between mt-8">
                            {{-- <button class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                <span class="mx-2">Back step</span>
                            </button> --}}
                            <button type="submit" class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Payment</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center lg:justify-end">
                        <div class="border rounded-md max-w-md w-full px-4 py-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-700 font-medium">Order total ({{$carts->count()}})</h3>
                                <span class="text-gray-600 text-sm">Total: ${{$total}}</span>
                            </div>
                            @foreach ($carts as $item)
                            <div class="flex justify-between mt-6 z-10">
                                <div class="flex">
                                    <img class="h-20 w-20 object-cover rounded" src="{{asset('storage/product_images/'.$item->image)}}" alt="">
                                    <div class="mx-3">
                                        <h3 class="text-sm text-gray-600">{{$item->name}}</h3>
                                        <div class="flex items-center mt-2">
                                            
                                            <span class="text-gray-700 mx-2">{{$item->company}}</span>
                                            
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <span class="text-gray-700 mx-2 m-4 float-right">Quantity:{{$item->quantity}}</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-600">${{(int)$item->price}}@if ($item->quantity>1) *{{$item->quantity}}@endif</span>
                                
                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
</div>
@endsection