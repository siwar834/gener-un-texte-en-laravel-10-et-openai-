@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ajouter une tache</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowProjet',$projet->id)}}">Projet</a></li>
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
                <h3 class="card-title">Ajouter une tache</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurAddTachePost')}}">
                @csrf
                <input type="hidden" name="projet_id" value="{{$projet->id}}" />
        
                <div class="card-body">

        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" required name="titre" class="form-control" placeholder="Entrer un titre">
                  </div>
               

                 
                

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" required name="description" class="form-control" placeholder="Entrer une description">
                  </div>
                  <div class="form-group">
                    <label>Etat</label>
                    <select name="etat"   class="form-control">
                      <option value="en cours">En cours</option>
                      <option value="terminé" >Terminé</option>
               

                        </select>
                       </div>
                       <div class="form-group">
                    <label>Chercheur</label>
                    <select name="chercheur_id"   class="form-control">
                    <option value="">choisir de chercheurs</option>
                    @foreach($projetchercheurs as $projetchercheur)
                       @foreach($users as $user)
                       @if($user->id == $projetchercheur->chercheur_id)
                      <option value="{{$user->id}}">{{$user->nom}} {{$user->prenom}}</option>
                       @endif
                      @endforeach
                        @endforeach

                        </select>
                       </div>
                       @if($etudiants)
                       <div class="form-group">
                    <label> Etudiant chercheur</label>
                    <select name="etudiant_id"   class="form-control">
                      <option value="">choisir d'etudiante chercheur</option>
                    @foreach($projetchercheurs as $projetchercheur)
                       @foreach($etudiants as $etudiant)
                       @if($etudiant->id == $projetchercheur->chercheur_id)
                      <option value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
                       @endif
                      @endforeach
                        @endforeach

                        </select>
                       </div>
                       @endif
                      <div class="form-group">
                    <label>Date debut</label>
                    <input type="date" required name="date_debut"  class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Date fin</label>
                    <input type="date"  name="date_fin"  class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('directeurShowProjet',$projet->id)}}" class="btn btn-secondary">Annuler</a>
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

  
