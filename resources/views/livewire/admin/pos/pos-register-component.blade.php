<div>
    ,<div class="container-fluid">
        <h2>{{ __('Pos Register') }}</h2>
        <hr>

        <div class="card">
            <div class="card-body">
                <div class="row p-2">
                    <div class="">
                        <label for="">cash</label>
                    <input type="number" class="form-control" min="0" value="0" wire:model.defer="cash"/><br>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="open_casher"><i class="fas fa-paper-plane"></i> {{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
