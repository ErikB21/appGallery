<span class="alert alert-info">{{$message}}</span>
{{-- qui invece mi faccio aiutare dal costruttore della view(app/view),e passerò solo il componente --}}

{{-- <div class="alert alert-info">{{$slot}}</div>
se uso questa, dovrò creare nel mio albums.blade lo slot all'interno del tag 
<x-alert_info>
    {{session()->get('message')}}
</x-alert_info> --}}
