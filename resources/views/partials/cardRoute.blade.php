<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Visiona i tuoi Album</div>
                    <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                        <p>La tua galleria, con i tuoi album e le tue fotografie, modifica o cancella.</p>
                        <a class="btn btn-outline-dark" href="{{ route('albums.index') }}"><i class="bi bi-journal-album pe-2"></i> Vedi Album</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Crea nuovi Album</div>
                    <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                        <p>Crea un nuovo Album, aggiungi una foto, una descrizione. Decidi tu il genere!</p>
                        <a class="btn btn-outline-dark" href="{{ route('albums.create') }}"><i class="bi bi-plus-circle pe-2"></i>Crea Album</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Aggiungi nuove Immagini</div>
                    <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                        <p>Aggiungi una nuova Immagine, scegli tu il genere e il tipo di Album che più si addice!</p>
                        <a class="btn btn-outline-dark" href="{{ route('photos.create') }}"><i class="bi bi-image pe-2"></i>Nuova Immagine</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Visiona le Categorie</div>
                    <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                        <p>Vedi le tue categorie, aggiungine di nuove oppure modificale. Scegli tu!</p>
                        <a class="btn btn-outline-dark" href="{{ route('categories.index') }}"><i class="bi bi-tag pe-2"></i>Vedi Categorie</a>
                    </div>
                </div>
            </div>
            @if(Auth::user()->user_role === 'admin')
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Email</div>
                        <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                            <p>Ciao {{ Auth::user()->name }}, visiona le tue Email. Visualizza, rispondi o cancella i tuoi messaggi!</p>
                            <a class="btn btn-outline-dark" href="{{ route('users.index') }}"><i class="bi bi-envelope pe-2"></i>Email</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">Amministrazione</div>
                        <div class="card-footer d-flex flex-column align-items-center justify-content-between">
                            <p>Ciao {{ Auth::user()->name }}, visiona la tua Dashboard. Crea, modifica o cancella gli utenti!</p>
                            <a class="btn btn-outline-light" href="{{ route('users.index') }}"><i class="bi bi-person-check pe-2"></i>Admin</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>