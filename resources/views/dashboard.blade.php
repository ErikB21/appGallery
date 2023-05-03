<x-app-layout>
    @include('guestAdmin.partials.cardRoute')
</x-app-layout>
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            $('div.alert-info').fadeOut(4000)//uso per eliminare dopo 4 secondi l'alert dell'aggiornamento
        });
    </script>
@endsection