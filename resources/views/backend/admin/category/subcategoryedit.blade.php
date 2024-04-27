@extends('backend.master')
@section('contant')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sub Creat edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/admin/sub-category/update/'.$subcategory->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">sub Category name</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <option disabled selected>select category</option>
                            @foreach ($category as $cats)
                                <option name="opt-val" name='subcat' value="{{$cats->id}}" @if ($cats->id == $subcategory->cat_id)
                                    selected
                                @endif class="form-control">{{ $cats->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="category_name">
                        <input type="text" value="{{$subcategory->name}}" class="form-control" placeholder="sub_category name" name="name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection