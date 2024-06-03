@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détail d'une maintenance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="{{route('technicienShowMaintenances')}}">Maintenances</a></li>
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
                  <a href="{{route('technicienShowMaintenances')}}" class="btn btn-secondary btn-sm"><i class="fas fa-solid fa-less-than"></i> Retour </a>
                  <a href="{{route('technicienEditMaintenance',$maintenance->id)}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-wrench"></i>  Modifier  </a>
                  <a href="{{route('technicienDeleteMaintenance',$maintenance->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>  Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
               

                  <tr>
                    <th>Equipement  </th>

                   <td>@if (isset($maintenance->equipement)){{$maintenance->equipement->nom}} @endif</td>
                                       
                  </tr>

                  

                  <tr>
                    <th>Montant</th>
                    <td>{{$maintenance->montant}}</td>
                  </tr>

                  <tr>
                    <th>Description </th>
                    <td>{{$maintenance->description}}</td>
                  </tr>
                  <tr>
                    <th>Date </th>
                    <td>{{$maintenance->date}}</td>
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

  



