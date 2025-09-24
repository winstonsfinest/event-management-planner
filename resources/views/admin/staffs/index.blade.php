@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Staff</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>--}}
                    {{--                            <li class="breadcrumb-item active">Staff</li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </section>

        <section class="content">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Staff List</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.staffs.add') }}" class="btn btn btn-primary float-end">Add Staff</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($staffs as $staff)
                            <tr>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->mobile }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.staffs.edit', $staff) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.staffs.show', $staff) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
