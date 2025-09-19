@extends('admin.layouts.app')

@php
    $isEdit = isset($isEdit) ? $isEdit : false;
@endphp

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

            <form method="post" action="{{ route('admin.menu_items.update', $menuItem) }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $isEdit ? 'Edit' : 'View' }} Menu Item</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3"
                                       value="{{ $menuItem->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea name="description" class="form-control"
                                      rows="3">{{ $menuItem->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Menu Item Type</label>
                            <div class="col-sm-10">
                                <select name="menu_type_id" class="form-control">
                                    <option></option>
                                    @foreach(\App\Models\MenuType::all() as $menuType)
                                        <option
                                            value="{{ $menuType->id }}" {{ $menuItem->menu_type_id == $menuType->id ? 'selected' : '' }}>{{ $menuType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Allergens</label>
                            <div class="col-sm-10">
                                <input type="text" name="allergens" class="form-control" id="inputEmail3"
                                       value="{{ $menuItem->allergens }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ingredients (per 10 PTNS)</label>
                            <div class="col-sm-10 mb-2">
                                @foreach($menuItem->ingredients ?? [] as $ingredient)
                                    @component('admin.menu_items.part_ingredient', ['ingredient' => $ingredient])
                                    @endcomponent
                                @endforeach
                                <div id="new-ingredient"></div>
                                <button type="button" onclick="addNewIngredient()"
                                        class="btn btn-info mt-3 float-sm-right">Add
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Prep List</label>
                            <div class="col-sm-10">

                                @foreach($menuItem->prep_list ?? [] as $prepList)
                                    @component('admin.menu_items.part_prep_list', ['name' => $prepList])
                                    @endcomponent
                                @endforeach

                                <div id="new-prep-list"></div>
                                <button type="button" onclick="addNewPrepList()"
                                        class="btn btn-info mt-3 float-sm-right">Add
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea name="notes" class="form-control" rows="3">{{ $menuItem->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        @if($isEdit)
                            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                        @else
                            <a href="{{ route('admin.menu_items.edit', $menuItem->id) }}"
                               class="btn btn-primary float-sm-right">Edit</a>
                        @endif
                    </div>
                </div>
            </form>

        </section>
    </div>

@endsection



@push('js')
    <script>
        @if(!$isEdit)
        $(".content :input").attr("disabled", true);
        @endif

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
