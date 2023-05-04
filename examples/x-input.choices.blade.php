<div class="flex flex-col">
    <label class="mb-2.5 text-base font-semibold text-dark" for="project">Project</label>
    <x-input.select class="f-size-full w100" wire:model="project_id" label="Choose a project"
        config="{paste: false, removeItems: false, removeItemButton: false}" :items="$projects->toArray()" />
    @error('project_id')
        <span>{{ $message }}</span>
    @enderror
</div>
