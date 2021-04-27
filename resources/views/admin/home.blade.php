@extends('layouts.admin')
@section('content1')

<div class="w-4/12 bg-white p-6 rounded-lg">
    <div class="w-4/12 bg-white p-8 rounded-lg">
    Admin Home page
    </div>
    <a type="button" style="text-align:center;" href="{{ route('adminProducts')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Products</a>
</div>
<hr class="my-3">
<div class="w-4/12 bg-white p-6 rounded-lg">
    <div class="w-4/12 bg-white p-8 rounded-lg">
    View All Products
    </div>
    <a type="button" style="text-align:center;" href="{{ route('adminProducts.show')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Products</a>
</div>
@include('layouts.footer')
@endsection