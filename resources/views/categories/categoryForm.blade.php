@if($category->category_name)
    <h1 class="text-center mb-5">Modifica Categoria</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="row">
        @method('PATCH')
@else
    <h1 class="text-center mb-5">Nuova Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="row" id="manageCategoryForm">
@endif

    @csrf
    <div class="form-group mt-3">
        <input type="text" required minlength="3" value="{{ old('category_name', $category->category_name) }}" placeholder="Category" class="form-control" name="category_name" id="category_name">
    </div>
    <div class="form-group mt-3 d-flex justify-content-center">
        @if($category->category_name)
            <button class="btn btn-warning mt-2 mx-3"><i class="bi bi-pen"></i> Modifica</button>
    </form>
            <form  action="{{ route('categories.destroy', $category->id) }}" method="POST" class="row">
                @csrf
                @method('DELETE')
                <button class="mx-3 btn btn-danger mt-2" id="{{$category->id}}"><i class="bi bi-trash"></i> Cancella</button>
            </form>
        @else
            <button class="btn btn-primary mt-2"><i class="bi bi-save"></i> Salva</button>
        @endif
    </div>