@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Projets</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowProjets')}}">Projets</a></li>
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
          <!-- left column -->
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier un projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurEditProjetPost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$projet->id}}" />
        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" value="{{$projet->titre}}" required name="titre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                   
                    <textarea id="description" name="description" class="form-control" rows="5" placeholder="Entrer une description">{{$projet->description}}</textarea>
                                    
                  </div>
                  <div class="form-group">
                                    <label for="date_debut">Image</label>
                                    <input type="file" id="image" name="image" value="{{$image->description}}" class="form-control">
                                    
                                </div>
                  <div class="form-group">
                    <label>Chef de projet</label>
                    <select name="chefprojet_id" value="{{$projet->chefprojet_id}}" class="form-control">
                      @foreach ($users as $user)
                        <option value="{{$user->id}}" @if ($user->id==$projet->chefprojet_id) selected @endif >
                          {{$user->nom}}  {{$user->prenom}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label>Chercheurs</label>
                  
                    <select name="employes[]" class="duallistbox" multiple="multiple"  class="form-control">
                  
                    @foreach ($chercheurs as $chercheur)
                    
                        <option value="{{$chercheur->id}}" 
                        @foreach ($projet_chercheurs as $projet_chercheur)
                        @if ($chercheur->id==$projet_chercheur->chercheur_id) selected @endif 
                        @endforeach >
                          {{$chercheur->nom}}  {{$chercheur->prenom}}
                        </option>
                      
                      @endforeach
                    </select>
                 
                  </div>
                  <div class="form-group">
                    <label>Etudiants de recherche</label>
                  
                    <select name="etudiants[]" class="duallistbox" multiple="multiple"  class="form-control">
                  
                    @foreach ($etudiants as $etudiant)
                    
                        <option value="{{$etudiant->id}}" 
                        @foreach ($projet_chercheurs as $projet_chercheur)
                        @if ($etudiant->id==$projet_chercheur->chercheur_id) selected @endif 
                        @endforeach >
                          {{$etudiant->nom}}  {{$etudiant->prenom}}
                        </option>
                      
                      @endforeach
                    </select>
                 
                  </div>
                 
                  <div class="form-group">
                    <label>Statut</label>
                    <select required name="statut" value="{{$projet->statut}}" class="form-control">
                      <option value="en cours">En cours</option>
                      <option value="terminé" >Terminé</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label>Date debut</label>
                    <input type="date" required name="date_debut" value="{{$projet->date_debut}}" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Date fin</label>
                    <input type="date"  name="date_fin" value="{{$projet->date_fin}}" class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
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

  <script>




//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox({
  moveOnSelect: false,
  filterTextClear: 'Effacer filtre',
  filterOnValues: true,
});

 

  
</script>

