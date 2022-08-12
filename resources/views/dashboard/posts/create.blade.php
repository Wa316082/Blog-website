<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name="nav">

        {{-- Index --}}
        <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
            {{ __('Index') }}
        </x-jet-nav-link>

        {{-- Create --}}
        <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
            {{ __('Create') }}
        </x-jet-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="p-6">
                
                <x-form action="{{ route('posts.store') }}" has-files>     {{-- X blasde form --}}
                    
                   <div class="space-y-6">
                     {{-- Cover Image --}}
                     <div>
                        <x-jet-label for="cover_image" value="{{ __('Cover Image') }}" />
                        <input type="file" name="cover_image" id="cover_image">
                        <span class="text-xs text-gray-400 p-2">File type: png, jpg etc</span>
                        <x-jet-input-error for="cover_image" class="mt-2"/>
                        
                    </div>

                        {{-- Title --}}
                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            
                            <span class="text-xs text-gray-400 p-2">Maximum charechters 200</span>
                            
                            <x-jet-input-error for="title" class="mt-2"/>
                            
                        </div>

                        {{-- Category --}}
                        <x-jet-label for="category_id" value="{{ __('Categoies') }}" />
                        <select name="category_id" id="categpry_id" class="border-gray-300 focus:border-indigo-300 focus:ring 
                        focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                           <option value="">Please select a Category </option>
                        @foreach ($categories as $category )
                               <option value="{{ $category->id }}">{{ $category->name }}</option> 
                            @endforeach
                        </select>
                        <x-jet-input-error for="category_id" class="mt-2"/>

                        {{-- Body --}}
                        <div>
                            <x-jet-label for="body" value="{{ __('body') }}" />
                            <x-trix name="body" styling=" overflow-y-scroll h-96"></x-trix>
                            <x-jet-input-error for="body" class="mt-2"/>
                        </div>

                        {{-- Schedule --}}
                        <div>
                            <x-jet-label for="published_at" value="{{ __('Schedule Date') }}" />
                            <x-pikaday name="published_at" format="YYYY-MM-DD" id="SomeID" />
                            <x-jet-input-error for="piblished_at" class="mt-2"/>
                        </div>

                        {{-- Tags (into the tags components)--}}
                        
                        <x-tags :tags="$tags" />

                        {{-- Meta Descriptions --}}
                        <div>
                            <x-jet-label for="meta_description" value="{{ __('Meta Description') }}" />
                            <x-trix name="meta_description" styling="overflow-y-scroll h-40"></x-trix>
                            <x-jet-input-error for="meta_description" class="mt-2"/>
                        </div>

                        <x-jet-button class="mt-8">
                            {{ __('Create') }}
                        </x-jet-button>
                   </div>
    
                </x-form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>