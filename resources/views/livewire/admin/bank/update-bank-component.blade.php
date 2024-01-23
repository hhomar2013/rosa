<div class="col-md-4">
    <!-- general form elements -->
    <div class="card card-success ">
        <div class="card-header">
            <h3 class="card-title">Modify Bank</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body ">
                <div class="form-group">
                    <input type="hidden" wire:model.defer="bankId">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="name" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Start Money</label>
                    <input type="text" class="form-control @error('start_money') is-invalid @enderror" id="exampleInputPassword1" placeholder="Start Money" maxlength="11" wire:model.defer="start_money">
                    @error('start_money') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">End Money</label>
                    <input type="text" class="form-control @error('end_money') is-invalid @enderror" id="exampleInputPassword1" placeholder="End Money" wire:model.defer="end_money">
                    @error('end_money') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success" wire:click.prevent="update">Submit <i class="fa fa-paper-plane"></i></button>
                <button type="submit" class="btn btn-danger" wire:click.prevent="cancel">Cancel <i class="fa fa-times"></i></button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
