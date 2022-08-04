<div class="max-w-7xl mx-auto">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        
        {{-- Main Heading --}}
        <div class="flex w-full p-3 space-x-2">
            <div class="w-3/6">
                <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal
                leading-sung text-center text-gray-400 bg-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                </span>

                <input wire:model.debounce.300ms='search' type="text" class="relative
                w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none
                rounded shadow-inner focus:bg-indigo-100  outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:border-indigo-50"
                placeholder="Search Post...">

            </div>

            {{-- Orderby --}}
            <div class="relative w-1/6">
                <select wire:model='orderBy' name="" id="" class="relative w-full px-3 py-3 pl-10
                text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none
                rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0
                focus:bg-indigo-100">

                <option value="id">ID</option>
                <option value="title">Title</option>
                <option value="created_at">Created at</option>
                </select>

            </div>

            {{-- Order Asc --}}

            <div class="relative w-1/6">
                <select wire:model='orderAsc' name="" id="" class="relative w-full px-3 py-3 pl-10
                text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none
                rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0
                focus:bg-indigo-100">

                <option value="1">Asc</option>
                <option value="0">Desc</option>
                </select>

            </div>

            {{-- Per page --}}

            <div class="relative w-1/6">
                <select wire:model='perPage' name="" id="" class="relative w-full px-3 py-3 pl-10
                text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none
                rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0
                focus:bg-indigo-100">

                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                </select>

            </div>
        </div>
        
        {{-- Table --}}
        <table class="w-full divide-y divide-gray-200">
            <thead class="font-bold text-gray-500 bg-indigo-200">
                <tr>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Id
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Title
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Category 
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Featured 
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Created Date
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Updated Date
                    </th>


                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Actions
                    </th>
                </tr>

            </thead>
            
            <tbody class="text-xs divide-y divide-indigo-200 bg-indigo-50">
                
                @foreach ($posts as $post ) 

                <tr>
                    <td class="px-2 py-4 whitespace-nowrap">
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->id }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ Str::limit($post->title,40, '...') }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->category->name }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        FEATURED
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->created_at->format('d-F-Y') }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                       {{ $post->updated_at->format('d-F-Y') }}
                    </td>

                    <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <div class="flex justify-start space-x-1">

                            <a href="{{ route('posts.edit', $post) }}" class="p-1 border-2 border-indigo-300  hover:border-indigo-500 rounded-md ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-500" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>

                            {{-- Delete Buttons  --}}

                            <livewire:buttons.delete :post ="$post" :key = "$post->id" />
                                

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

           </table>

           {{-- paginate --}}
           <div class="p-2 bg-indigo-200">
                {{ $posts->links() }}
           </div>
    
    </div>
</div>