<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

				 <section>
				    <header>
				        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
				            {{ __('Profile Information') }}
				        </h2>

				        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
				            {{ __("Update your account's profile information and email address.") }}
				        </p>
				    </header>

				
				    <form method="post" action="{{ route('horse.update', ['horse'=>$horse->id]) }}" class="mt-6 space-y-6">
				        @csrf
				        @method('patch')
				        <!-- Horse name -->
				        <div>
				            <x-input-label for="name" :value="__('Name')" />
				            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $horse->name)" required />
				            <x-input-error class="mt-2" :messages="$errors->get('name')" />
				        </div>

				         <!-- Birth date -->
				        <div>
				            <x-input-label for="birthdate" :value="__('Birth date')" />
				            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate',$horse->birthdate)" />
				            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
				        </div>

				         <!-- Gender-->
				        <div>
				            <x-input-label for="gender" :value="__('Gender')" />
				            <x-select-input id="gender" name="gender" class="mt-1 block w-full rounded" />
				            	<option>{{__("Select gender")}}</option>
					            <option value="stallion" @if ($horse->gender="stallion") selected @endif>{{__("Stallion")}}</option>
					            <option value="mare" @if ($horse->gender="mare") selected @endif>{{__("Mare")}}</option>
					            <option value="gelding" @if ($horse->gender="gelding") selected @endif>{{__("Gelding")}}</option>
				        	</select>
				            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
				        </div>


				         <!-- Color -->
				        <div>
				            <x-input-label for="color" :value="__('Color')" />
				            <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $horse->color)" />
				            <x-input-error class="mt-2" :messages="$errors->get('color')" />
				        </div>


				         <!-- Passport number -->
				        <div>
				            <x-input-label for="passport_number" :value="__('Passport number')" />
				            <x-text-input id="passport_number" name="passport_number" type="text" class="mt-1 block w-full" :value="old('passport_number', $horse->passport_number)" />
				            <x-input-error class="mt-2" :messages="$errors->get('passport_number')" />
				        </div>

				         <!-- FEI /Licence number -->
				        <div>
				            <x-input-label for="FEI_number" :value="__('FEI/Licence number')" />
				            <x-text-input id="FEI_number" name="FEI_number" type="text" class="mt-1 block w-full" :value="old('FEI_number',$horse->FEI_number)" />
				            <x-input-error class="mt-2" :messages="$errors->get('FEI_number')" />
				        </div>

				        <!-- Textarea -->
				        <div>
				            <x-input-label for="comments" :value="__('Comments')" />
				            <x-textarea-input id="comments" name="comments" type="text" class="mt-1 block w-full" :content="$horse->comments" />
				            <x-input-error class="mt-2" :messages="$errors->get('comments')" />
				        </div>



				        <div class="flex items-center gap-4">
				            <x-primary-button>{{ __('Save') }}</x-primary-button>
				        </div>
				    </form>
				</section>



                </div>
            </div>

        

        </div>
    </div>
</x-app-layout>
