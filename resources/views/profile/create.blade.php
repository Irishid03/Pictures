<x-guest-layout>
    <form method="POST" action="{{ route('profile.store') }}">
        @csrf

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="mt-4">
            <x-input-label for="Location" :value="__('Location')" />
            <x-text-input id="Location" class="block mt-1 w-full" type="text" name="Location" :value="old('Location')" required autocomplete="Location" />
            <x-input-error :messages="$errors->get('Location')" class="mt-2" />
        </div>

        <!-- Camera Information -->
        <div class="mt-4"> 
            <x-input-label for="camera_info" :value="__('Camera information')" />
            <x-text-input id="camera_info" class="block mt-1 w-full" type="text" name="camera_info" :value="old('camera_info')" required autocomplete="camera_info" />
            <x-input-error :messages="$errors->get('camera_info')" class="mt-2" />
        </div>

        <!-- Instagram -->
        <div class="mt-4">
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instagram')" required autocomplete="instagram" />
            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
        </div>

        <!-- Facebook -->
        <div class="mt-4">
            <x-input-label for="facebook" :value="__('Facebook')" />
            <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook')" required autocomplete="facebook" />
            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
        </div>

        <x-primary-button class="ml-4">
            {{ __('Register') }}
        </x-primary-button>
    </form>
</x-guest-layout>