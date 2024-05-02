@extends('backend.master');
@section('contant')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serisal no:</th>
                            <th>Name</th>
                            <th>
                                Image
                            </th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>buy price</th>
                            <th>regular price</th>
                            <th>discount price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{asset('backend/image/product/'. $product->image) }}" alt="category" height="60px" width="80px">
                                </td>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->quantity}}</td>
                                <td>{{ $product->buy_price }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <a href="{{url('/admin/product/edit/'.$product->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('/admin/product/delete/' .$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                        @endforeach
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
                           
                    @endsection;
                    @push('script')
                        <script>
                            $(function() {
                                $("#example1").DataTable({
                                    "responsive": true,
                                    "lengthChange": false,
                                    "autoWidth": false,
                                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                $('#example2').DataTable({
                                    "paging": true,
                                    "lengthChange": false,
                                    "searching": false,
                                    "ordering": true,
                                    "info": true,
                                    "autoWidth": false,
                                    "responsive": true,
                                });
                            });
                        </script>
                    @endpush;
