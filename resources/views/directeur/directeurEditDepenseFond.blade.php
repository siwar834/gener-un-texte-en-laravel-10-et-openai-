@include('header')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Modifier un depense fond</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('directeurShowFond',Session::get('fond_id'))}}">Fond</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Modifier un depense d'un  fond</h3>
                        </div>
                        <form id="quickForm" method="POST" action="{{route('directeurEditDepenseFondPost')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$depensefond->id}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" required name="nom" value="{{$depensefond->nom}}"class="form-control" placeholder="Entrer un nom ">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea required name="description" class="form-control"  placeholder="Entrer une description" rows="2">{{$depensefond->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Montant</label>
                                    <input type="number" required name="montant"  value="{{$depensefond->montant}}"class="form-control" placeholder="Entrer le montant">
                                </div>
                               
                                
                             
                                <button type="submit" class="btn btn-warning">Modifier</button>
                                <a href="{{route('directeurShowFond',Session::get('fond_id'))}}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


