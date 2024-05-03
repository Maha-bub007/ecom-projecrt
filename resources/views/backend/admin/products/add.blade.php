@extends('backend.master');
@section('contant')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Creat Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/admin/product/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter product name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Category</label>
                        <select name="subcat_id" id="subcat_id" class="form-control">
                            
                            @foreach ($subproducts as $subproduct)
                                <option value="{{ $subproduct->id }}">{{ $subproduct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" class="form-control" id="name" name="quantity"
                            placeholder="Enter quantity" required>
                    </div>
                    <div class="form-group" id="colors">
                        <label for="exampleInputEmail1">Add color</label>
                        <input type="text" class="form-control" id="color" name="color[]"placeholder="Enter color" >
                    </div>
                    <button id="add_color" class="btn btn-info">Add More Color</button>
                    <div class="form-group" id="sizes">
                        <label for="exampleInputEmail1">Add size</label>
                        <input type="text" class="form-control" id="size" name="size[]"
                            placeholder="Enter size" >
                    </div>
                    <button id="add_size" class="btn btn-info">Add More size</button>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Buy price</label>
                        <input type="number" class="form-control" id="name" name="buy_price"
                            placeholder="Enter buy price" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Discount price</label>
                        <input type="number" class="form-control" id="name" name="discount_price"
                            placeholder="Enter discount price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Regular price</label>
                        <input type="number" class="form-control" id="name" name="regular_price"
                            placeholder="Enter regular price" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">sqy_code</label>
                        <input type="text" class="form-control" id="name" name="sqy_code"
                            placeholder="Enter sku_code" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product type</label>
                        <select class="form-control" name='product_type' id=''>
                            <option selected disabled>select product type</option>
                            <option value="hot">Hot Product</option>
                            <option value="new">new Product </option>
                            <option value="regular">Regular product</option>
                            <option value="discount">Discount price</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Short description</label>
                        <textarea id="summernote" name="short_desc"> 
                      </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Long description</label>
                        <textarea id="summernote1" name="long_desc"> 
                      </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product policy</label>
                        <textarea id="summernote2" name="product_policy"> 
                      </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Input photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image"
                                    accept="image/*" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Input GallaryImage</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="GallaryImage[]"
                                    accept="image/*" multiple required>
                                <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
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
@push('script')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('#summernote1').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#add_color").click(function(){
                $("#colors").append('<input type="text" class="form-control mt-3" id="color" name="color[]"placeholder="Enter color" >')

            });
        });
        $(document).ready(function(){
            $("#add_size").click(function(){
                $("#sizes").append('<input type="text" class="form-control mt-3" id="size" name="size[]"placeholder="Enter size" >')

            })
        })

        
    </script>
@endpush
