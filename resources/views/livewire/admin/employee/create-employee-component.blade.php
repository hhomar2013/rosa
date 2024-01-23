<div class="col-md-4">
    <!-- general form elements -->
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title">New Employee</h3>
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
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1" placeholder="Phone" maxlength="11" wire:model.defer="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword1" placeholder="Address" wire:model.defer="address">
                    @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="text" class="form-control @error('salary') is-invalid @enderror" id="exampleInputPassword1" placeholder="Salary" wire:model.defer="salary">
                    @error('salary') <span class="text-danger">{{ $message }}</span>@enderror
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
