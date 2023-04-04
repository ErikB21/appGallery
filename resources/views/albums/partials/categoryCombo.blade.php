{{-- <div class="form-group">
    <label for="categories" class="form-label">
        <h4>Categories</h4>
    </label>
    <select  name="categories[]" id="categories" class="form-control" multiple="true" size="8">
        @foreach($categories as $cat)
            <option {{ in_array($cat->id, $selectedCategories, true)? 'selected' : '' }} value="{{$cat->id}}">{{Ucwords($cat->category_name)}}</option>
        @endforeach
    </select>

</div> --}}
<div class="form-group">
    <div class="form-check">
        <div class="row">
            @foreach($categories as $cat)
                <div class="col-4">
                    <input {{ in_array($cat->id, $selectedCategories, true)? 'checked' : ''  }} name="categories[]" type="checkbox" class="form-check-input" id="categories_{{$cat->id}}" value="{{$cat->id}}">
                    <label class="form-check-label" for="categories">{{ Ucwords($cat->category_name) }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>