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
              <li class="breadcrumb-item active"><a href="{{route('chefprojetShowProjet',$projet->id)}}">Projet</a></li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter une tache</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chefprojetAddTachePost')}}">
                @csrf
                <input type="hidden" name="projet_id" value="{{$projet->id}}" />
        
                <div class="card-body">

        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" required name="titre" class="form-control" placeholder="Entrer un titre">
                  </div>
               

                 
                

                  <div class="form-group">
                    <label>Description</label>
                    <textarea required name="description" class="form-control" placeholder="Entrer une description" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Etat</label>
                    <select name="etat"  required class="form-control">
                  
                      <option value="en cours">En cours</option>
                      <option value="terminé" >Terminé</option>
               

                        </select>
                       </div>
                       <div class="form-group">
                    <label>Chercheurs</label>
                    <select name="chercheur_id"   class="form-control">
                   <option value="">Choisir un chercheur</option>
                       @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->nom}} {{$user->prenom}}</option>
                        @endforeach
               

                        </select>
                       </div>
                       <div class="form-group">
                    <label>Etudiants</label>
                    <select name="etudiant_id"   class="form-control">
                    <option value="">Choisir un etudiant </option>
                       @foreach($etudiants as $etudiant)
                      <option value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
                        @endforeach
               

                        </select>
                       </div>
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
                  <a href="{{route('chefprojetShowProjet',$projet->id)}}" class="btn btn-secondary">Annuler</a>
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

  
