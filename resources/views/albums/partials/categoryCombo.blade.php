<div class="form-group">
    <label for="categories" class="form-label">
        <h4>Categories</h4>
    </label>
    <select  name="categories[]" id="categories" class="form-control" multiple>
        @foreach($categories as $cat)
            <option value="{{$cat->id}}">{{Ucwords($cat->category_name)}}</option>
        @endforeach
    </select>

</div>