@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détail d'un  ressource</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="{{route('directeurShowRessources')}}">Ressources</a></li>
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
                  <a href="{{route('directeurShowRessources')}}" class="btn btn-secondary btn-sm"><i class="fas fa-solid fa-less-than"></i> Retour  </a>
                  <a href="{{route('directeurEditRessource',$ressource->id)}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-wrench"></i>  Modifier </a>
                  <a href="{{route('directeurDeleteRessource',$ressource->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
               

                  <tr>
                    <th>Nom </th>
                    <td>{{$ressource->nom}}</td>
                  </tr>

                  

                  <tr>
                    <th>Disponibilité</th>
                    <td>{{$ressource->disponibilite}}</td>
                  </tr>

                  <tr>
                    <th>Description</th>
                    <td>{{$ressource->description}}</td>
                  </tr>
                  <tr>
                    <th>Type</th>
                    <td>{{$ressource->type}}</td>
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

  



