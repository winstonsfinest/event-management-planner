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

            <form method="post" action="{{ route('admin.menu_items.store') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Menu Item</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Menu Item Type</label>
                            <div class="col-sm-10">
                                <select name="menu_type_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\MenuType::all() as $menuType)
                                        <option value="{{ $menuType->id }}">{{ $menuType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Allergens</label>
                            <div class="col-sm-10">
                                <input type="text" name="allergens" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ingredients (per 10 PTNs)</label>
                            <div class="col-sm-10">
                                @component('admin.menu_items.part_ingredient')
                                @endcomponent
                                @component('admin.menu_items.part_ingredient')
                                @endcomponent
                                @component('admin.menu_items.part_ingredient')
                                @endcomponent
                                <div id="new-ingredient"></div>
                                <button type="button" onclick="addNewIngredient()"
                                        class="btn btn-info mt-3 float-sm-right">Add
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Prep List</label>
                            <div class="col-sm-10">
                                @component('admin.menu_items.part_prep_list')
                                @endcomponent
                                @component('admin.menu_items.part_prep_list')
                                @endcomponent
                                @component('admin.menu_items.part_prep_list')
                                @endcomponent

                                <div id="new-prep-list"></div>
                                <button type="button" onclick="addNewPrepList()"
                                        class="btn btn-info mt-3 float-sm-right">Add
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea name="notes" class="form-control" rows="3"></textarea>
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


@push('js')
    <script>
        function addNewIngredient() {
            let newIngredient = `
                @component('admin.menu_items.part_ingredient')
            @endcomponent
            `;
            $('#new-ingredient').append(newIngredient);
        }

        function addNewPrepList() {
            let newPrepList = `
                @component('admin.menu_items.part_prep_list')
            @endcomponent
            `;
            $('#new-prep-list').append(newPrepList);
        }
    </script>
@endpush

