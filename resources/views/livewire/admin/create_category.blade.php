<div class="col-md-4">
        <!-- general form elements -->
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            {{-- @csrf --}}
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label></label>
                <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="cteogry Name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            @if($parent->Count() >0)
                <div class="form-group">
                    <label>Main Category</label>
                    <select class="form-control" style="width: 100%;" wire:model="parent_id">
                    <option selected="selected" value="{{ null }}">Main Category</option>
                        @foreach ($parent as $val_parent )
                        <option value="{{ $val_parent->id }}">{{ $val_parent->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" wire:click.prevent="save">
                    Save
                    <i class="fa fa-save"></i>
                </button>


            </div>


        </form>
        </div>
        <!-- /.card -->
</div>

