<form style="width: 80%" action="{{ route('categories.store') }}" method="POST" class="row">
    @csrf
    <div class="form-group mt-3">
        <input type="text" required minlength="3" placeholder="Category" class="form-control" name="category_name" id="category_name">
    </div>
    <div class="form-group mt-3 d-flex justify-content-center">
        <button class="btn btn-primary">Save</button>
    </div>
</form>