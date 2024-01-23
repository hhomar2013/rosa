<div>
    @include('message')
    <div class="custom-control custom-switch">
        <input wire:model="isPublished" name="toggle-{{ $model->id }}" type="checkbox" class="custom-control-input" id="toggle-{{ $model->id }}">
        <label class="custom-control-label" for="toggle-{{ $model->id }}"></label>
    </div>
</div>




