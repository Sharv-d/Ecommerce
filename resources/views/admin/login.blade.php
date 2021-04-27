@extends('layouts.admin')
@section('content1')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('admin') }}" method="post">
            @csrf        
          
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="{{ old('email') }}">

               
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="">

               
            </div>

            

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Admin Login</button>
            </div>
        </form>
    </div>
</div>
@endsection