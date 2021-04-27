@extends('layouts.app')
@section('content')
<h3  class="text-2xl font-medium">Your Recent Orders:</h3><br>
{{-- <div class="flex flex-col p-3 divide-y divide-gray-500 overflow-y-auto">
    <h3  class="text-2xl font-medium">Your Recent Orders:</h3><br>
    <div class=" m-2 h-40">1</div>
    <div class=" m-2 h-40">2</div>
    <div class=" m-2 h-40">3</div> --}}
    {{-- <div class="bg-red-200 m-2 h-20">1</div>
    <div class="bg-red-200 m-2 h-20">2</div>
    <div class="bg-red-200 m-2 h-20">3</div>
    <div class="bg-red-200 m-2 h-20">1</div>
    <div class="bg-red-200 m-2 h-20">2</div> --}}
    {{-- <div class="bg-red-200 m-2 h-20">3</div>
    <div class="bg-red-200 m-2 h-20">1</div>
    <div class="bg-red-200 m-2 h-20">2</div>
    <div class="bg-red-200 m-2 h-20">3</div>
    <div class="bg-red-200 m-2 h-20">1</div>
    <div class="bg-red-200 m-2 h-20">2</div>
    <div class="bg-red-200 m-2 h-20">3</div>
    <div class="bg-red-200 m-2 h-20">1</div>
    <div class="bg-red-200 m-2 h-20">2</div>
    <div class="bg-red-200 m-2 h-20">3</div> --}}

  {{-- </div> --}}
  <div class="grid grid-cols-1 p-3 divide-y divide-gray-500 overflow-y-auto">
    <div class="h-40">1</div>
    <div class="h-40">2</div>
    <div class="h-40">3</div>
    <div class="h-40">2</div>
  </div>
  
  @include('layouts.footer')
@endsection