@include('header')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Détail d'un fond</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('directeurShowFonds')}}">Fonds</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Nom</th>
                                    <td>{{$Fond->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Montant début</th>
                                    <td>{{$Fond->montant_debut}}</td>
                                </tr>
                                <tr>
                                    <th>Reste</th>
                                    <td>{{$Fond->reste}}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{$Fond->description}}</td>
                                </tr>
                                <tr>
                                    <th>Statut</th>
                                    <td>{{$Fond->statut}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>Depenses d'un fond</h3>
                    <div class="card">
                        <div class="card-header">
                        <a href="{{route('directeurAddDepenseFond')}}" class="btn btn-success btn-sm text-white">
                        <i class="fas fa-plus"></i>     Ajouter un depense d'un fond                  </a>
                        </div>
                        <div class="card-body">
                            <table id="exampleX2" class="table table-bordered table-striped table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($depensefonds as $depensefond)
                                    <tr>
                                        <td>{{$depensefond->id}}</td>
                                        <td>{{$depensefond->nom}}</td>
                                        <td>{{$depensefond->description}}</td>
                                        <td>{{$depensefond->montant}}</td>
                                        <td>{{$depensefond->date}}</td>
                                        <td>
                                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">   
                                        <a href="{{route('directeurEditDepenseFond',$depensefond->id)}}" class="dropdown-item text-warning ">  <i class="fa fa-wrench"></i> Modifier </a>
                                   <a href="{{route('directeurDeleteDepenseFond',$depensefond->id)}}" class="dropdown-item text-danger "><i
                                    class="fa fa-trash"></i> Supprimer </a>
                                     
</div>
</div>
</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                    <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</div>

@include('footer')

<script>
    $(function () {
        $("#exampleX2").DataTable({
        }).buttons().container().appendTo('#exampleX2_wrapper .col-md-6:eq(0)');
    });
</script>
