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
                <div class="col-4 d-flex align-items-center">
                    <input {{ in_array($cat->id, $selectedCategories, true)? 'checked' : ''  }} name="categories[]" type="checkbox" class="form-check-input circle_input" id="categories_{{$cat->id}}" value="{{$cat->id}}">
                    <label class="form-check-label ps-2" for="categories">{{ Ucwords($cat->category_name) }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .circle_input{
        border-radius: 5px!important;
        width: 20px!important;
        height: 20px!important;
        box-shadow: none!important;
    }
    .circle_input:checked{
        background-color: #ff0057!important;
        border: 0!important;
    }
</style>