{{-- @extends('backend.master')
@section('contant')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/admin/category/update/'.$categoryedit->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category name</label>
                        <input type="text" class="form-control" value="{{$categoryedit->name}}" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Input photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="exampleInputFile" name="image" accept="image/*">
                                <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>                          
                        </div> 
                        <img src="{{asset('backend/image/category/'. $categoryedit->image) }}" height="80px" width="100px" >                    
                    </div>  
                </div>
                <!-- /.card-body -->
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection --}}
