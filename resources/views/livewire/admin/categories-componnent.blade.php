<div>
    <div class="container-fluid">
            @if (session()->has('message'))
                {{-- <div class="alert alert-success">
                {{ session('message') }}
                </div> --}}
                <script>
                    toastr.success("{{ session('message') }}","{{ config('app.name') }}");
                </script>
            @endif
            @if ($update)
            @include('livewire.admin.update_category')
            @else
            @include('livewire.admin.create_category')
            @endif
    </div>

     <div class="col-12">
       <div class="card">
         <div class="card-header bg-dark">
           <h3 class="card-title ">Category Table</h3>

           <div class="card-tools">
             <div class="input-group input-group-sm" style="width: 150px;">
               <input type="text" wire:model="search" name="table_search" class="form-control float-right" placeholder="Search">

               <div class="input-group-append">
                 <button type="submit" class="btn btn-default">
                   <i class="fas fa-search"></i>
                 </button>
               </div>
             </div>
           </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body table-responsive p-0" style="height: 200px;">
           <table class="table table-head-fixed text-nowrap table-hover table-bordered text-center table-sm">
             <thead>
               <tr>
                 <th >#</th>
                 <th >Name</th>
                 <th >Sub</th>
                 <th >Status</th>
                 <th ><i class="fas fa-cogs"></i></th>
               </tr>
             </thead>
             <tbody>
                 <?php $i =1; ?>
                 @forelse ($categories as $val)
                 <tr>
                     <td>{{ $i++ }}</td>
                     <td>{{ $val->name }}</td>
                     <td>
                        @foreach ($val->children  as $child )
                        <a class="btn bg-primary  btn-sm text-center" ondblclick="delete_cat({{ $child->id }})" wire:click="edit({{ $child->id }})" >{{ $child->name }}</a>
                        @endforeach
                     </td>
                     <td>
                         @livewire('switcher', ['model' => $val, 'field' => 'status'], key($val->id))
                     </td>
                     <td>
                        <button class="btn btn-primary btn-sm" wire:click="edit({{ $val->id }})"><i class="fas fa-edit"></i></button> &nbsp;
                        <button class="btn btn-danger btn-sm" onclick="delete_cat({{ $val->id }})"><i class="fas fa-trash"></i></button>
                     </td>
                   </tr>
                 @empty
                 <tr >
                     <td colspan="4" class="text-center bg-danger">No Data Found</td>
                 </tr>
                 @endforelse




             </tbody>
           </table>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
                 {{ $categories->links() }}
         </div>
       </div>
       <!-- /.card -->
     </div>

 </div>
<script>


    function delete_cat($id){
        // if(confirm("Are you sure to delete this item ?")){
        //     window.livewire.emit('delete_cat',$id);
        // }

            Swal.fire({
            title: 'Are you sure?',
            // text: "Are you sure to delete this item ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete_cat',$id);
            }
            })
    }


</script>
