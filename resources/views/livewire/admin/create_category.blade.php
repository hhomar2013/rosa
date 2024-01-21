<div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Categories Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            {{-- @csrf --}}
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label></label>
                <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="cteogry Name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
           {{-- <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option ion>Washington</option>
                </select>
              </div> --}}

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" wire:click.prevent="save">Save <i class="fa fa-save"></i></button>
            </div>
        </form>
        </div>
        <!-- /.card -->
</div>
</div>
