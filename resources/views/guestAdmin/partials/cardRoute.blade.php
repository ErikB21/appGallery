<div class="container">
    @include('guestAdmin\partials\profile')
</div>

<div class="container mt-3">
        <div class="row">
            <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                <div class="cards">
                    <div class="face face1">
                        <div class="content d-flex flex-column justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-images" viewBox="0 0 16 16">
                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                            </svg>
                            <h3>I tuoi Album</h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content d-flex justify-content-center flex-column align-items-center">
                            <p>La tua galleria, con i tuoi album e le tue fotografie, modifica o cancella.</p>
                            <a class="btn mt-3" href="{{ route('albums.index') }}"><i class="bi bi-journal-album pe-2"></i>Vedi Album</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                <div class="cards">
                    <div class="face face1">
                        <div class="content d-flex flex-column justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-journal-album" viewBox="0 0 16 16">
                                <path d="M5.5 4a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5zm1 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>
                            <h3>Nuovo Album</h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content d-flex justify-content-center flex-column align-items-center">
                            <p>Crea un nuovo Album, aggiungi una foto e una descrizione.</p>
                            <a class="btn mt-3" href="{{ route('albums.create') }}"><i class="bi bi-plus-circle pe-2"></i>Crea Album</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                <div class="cards">
                    <div class="face face1">
                        <div class="content d-flex flex-column justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-image-fill" viewBox="0 0 16 16">
                                <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                            </svg>
                            <h3>Nuova Foto</h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content d-flex justify-content-center flex-column align-items-center">
                            <p>Aggiungi una nuova Immagine, scegli genere e tipo di Album.</p>
                            <a class="btn mt-3" href="{{ route('photos.create') }}"><i class="bi bi-image pe-2"></i>Nuova Immagine</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                <div class="cards">
                    <div class="face face1">
                        <div class="content d-flex flex-column justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                            </svg>
                            <h3>Visiona le categorie</h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content d-flex justify-content-center flex-column align-items-center">
                            <p>Vedi le tue categorie, aggiungine di nuove oppure modificale. Scegli tu!</p>
                            <a class="btn mt-3" href="{{ route('categories.index') }}"><i class="bi bi-tag pe-2"></i>Vedi Categorie</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->user_role === 'admin')
                <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                    <div class="cards">
                        <div class="face face1">
                            <div class="content d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
                                </svg>
                                <h3>Email</h3>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content d-flex justify-content-center flex-column align-items-center">
                                <p>Ciao {{ Auth::user()->name }}, visiona le tue Email. Visualizza e cancella i tuoi messaggi!</p>
                                <a class="btn mt-3" href="https://mailtrap.io/inboxes"><i class="bi bi-envelope pe-2"></i>Email</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 justify-content-center d-flex">
                    <div class="cards">
                        <div class="face face1">
                            <div class="content d-flex flex-column justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgray" class="bi bi-person-lines-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                                <h3>Amministrazione</h3>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content d-flex justify-content-center flex-column align-items-center">
                                <p>Ciao {{ Auth::user()->name }}, visiona la tua Dashboard. Crea, modifica o cancella gli utenti!</p>
                                <a class="btn mt-3" href="{{ route('users.index') }}"><i class="bi bi-person-check pe-1"></i>Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>

        .cards{
            position: relative;
            cursor: pointer;
        }

        .cards .face{
            width: 300px;
            height: 200px;
            transition: 0.5s;
        }

        .cards .face.face1 {
            position: relative;
            background: #202529;
            z-index: 1;
            transform: translateY(100px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cards:hover .face.face1{
            background: #ff0057;
            transform: translateY(0);
        }

        .cards .face.face1 .content{
            opacity: 0.2;
            transition: 0.5s;
        }

        .cards:hover .face.face1 .content {
            opacity: 1;
        }

        .cards .face.face1 .content svg{
            max-width: 100px;
        }

        .cards:hover .face.face1 .content svg{
            fill: #333;
        }

        .cards .face.face1 .content h3{
            margin: 10px 0 0;
            color: #fff;
            padding: 0;
            font-size: 1.5rem;
        }

        .cards .face.face2{
            position: relative;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0,0,0,0.8);
            transform: translateY(-100px);
        }

        .cards:hover .face.face2 {
            transform: translateY(0);
        }

        .cards .face.face2 .content p {
            margin: 0;
            padding: 0;
        }

        .cards .face.face2 .content a {
            font-weight: 900;
            color: #333;
            outline: 2px solid #ff0057;
        }


        .cards .face.face2 .content a:hover {
            background: #ff0057;
            outline: none;
            color: #fff;
        }
    </style>
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            $('div.alert-info').fadeOut(4000)//uso per eliminare dopo 4 secondi l'alert dell'aggiornamento
        });
    </script>
@endsection