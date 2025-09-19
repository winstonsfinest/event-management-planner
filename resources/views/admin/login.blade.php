<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Management Planner</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://event-management-planner-g113.onrender.com/assets/css/all.min.css">

    <link rel="stylesheet" href="https://event-management-planner-g113.onrender.com/assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h4>Event Management Planner</h4>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('doLogin') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Username" value="{{ $old ?? '' }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-book"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                @if(isset($error))
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endif


                <button type="submit" class="btn btn-block btn-primary">
                    Sign in
                </button>
            </form>
        </div>

    </div>

</div>

</body>
</html>
