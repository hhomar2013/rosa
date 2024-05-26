<div>
   @if($pos_register)
        {{-- Start Info --}}
        <div class="container-fluid">
            <div class="row justify-content-between p-3">
            <div class="col-lg-6 ">
                <div class="input-group">
                <label for="">Order # <span wire:model="order_id">{{  $pos_id }}</span></label>
                </div>
            </div>
            <div class="col-6 text-right ">
                <div class="row ">
                    <div class="col-lg-4">
                        <select name="" id="" class="form-control">
                        <option value="">Walking customer</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <select name="" id="" class="form-control">
                        <option value="{{ null }}" selected>Employee</option>
                            @foreach($emp as $emp_value)
                                <option value="{{ $emp_value->id }}">{{ $emp_value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fas fa-receipt"></i>    {{ __('Pending Requests') }}
                            </button>
                        {{-- Start --}}

                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">{{ __('Orders') }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- End --}}


                    </div>
                </div>
            </div>
            </div>

        </div>
        {{-- End Info --}}

        <div class="container-fluid">

                <div class="row">
                    <div class="col-md-7">
                    <div class="row">
                        <div class="col-12">
                        {{-- <div class="card card-outline card-warning" style="height: 200px">


                        </div> --}}


                            {{--Start Parent Category  --}}
                            <div class="row position-relative">

                            <ul class="list-group  list-group-horizontal position-relative overflow-auto w-100">

                                @forelse($categories as $cat_val )
                                    {{-- <div class="col-1 p-2">
                                        <button type="submit" class="btn btn-dark w-100" style="height: 50px" wire:click.prevent="get_child('{{ $cat_val->id }}')">{{ $cat_val->name}}</button>
                                    </div> --}}

                                    <li class="list-group-item">
                                    <button type="submit" class="btn btn-dark" style="height: 70px; width: 70px;" wire:click.prevent="all_product('{{ $cat_val->id }}')">{{ $cat_val->name}}</button>
                                    </li>
                                @empty
                                       <p>empty</p>

                                @endforelse
                            </ul>
                            </div>{{--Parent Category--}}

                            {{-- Start Child Categories --}}
                            <div class="row p-1 position-relative overflow-auto">
                            <ul class="list-group list-group-horizontal position-relative overflow-auto w-100 ">
                                @foreach ($children as $child_val)
                                {{-- <div class="col-1 p-2"></div> --}}
                                <li class="list-group-item">
                                <button type="submit" class="btn btn-dark" wire:click.prevent="get_product('{{ $child_val->id }}')" style="height: 70px; width: 70px;">{{ $child_val->name}}</button>
                                </li>
                                @endforeach
                            </ul>
                            </div>
                            {{-- End  Child Categories --}}
                        </div>
                        {{-- <div class="col-12">
                        <div class="card card-outline card-danger" style="height: 200px">

                        </div>
                        </div> --}}


                        {{-- Show Product --}}
                            <div class="container" >
                                <hr>
                                <div class="row overflow-auto" style="height: 400px">
                                    @foreach ($productShow as $product_val )
                                    <div class="col-lg-2 p-2 " dir="rtl">
                                    <button type="submit" class="btn btn-secondary shadow" style="height: 70px; width: 100%;">
                                        {{ $product_val->name}} <br>
                                        {{  $product_val->price1 }} {{ __('Pound') }}
                                    </button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        {{--End Show Product --}}
                    </div>

                    </div>
                    {{-- Start Product Table Side --}}
                        <div class="col-md-5">
                            <div class="card card-outline card-primary " style="height: 90ch;">
                                {{-- start table --}}
                                    <table class="table table-sm table-bordered text-center table-striped">
                                        <tr class="bg bg-dark">
                                        <th class="w-50"><i class="fab fa-slack"></i> Product</th>
                                        <th class="w-25"><i class="fas fa-plus-circle"></i> Qty <i class="fas fa-minus-circle"></i></th>
                                        <th class="w-25"><i class="fas fa-money-check-alt"></i> Total </th>
                                        </tr>
                                        <tr>
                                        <td>قصه شعر</td>
                                        <td>
                                            {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> </button>
                                            <button class="btn">1</button>
                                            <button type="button" class="btn btn-secondary"><i class="fas fa-minus-circle"></i></button>
                                            </div> --}}
                                            <div class="input-group">
                                                <input type="number" name="" id="" class="form-control" min="1" value="1"/> &nbsp;
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>

                                        </td>
                                        <td>110</td>
                                        </tr>
                                    </table>
                                 {{-- end table --}}

                                <div class="card-body">

                                </div>
                                <div class="card-footer bg-dark">

                                    <div class="row">
                                        <div class="col-6">
                                            <h5>{{ __('total') }} : <span>200</span> {{ __('Pound') }} </h5>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-light btn-block btn-lg"><i class="far fa-credit-card"></i> {{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- Ends Product Table Side --}}

                    {{-- <div class="col-12">
                        <div class="card card-outline card-info" style="height: 100px">
                            <div class="card-body">

                            </div>
                        </div>
                    </div> --}}


                </div>
        </div>
   @else
   @include('livewire.admin.pos.pos-register-component')
   @endif

</div>
