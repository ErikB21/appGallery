@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            $('div.alert-danger').fadeOut(4000)//uso per eliminare dopo 4 secondi l'alert dell'aggiornamento
        });
    </script>
@endsection