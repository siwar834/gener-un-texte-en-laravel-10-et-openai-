@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Ajouter un projet</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('directeurShowProjets')}}">Projets</a></li>
                       
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un projet</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="{{route('directeurAddProjetPost')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    
                                   
                                    <input type="text" id="titre" required name="titre" value="@if (session('titre')){{session('titre') }}@endif" placeholder="Entrer un titre" class="form-control">
                                 
                                </div>


                                
                                    <div class="form-group">
                                        <label for="mot">Mot clé</label>
                                        
                                        <input type="text" id="mot" required name="mot" value="@if (session('mot')){{ session('mot') }} @endif"class="form-control">
                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <button class="btn btn-primary" id="search"   >Générer automatiquement</button><br><br>
                                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="Entrer une description">@if (session('description')) {{session('description') }}@endif</textarea>
                                    </div>
                                 
                                    <div class="form-group">
                                    <label for="date_debut">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="chefprojet_id">Chef de projet</label>
                                    <select id="chefprojet_id" name="chefprojet_id" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->nom}} {{$user->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="employes">Chercheurs</label>
                                    <select id="employes" name="employes[]" class="duallistbox form-control" multiple="multiple">
                                        @foreach ($chercheurs as $chercheur)
                                            <option value="{{$chercheur->id}}">{{$chercheur->nom}} {{$chercheur->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="etudiants">Étudiant de recherche</label>
                                    <select id="etudiants" name="etudiants[]" class="duallistbox form-control" multiple="multiple">
                                        @foreach ($etudiants as $etudiant)
                                            <option value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="statut">Statut</label>
                                    <select id="statut" name="statut" class="form-control">
                                        <option value="en cours">En cours</option>
                                        <option value="terminé">Terminé</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date début</label>
                                    <input type="date" id="date_debut" name="date_debut" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date fin</label>
                                    <input type="date" id="date_fin" name="date_fin" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                                <a href="{{route('directeurShowProjets')}}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js"></script>

<script type="text/javascript">
    // Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox({
        moveOnSelect: false,
        filterTextClear: 'Effacer filtre',
        filterOnValues: true
    });
    $("#search").click(function() {
      var title = $("#title").val();
      var mot = $("#mot").val();

        $.ajax({
          url: "/generateDescription",
          type: "POST",
          data: {
            title: title,
            mot: mot
          },
          success: function(response) {
            $('#description').val(response.description);
            $('#titre').val(response.titre);
            $('#mot').val(response.mot);
          }
        });
      });
    
</script>

