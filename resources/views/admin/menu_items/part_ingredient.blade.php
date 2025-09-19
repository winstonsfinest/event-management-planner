<div class="row mb-2">
    <input type="hidden" name="ingredient_ids[]" class="form-control" id="inputEmail3" value="{{ $ingredient->id ?? '' }}">

    <div class="col-8">
        <input type="text" name="ingredient_names[]" class="form-control" id="inputEmail3" value="{{ $ingredient->name ?? '' }}">
    </div>
    <div class="col-2">
        <input type="text" name="ingredient_weights[]" class="form-control" id="inputEmail3" value="{{ $ingredient->weight ?? '' }}">
    </div>
    <div class="col-2">
        <select name="ingredient_units[]" class="form-control">
            @foreach(UNITS as $unit)
                <option value="{{ $unit }}" @if(isset($ingredient) && $ingredient->unit == $unit) selected @endif>{{ $unit }}</option>
            @endforeach
        </select>
    </div>
</div>
