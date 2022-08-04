<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tad') }}
        </h2>
    </x-slot>

    <x-slot name="nav">

        {{-- Index --}}
        <x-jet-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.index')">
            {{ __('Index') }}
        </x-jet-nav-link>

        {{-- Create --}}
        <x-jet-nav-link href="{{ route('tags.create') }}" :active="request()->routeIs('tags.create')">
            {{ __('Create') }}
        </x-jet-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="p-6">
                <form action="{{ route('tags.update',$tag) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-jet-label for="name" value="{{ __('Tag Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$tag->name" required autofocus autocomplete="name" />
                        
                        <span class="text-xs text-gray-400 p-2">Maximum charechters 200</span>
                        
                        <x-jet-input-error for="name" class="mt-2"/>
                        
                    </div>
                    <x-jet-button class="mt-8">
                        {{ __('Update') }}
                    </x-jet-button>
    
                  </form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>