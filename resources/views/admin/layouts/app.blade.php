<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/css/all.min.css">


    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin.layouts.parts.sidebar')

    @include('admin.layouts.parts.nav')

    @yield('content')

    @include('admin.layouts.parts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/adminlte.min.js"></script>

<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="/assets/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/dataTables.buttons.min.js"></script>
<script src="/assets/js/buttons.bootstrap4.min.js"></script>

<script src="/assets/js/select2.full.min.js"></script>
<script src="/assets/js/tata.js"></script>

@if(isset($success_toast) || session('success_toast'))
    <script type="text/javascript">
        tata.success('Success', '{{ $success_toast??session('success_toast') }}');
    </script>
@endif

@if(isset($error_toast))
    <script type="text/javascript">
        tata.error('Error', '{{ $error_toast }}');
    </script>
@endif

<script type="text/javascript">
    $('.select2').select2();

    $('.dataTable').DataTable({
        "paging": true,
        "responsive": true,
        pageLength: 25
    });
</script>

@stack('js')

</body>
</html>
