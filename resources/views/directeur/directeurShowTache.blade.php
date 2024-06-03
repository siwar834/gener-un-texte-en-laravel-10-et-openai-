@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Détail d'une  Tache</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowProjet',$tache->projet_id)}}">Projet</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <a href="{{route('directeurShowProjet',$tache->projet_id)}}" class="btn btn-secondary btn-sm"> Retour <i class="fas fa-add"></i> </a>
                  <a href="{{route('directeurEditTache',$tache->id)}}" class="btn btn-warning btn-sm text-white"> Modifier <i class="fas fa-add"></i> </a>
                  <a href="{{route('directeurDeleteTache',$tache->id)}}" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-add"></i> </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
                  

                  <tr>
                    <th>Titre  </th>
                    <td>{{$tache->titre}}</td>
                  </tr>


                  <tr>
                    <th>Description  </th>
                    <td>{{$tache->description}}</td>
                  </tr>
                  <tr>
                    <th>Etat </th>
                    <td>{{$tache->etat}}</td>
                  </tr>
                  <tr>
                    <th>Projet  </th>
                    <td>@if (isset($tache->projet_id)) {{$tache->projet->titre}} @endif</td>
                  </tr>
                  <tr>
                    <th>Date debut  </th>
                    <td>{{$tache->date_debut}}</td>
                  </tr>
                  <tr>
                    <th>Date fin  </th>
                   
                    <td>{{$tache->date_fin}}</td>
                  </tr>
                  <tr>
                    <th>Membre </th>
                    <td>{{$tache_chercheur->membre_id}}</td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


 
  </div>
  <!-- /.content-wrapper -->

  



