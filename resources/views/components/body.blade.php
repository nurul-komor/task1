@extends('components.header')
<div class="max-w-[1300px] mx-auto p-4">
    @if (session('message'))
        <p class="text-green-500">
            {{ session('message') }}
        </p>
    @endif
    @yield('body')
</div>

@include('components.footer')
