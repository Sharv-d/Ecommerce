<header>
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            
            
            <div class="flex items-center justify-end w-full">
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </button>

                <div class="flex sm:hidden">
                    <button @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        
    </div>
</header>
<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed z-10 right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>       
   
    <h3 class="font-small text-gray-700">{{$carts->count()}} Item(s) in your cart</h3>
    
    
    <hr class="my-3">
    
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
                        <div >
                        <form action="{{ route('addcart')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$item->id}} ">
                        <button type="submit" style="position:relative;float: right;" class="px-5 py-2 m-2 bg-indigo-600 f text-white text-sm font-medium rounded hover:bg-red-600 focus:outline-none focus:bg-indigo-500">Remove</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <span class="text-gray-600">${{$item->price}}</span>
            
        </div>
        @endforeach
  
   
    @if ($carts->count() > 0)
    <a href="{{route('checkout')}}" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
        <span>Chechout</span>
        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
    </a>
    @endif
    
</div>

