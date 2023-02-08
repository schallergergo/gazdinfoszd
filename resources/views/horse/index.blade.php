

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Horses') }}
        </h2>
    </x-slot>

    <div class="py-8">

         <div class="pt-5">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 0 dark:bg-gray-800  sm:rounded-lg">

      

	           <div class="grid grid-cols-4 gap-3">
	           		@foreach($horses as $horse)
					<div class="flex">
					  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
					    <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{$horse->name}}</h5>
					    <p class="text-gray-700 text-base mb-4">
					      Some quick example text to build on the card title and make up the bulk of the card's
					      content.
					    </p>
					    <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
					  </div>
					</div>
					@endforeach
	             </div>


                </div>
            </div>

        

        </div>
    </div>
</x-app-layout>
