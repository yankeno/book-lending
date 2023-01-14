@props(['status' => 'info'])
@php
    if (session('status') === 'info') {
        $textColor = 'text-blue-500';
    }
    if (session('status') === 'alert') {
        $textColor = 'text-red-500';
    }
@endphp
@if (session('message'))
    <div class="{{ $textColor }} w-1/4 mx-auto my-1 text-lg">
        {{ session('message') }}
    </div>
@endif
