<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <x-slot name="nav">

        {{-- Index --}}
        <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
            {{ __('Index') }}
        </x-jet-nav-link>

        {{-- Create --}}
        <x-jet-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
            {{ __('Create') }}
        </x-jet-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="p-6">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div>
                        <small class="mb-4 text-gray-500">Note: Select Parent only for Sub Category </small>
                        <select name="parent_id" id="" class="w-full mb-6 border-none bg-indigo-200 rounded-md">
                            <option value="">Select Parent Category</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>  
                            @endforeach
                            
                        </select>
                    </div>
                    <div>
                        <x-jet-label for="name" value="{{ __('Category Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        
                        <span class="text-xs text-gray-400 p-2">Maximum charechters 200</span>
                        
                        <x-jet-input-error for="name" class="mt-2"/>
                        
                    </div>
                    <x-jet-button class="mt-8">
                        {{ __('Create') }}
                    </x-jet-button>
    
                  </form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>