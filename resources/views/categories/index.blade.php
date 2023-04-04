@extends('templates\default')

@section('content')
    <div>
        <h1 class="mb-4  me-5 text-center">Categories</h1>
    </div>
    <table class="table table-stripe table-hover table-dark">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Update</th>
                <th>Albums</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $cat)
                <tr id="tr-{{ $cat->id }}">
                    <td>{{$cat->id}}</td>
                    <td>{{ucWords($cat->category_name)}}</td>
                    <td>{{$cat->created_at->diffForHumans()}}</td>
                    <td>{{$cat->updated_at->diffForHumans()}}</td>
                    <td>
                        @if ($cat->albums_count > 0)
                            <a class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Views Albums" class="" href="{{ route('albums.index') }}?category_id={{$cat->id}}">{{$cat->albums_count}}</a>
                        @else
                            <a class="btn btn-default text-light" data-bs-toggle="tooltip" data-bs-title="No Albums" href="#">{{$cat->albums_count}}</a>
                        @endif
                    </td>
                    <td class="d-flex justify-content-between">
                        <a data-bs-toggle="tooltip" data-bs-title="Update Category" href="{{route('categories.edit',$cat->id)}}" class="btn btn-outline-info mx-1"> <i class="bi bi-pen"></i></a>
                        <form id="form{{$cat->id}}" method="POST" action="{{route('categories.destroy',$cat->id)}}"
                            class="form-inline">
                            @csrf
                            @method('DELETE')
                            <button data-bs-toggle="tooltip" data-bs-title="Delete Category" class="mx-1 btn btn-outline-danger" id="btnDelete-{{ $cat->id }}"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tfoot>
                    <tr>
                        <th colspan="6">
                            No Categories
                        </th>
                    </tr>
                </tfoot>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}">New Category</a>
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                </th>
            </tr>
        </tfoot>
    </table>
    @if(session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif
    
@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {//eliminazione categorie via AJAX
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('.alert').fadeOut(5000);
            $('form .btn-danger').on('click', function (evt){
                evt.preventDefault();
                let f = this.parentNode;
                let cat = this.id.replace('btnDelete-','') * 1;
                let Trid = 'tr-' + cat;
                let urlCategory = f.action;
                $.ajax(
                    urlCategory,
                    {
                        method: 'DELETE',
                        data: {
                            _token: Laravel.csrfToken
                        },
                        complete: function (resp) {
                            // console.log(resp);
                            let resp = JSON.parse(resp.responseText);//trasformo la risposta in un JSON
                            $('#' + Trid).remove().fadeOut(1000);//rimuovo l'intera riga con jQuery
                        }
                    }
                );
            });
        });
    </script>
@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            
                console.log(ele.target)
                const id = ele.target.id ? ele.target.id : ele.target.parentNode.id;
                const tr = $('#tr-' + id);
                console.log(tr)
                const f = $('#form' + id);
                const urlAlbum = f.attr('action');
                
            });
    </script>
@endsection
