@include ('header')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier une tache</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chercheurShowProjet',$tache->projet_id)}}">Projet</a></li>
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier une tache</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurEditTachePost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$tache->id}}" />
        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" value="{{$tache->titre}}" required name="titre" class="form-control" placeholder="Entrer une titre d'une tache">
                  </div>
                  
                 
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" required value="{{$tache->description}}" name="description" class="form-control"  placeholder="Entrer une description  d'une tache">
                  </div>
                  <div class="form-group">
                    <label>Etat</label>
                    <select required name="etat"class="form-control"   >
                      <option value="en cours"@if ($tache->etat=='en cours') selected @endif  >En cours</option>
                      <option value="termine"@if ($tache->etat=='termine') selected @endif >Terminé</option>
                 </select>
                  </div>
                 
                  <div class="form-group">
                    <label>Date debut</label>
                    <input type="date"  name="date_debut" value="{{$tache->date_debut}}" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Date fin</label>
                    <input type="date"  name="date_fin" value="{{$tache->date_fin}}" class="form-control" >
                  </div>
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('chercheurShowProjet',$tache->projet_id)}}" class="btn btn-secondary">Annuler</a>
          
                </div>
                <!-- /.card-body -->
               
                 
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

  




</div>