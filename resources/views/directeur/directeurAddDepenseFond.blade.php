@include('header')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Ajouter un depense fond</h3>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un depense d'un  fond</h3>
                        </div>
                        <form id="quickForm" method="POST" action="{{route('directeurAddDepenseFondPost')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" required name="nom" class="form-control"
                                        placeholder="Entrer un nom de fond">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea required name="description" class="form-control"
                                        placeholder="Entrer une description" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Montant</label>
                                    <input type="number" required name="montant" 
                                        class="form-control" placeholder="Entrer le montant">
                                </div>
                               
                                
                             
                                <button type="submit" class="btn btn-success">Ajouter</button>
                                <a href="{{route('directeurShowFonds')}}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


