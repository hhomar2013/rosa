<div class="col-md-4">
        <!-- general form elements -->
        <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Modify Categories</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>

            {{-- @csrf --}}
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label></label>
                <input wire:model="cat_id" type="hidden"/>
                <input wire:model="name" type="text" class="form-control" placeholder="cteogry Name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="form-check">
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="active" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Active</label>
                </div>
            </div> --}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button class="btn btn-success" wire:click.prevent="update()">update <i class="fa fa-edit"></i></button>
            <button class="btn btn-danger" wire:click.prevent="cancel()">Cancel</button>

            </div>
        </form>
        </div>
        <!-- /.card -->
</div>
