<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecomerce website</title>
  @include('backend.admin.include.hader')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('backend.admin.include.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.admin.include.sidevar')
  <div class="content-wrapper">
  @yield('contant')
  </div>

  @include('backend.admin.include.footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.admin.include.script')
@stack('script')
</body>
</html>
