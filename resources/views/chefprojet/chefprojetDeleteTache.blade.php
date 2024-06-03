@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 > Supprimer une tache</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chefprojetShowProjet',$tache->projet_id)}}">Projet</a></li>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etes vous sur de vouloir supprimer cette tache?
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            
              <form id="quickForm" method="POST" action="{{route('chefprojetDeleteTachePost')}}">
                @csrf
                <input type="hidden"value="{{$tache->id}}" name="id"/>
                <div class="card-body">
           
       
        <div class="detail">
            <label>Titre:</label>
            <span>{{$tache->titre}}</span>
        </div>
        <div class="detail">
            <label>Description :</label>
            <span>{{$tache->description}}</span>
        </div>
        <div class="detail">
            <label>Etat:</label>
            <span>{{$tache->etat}}</span>
        </div>
        <div class="detail">
            <label>Projet Id:</label>
            <span>{{$tache->projet_id}}</span>
        </div>
        <div class="detail">
            <label>Date de debut:</label>
            <span>{{$tache->date_debut}}</span>
        </div>
        <div class="detail">
            <label>Date de fin:</label>
            <span>{{$tache->date_fin}}</span>
        </div>
       
         
              
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('chefprojetShowProjet',$tache->projet_id)}}" class="btn btn-secondary">Annuler</a>
                
                </div>
              </form>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->






