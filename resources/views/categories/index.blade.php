@extends('templates\default')

@section('content')
    
    <div class="row">
        <div>
            <h1 class="mb-4 text-center text-lg-start">Categories</h1>
        </div>
        <div class="col-12 col-lg-8">
            <table class="table table-stripe table-hover table-dark" id="categoryList">
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
                            <td id="catId-{{ $cat->id }}">{{ucWords($cat->category_name)}}</td>
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
                                <a id="upd-{{$cat->id}}" data-bs-toggle="tooltip" data-bs-title="Update Category" href="{{route('categories.edit',$cat->id)}}" class="btn btn-outline-info mx-1"> <i class="bi bi-pen"></i></a>
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
                                    <a class="ms-4 d-inline-block btn btn-primary" href="{{ route('categories.create') }}">New Category</a>
                                </th>
                            </tr>
                        </tfoot>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            <div class="d-flex pt-3 justify-content-end align-items-center">
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-none d-lg-block col-lg-4">
            @include('categories\categoryForm')
        </div>
    </div>
    <div class="container">
        @if(session()->has('message'))
            <x-alert-info>{{ session()->get('message') }}</x-alert-info>
        @endif
    </div>
    
@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('div.alert').fadeOut(4000);

            //eliminazione categorie via AJAX
            // $('form .btn-outline-danger').on('click', function (evt){
            //     evt.preventDefault();
            //     let f = this.parentNode;
            //     let cat = this.id.replace('btnDelete-','') * 1;
            //     let Trid = 'tr-' + cat;
            //     let urlCategory = f.action;
            //     $.ajax(
            //         urlCategory,
            //         {
            //             method: 'DELETE',
            //             data: {
            //                 _token: Laravel.csrfToken
            //             },
            //             complete: function (resp) {
            //                 // console.log(resp);
            //                 let respons = JSON.parse(resp.responseText);//trasformo la risposta in un JSON
            //                 $('#' + Trid).remove().fadeOut(1000);//rimuovo l'intera riga con jQuery
            //             }
            //         }
            //     );
            // });

            //Aggiungi categoria
            // $('#manageCategoryForm .btn-primary').on('click', function (evt){
            //     evt.preventDefault();
            //     let f = $('#manageCategoryForm');
            //     let data = f.serialize();
            //     let urlCategory = f.attr('action');
            //     $.ajax(
            //         urlCategory,
            //         {
            //             method: 'POST',
            //             data: data,
            //             done: function (resp) {
            //                 let response = JSON.parse(resp.responseText);//trasformo la risposta in un JSON
            //                 if(response.success){//se response è success
            //                     f[0].category_name.value = ''; //allora f viene svuotato
            //                     f[0].reset();//e resettato per poter aggiungere una nuova categoria
            //                 }else{
            //                     alert('Problem contacting server');
            //                 }
                            
            //             }
            //         }
            //     );
            // });

        //     //Modifica categoria
        //     const f = $('#manageCategoryForm');
        //     let selectedCategory = null;
        //     f[0].category_name.addEventListener('keyup', function(){
        //         if(selectedCategory){
        //             selectedCategory.html(f[0].category_name.value);
        //         }   
        //     })

        //     $('#categoryList a.btn-outline-info').on('click', function (evt){
        //         evt.preventDefault();
        //         let categoryId = this.id.replace('upd-', '');
        //         let catRow = $('#tr-' + categoryId);

        //         let urlUpdate = this.href.replace('/edit', '');
        //         let tdCat = $('#catId-' + categoryId);
        //         selectedCategory = tdCat;
        //         let categoryName = tdCat.text();
                
        //         f.attr('action', urlUpdate);
        //         f[0].category_name.value = categoryName;
        //         const inputT = document.querySelector('#methodType');
        //         if(!inputT){
        //             let input = document.createElement('input');
        //             input.type = 'hidden';
        //             input.id = 'methodType';
        //             input.name = '_method';
        //             input.value = 'PATCH';
        //             f[0].appendChild(input);
        //         }
        //     });
        });
    </script>
@endsection
