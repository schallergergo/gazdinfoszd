
@if (auth()->user()==null)

@extends('errors.minimal')

@section('title', __('Not found'))
@section('code', '404')
@section('message', __('Not found'))


@else
<x-app-layout>


<div class="flex items-center justify-center ">
  <div class="px-4 lg:py-12">
    <div class="lg:gap-4 lg:flex">
      <div
        class="flex flex-col items-center justify-center md:py-24 lg:py-32"
      >
        <h1 class="font-bold text-gray-500 text-9xl">404</h1>
        <p
          class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl"
        >
          Page not found
        </p>
        <p class="mb-2 text-2xl font-bold text-center text-gray-500 md:text-xl">
          The page you’re looking for doesn’t exist, just like this horsephin!
        </p>
       
      </div>
      <div class="mt-4 rounded-lg">
        <img
          src="/storage/img/horse_dolphin.png"
          alt="img"
          class="object-cover "
        />
      </div>
    </div>
  </div>
</div>
</x-app-layout>


@endif