<div>
    @include('message')
    <div class="container-fluid">
        <div wire:loading >
            <div class="spinner-border"  role="status">
                <span class="sr-only"></span>
              </div>
        </div>
            {{-- @if (session()->has('message'))
                <script>
                    toastr.success("{{ session('message') }}","{{ config('app.name') }}");
                </script>
            @elseif(session()->has('error'))
                <script>
                    toastr.error("{{ session('message') }}","{{ config('app.name') }}");
                </script>
            @endif --}}

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
         <div class="card-body table-responsive p-0" style="height: 400px;">
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
                     <td colspan="5" class="text-center  p-3 text-bold text-danger">No Data Found</td>
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



