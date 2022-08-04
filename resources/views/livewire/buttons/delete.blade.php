
<div class="bg-red-200 rounded">
    <a
        wire:click="confirmPostDeletion"
        wire:loading.attr="desabled"
        class="cursor-pointer">
        
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" class=" w-4 h-4 text-red-500"stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
    </a>

    <x-jet-dialog-modal wire:model="confirmingPostDeletion">
        <x-slot name="title">
            {{__ ('Detete Post')}}
        </x-slot>

        <x-slot name="content">
            {{__ ('Are you sure you want to delete the post?')}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button 
            wire:click = "$toggle('confirmingPostDeletion')"
            wire:loading.attr= "disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button 
            wire:click = "deletePost"
            wire:loading.attr= "disabled">
                {{ __('Delete Post') }}
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
