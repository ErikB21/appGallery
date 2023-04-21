<div class="container">
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success">
                <i class="fa-solid  fa-circle-check"></i> {{ session('success') }} 
            </div>
        </div>
    @endif
    <div class="d-flex align-items-center justify-content-center eb_square m-auto rounded-circle">
        @if (Auth::user()->profile_pic) 
            <img class="rounded-circle" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
        @else
            <img class="rounded-circle" src="{{asset('images/avatar.png')}}">   
        @endif
    </div>
    <div>
        <h1 class="text-center mt-2">Benvenuto {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <span>
            @if(session()->has('message'))
                <x-alert-info>{{ session()->get('message') }}</x-alert-info>
            @endif
        </span>
    </div>
    <span class="d-block text-center"><span class="font-weight-bold">Mail:</span> {{Auth::user()->email}}</span>
    <div class="mt-3 text-center">
        <a href="{{route('guestAdmin.edit', Auth::user())}}" class="btn eb_btn mx-3">Modifica Profilo</a>
        <form class="d-inline-block mx-3" action="{{route('guestAdmin.destroy', Auth::user()->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina Profilo</button>
        </form>
    </div> 
</div>

<style>
    .eb_square{
        width: 250px;
        height: 250px;
        border-radius: 13px;
        border: 1px solid #0A4067;
    }

    .eb_square img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .eb_btn{
        background-color: #0A4067;
        color: whitesmoke;
    }
    .eb_btn:hover{
        background-color: white;
        border-color: #0A4067;
        color: #0A4067;
    }
</style>