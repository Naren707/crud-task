@extends('layouts')
@section('content')
    <br> <br>
    
    <!-- State saving -->
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered datatable-save-state">
                <thead>
                <tr>
                    <th><label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="bg_check_all" id="bg_check_all" value="1" onClick="check_all('table_list',this.id,$('#bg_count').val(),'bg_check');">
                            <span class="custom-control-label"></span>
                        </label>
                        <input type="hidden" name="bg_count" id="bg_count" value="<?php echo (isset($bg) && !empty($bg)) ? sizeof($bg) : 0; ?>"/>
                    </th>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Short Desc</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($products) && !empty($products))
                    @foreach($products as
                    $k=>$v)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ ucfirst($v->name) }}</td>
                            <td>{{ ucfirst($v->sku) }}</td>
                            <td>{{ ucfirst($v->short_description) }}</td>
                            <td>{{ ucfirst($v->quantity) }}</td>
                            <td>{{ ucfirst($v->price) }}</td>
                            <?php $img = !empty($v->images) ? asset(config('constants.bg_photo_path').$v->images) : "http://placehold.it/50x50"; ?>
                            <td><img src="{{ $img }}" class="img-fluid img-thumbnail" alt="{{ $v->name}}" height="50" width="50"></td>
                            <td><a href="{{ route('product_edit', $v->id) }}" role="button" class="btn icon-btn btn-sm btn-outline-info">
                                    <span class="fas fa-pencil-alt"></span>
                                </a>
                                <button type="button" id="delete_btn{{ $k }}" class="btn icon-btn btn-sm btn-outline-danger" onclick="master_delete('{{ trans('db_table.db_product') }}', 'id', {{ $v->id}}, '{{ trans('master.product.id') }}')" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                    <span class="fas fa-trash-alt"></span>
                                </button></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- /state saving -->
  
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" name="product_form" id="product_form" action="{{ route('product_submit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku"  placeholder="SKU" class="form-control" value="{{ old('sku') }}">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description') }}</textarea>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity"   class="form-control" value="{{ old('quantity') }}">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Price</label>
                            <input type="number" name="price"  class="form-control" value="{{ old('price') }}">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="images" id="images" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</a>
                    </div>
                </form>
            </div>
        </div>
 

@endsection
