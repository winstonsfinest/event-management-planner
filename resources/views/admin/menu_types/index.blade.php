@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menu Types</h1>
                    </div>
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
                    <h3 class="card-title">Menu Type List</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.menu_types.add') }}" class="btn btn-primary float-end">Add Menu Type</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuTypes as $menuType)
                            <tr>
                                <td>{{ $menuType->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.menu_types.edit', $menuType) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.menu_types.show', $menuType) }}">View</a>
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
