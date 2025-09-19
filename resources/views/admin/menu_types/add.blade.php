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

            <form method="post" action="{{ route('admin.menu_types.store') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Menu Type</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Menu Type Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-sm-right">Submit</button>
                    </div>
                </div>
            </form>

        </section>
    </div>

@endsection
