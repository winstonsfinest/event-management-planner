<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://event-management-planner-g113.onrender.com/assets/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://event-management-planner-g113.onrender.com/assets/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
    @yield('content')

<!-- jQuery -->
<script src="https://event-management-planner-g113.onrender.com/assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://event-management-planner-g113.onrender.com/assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://event-management-planner-g113.onrender.com/assets/js/adminlte.min.js"></script>

<script src="https://event-management-planner-g113.onrender.com/assets/js/jquery.dataTables.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/dataTables.responsive.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/responsive.bootstrap4.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/dataTables.buttons.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/buttons.bootstrap4.min.js"></script>
<script src="https://event-management-planner-g113.onrender.com/assets/js/tata.js"></script>

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
    $(".dataTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
</script>

@stack('js')

</body>
</html>
