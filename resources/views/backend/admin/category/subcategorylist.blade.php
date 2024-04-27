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
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $subItem)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$subItem->name}}</td>
                                <td>{{$subItem->Category->name}}</td>
                            
                                <td>
                                    <a href="{{url('/admin/sub-category/edit/'.$subItem->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('/admin/sub-category/delete/'.$subItem->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
