<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-lg">
        <x-card title="Edit your account">
            <x-input label="Name"
                placeholder="your name"
                hint="Inform your full name"
                wire:model="user.name" />

            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button label="Save"
                        primary
                        wire:click="save" />
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
