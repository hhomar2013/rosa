<div>
    {{-- <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in bg-red-300">
        <input wire:model="isPublished"  type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div> --}}
    @include('message')
    <div class="custom-control custom-switch">
        <input wire:model="isPublished" name="toggle-{{ $model->id }}" type="checkbox" class="custom-control-input" id="toggle-{{ $model->id }}">
        <label class="custom-control-label" for="toggle-{{ $model->id }}"></label>
    </div>
</div>




