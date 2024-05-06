 @extends('backend.master');
 @section('contant')
     <div class="container">
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Product Update</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{'/admin/product/update/'.$product->id}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="card-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Product name</label>
                         <input type="text" value="{{ $product->name }}" class="form-control" id="name"
                             name="name" placeholder="Enter product name" required>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Category</label>
                         <select name="cat_id" id="cat_id" class="form-control">
                             @foreach ($products as $Category)
                                 <option value="{{ $Category->id }}" @if ($product->cat_id == $Category->id) selected @endif>
                                     {{ $Category->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Sub Category</label>
                         <select name="subcat_id" id="subcat_id" class="form-control">
                             @foreach ($subproducts as $subproduct)
                                 <option value="{{ $subproduct->id }}" @if ($product->cat_id == $subproduct->id) selected @endif>
                                     {{ $subproduct->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Quantity</label>
                         <input type="number" value="{{ $product->quantity }}" class="form-control" id="name"
                             name="quantity" placeholder="Enter quantity" required>
                     </div>
                     <div class="form-group" id="colors">
                         <label for="exampleInputEmail1">Add color</label>
                         @foreach ($product->color as $colors)
                             <input type="text" value="{{ $colors->color }}" class="form-control mt-3" id="color"
                                 name="color[]"placeholder="Enter color">
                         @endforeach

                     </div>
                     <button id="add_color" type="button" class="btn btn-info">Add More Color</button>
                     <div class="form-group" id="sizes">
                         <label for="exampleInputEmail1">Add size</label>
                         @foreach ($product->size as $sizes)
                             <input type="text" value="{{ $sizes->name }}" class="form-control mt-3" id="size"
                                 name="size[]" placeholder="Enter size">
                         @endforeach

                     </div>
                     <button id="add_size" type="button" class="btn btn-info">Add More size</button>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Buy price</label>
                         <input type="number" value="{{$product->buy_price}}" class="form-control" id="name" name="buy_price"
                             placeholder="Enter buy price" required>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Discount price</label>
                         <input type="number" value="{{ $product->discount_price }}" class="form-control" id="name"
                             name="discount_price" placeholder="Enter discount price">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Regular price</label>
                         <input type="number" value="{{ $product->regular_price }}" class="form-control" id="name"
                             name="regular_price" placeholder="Enter regular price" required>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Product type</label>
                         <select class="form-control" name='product_type' id=''>
                             <option selected disabled>select product type</option>
                             <option value="hot" @if ($product->product_type == 'hot') selected @endif>Hot Product</option>
                             <option value="new" @if ($product->product_type == 'new') selected @endif> new Product </option>
                             <option value="regular" @if ($product->product_type == 'regular') selected @endif>Regular product
                             </option>
                             <option value="discount" @if ($product->product_type == 'discount') selected @endif>Discount price
                             </option>

                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Short description</label>
                         <textarea id="summernote" name="short_desc"> 
                            {{ $product->short_desc }}
                      </textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">long description</label>
                         <textarea id="summernote1" name="long_desc"> 
                            {{$product->long_desc}}
                      </textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Product policy</label>
                         <textarea id="summernote2" name="product_policy">
                            {{ $product->product_policy }} 
                      </textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputFile">Input photo</label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="exampleInputFile" name="image"
                                     accept="image/*">
                                 <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                             </div>
                             <div class="input-group-append">
                                 <span class="input-group-text">Upload</span>
                             </div>
                         </div>
                     </div>
                     <img src="{{ asset('backend/image/product/' . $product->image) }}" height="100px" width="100px"
                         class="rounded">
                     <div class="form-group">
                         <label for="exampleInputFile">Input GallaryImage</label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="exampleInputFile"
                                     name="GallaryImage[]" accept="image/*" multiple>
                                 <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                             </div>
                             <div class="input-group-append">
                                 <span class="input-group-text">Upload</span>
                             </div>
                         </div>
                     </div>
                     @foreach ($product->gallaryimage as $image)
                     <img src="{{asset('backend/image/gallaryimage/'.$image->gallary_image)}}" height="80px" width="80px" class="rounded-circle">
                     
                         
                     @endforeach
                     
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
         $(document).ready(function() {
             $("#add_color").click(function() {
                 $("#colors").append(
                     '<input type="text" class="form-control mt-3" id="color" name="color[]"placeholder="Enter color" >'
                 )

             });
         });
         $(document).ready(function() {
             $("#add_size").click(function() {
                 $("#sizes").append(
                     '<input type="text" class="form-control mt-3" id="size" name="size[]"placeholder="Enter size" >'
                 )

             })
         })
     </script>
 @endpush
