<div class="col-md-4">
    <!-- general form elements -->
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title">New Bank</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body ">
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary" wire:click.prevent="save">Submit <i class="fa fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
