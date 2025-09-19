@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menu Items</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Item List</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.menu_items.add') }}" class="btn btn-primary float-end">Add Menu
                            Item</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Type</label>
                        <select class="form-control" name="" id="menu-type-select">
                            <option value="">All</option>
                            @foreach(\App\Models\MenuType::all() as $menuType)
                                <option value="{{ $menuType->id }}" @if(isset($menuTypeId) && $menuTypeId==$menuType->id) selected @endif>{{ $menuType->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <table class="table table-bordered table-striped dataTable mt-5"
                           data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Menu Type</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuItems as $menuItem)
                            <tr>
                                <td>{{ $menuItem->name }}</td>
                                <td>{{ $menuItem->menu_type->name ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.menu_items.edit', $menuItem) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.menu_items.show', $menuItem) }}">View</a>
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

@push('js')
    <script>
        $(document).ready(function () {
            $('#menu-type-select').change(function () {
                window.location.href = '{{ route('admin.menu_items.index') }}?menu_type_id=' + $(this).val();
            });
        });
    </script>
@endpush
