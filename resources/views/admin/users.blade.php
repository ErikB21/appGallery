@extends('templates.admin')
@section('content')
    <div class="row justify-content-between">
        <div class="col-3">
            <h1 class="mb-5">Users</h1>
        </div>
        <div class="col-3">
            @if(session()->has('message'))
                <x-alert-info>{{ session()->get('message') }}</x-alert-info>
            @endif
        </div>
    </div>
    <table class="uk-table uk-table-hover uk-table-striped cell-border" style="width:100%" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>CREATED</th>
                <th>DELETED</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
@endsection
@section('footer')
    @parent
    <script>
        $(
            function () {
                $('div.alert').fadeOut(5000);

                //creazione tabella tramite Yajira DataTables
                let dataTable = $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{route('admin.getUsers')}}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'user_role', name: 'role'},
                        {data: 'created_at', name: 'created'},
                        {data: 'deleted_at', name: 'del'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
                //prendi il form con questo id, al click sui button con classe ajax
                $('#users-table').on('click', '.ajax', function (ele) {
                    ele.preventDefault();
                    //constatiamo che nel form ci sia un btn che abbia un id 'delete' che sia maggiore o uguale a 1
                    const isDelete = this.id.indexOf('delete') >= 0;

                    //se è cosi, allora l'utente potrà essere cancellato in modo soft, altrimenti è stato gia cancellato e quindi bisogna usare la restore
                    const msg = isDelete ? 'Do you really want to delete this record?' : 'Do you really want to restore this record?'

                    //messaggio di conferma se vogliamo cancellare oppure ristabilire il record
                    if(!confirm(msg)){
                        return false;
                    }

                    //prendi dal html chi ha l'attributo href
                    let urlUsers =   $(this).attr('href');

                    //ora prendi il parente del parente
                    let tr =this.parentNode.parentNode;
                    console.log(tr)
                    $.ajax(
                        urlUsers,
                        {
                            //se da cancellare usa DELETE, se da ristabilire usa PATCH
                            method: isDelete ? 'DELETE' : 'PATCH',

                            //token di window(quindi globale)
                            data : {
                                '_token' :  Laravel.csrfToken
                            },
                            complete : function (resp) {
                                console.log(resp);
                                //se la risposta è uguale a 1
                                if(resp.responseText == 1) {

                                    //e se chi ha l'attributo href ha anche un valore di hard=1
                                    if(urlUsers.endsWith('hard=1')){
                                        
                                        //rimuovi in modo definitivo quel record
                                        tr.parentNode.removeChild(tr);
                                    }
                                    //ricarica la tabella
                                    dataTable.ajax.reload();
                                } else {
                                    alert('Problem contacting server');
                                }
                            }
                        }
                    )
                });
            });
    </script>
@endsection