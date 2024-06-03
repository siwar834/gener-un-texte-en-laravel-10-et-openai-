@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 class="m-0">Détail d'un équipement</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('technicienShowEquipements')}}">Equipements</a></li>
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
                  <a href="{{route('technicienShowEquipements')}}" class="btn btn-secondary btn-sm"><i class="fas fa-solid fa-less-than"></i> Retour  </a>
                  <a href="{{route('technicienEditEquipement',$equipement->id)}}" class="btn btn-warning btn-sm text-white">  <i class="fa fa-wrench"></i> Modifier  </a>
                  <a href="{{route('technicienDeleteEquipement',$equipement->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
                 

                  <tr>
                    <th >Nom </th>
                    <td>{{$equipement->nom}}</td>
                  </tr>

                  <tr>
                    <th>Description </th>
                    <td>{{$equipement->description}}</td>
                  </tr>

                  <tr>
                    <th>Disponibilité </th>
                    <td>{{$equipement->disponibilite}}</td>
                  </tr>

                  
                  <tr>
                    <th>Date d'achat </th>
                    <td>{{$equipement->date_achat}}</td>
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
    @if(!$maintenances->isEmpty())
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <h2 >Liste des maintenances </h2>
            <div class="card ">
           
                        
             
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>Equipement </th>
                                        <th>Description</th>
                                        <th>Montant</th>
                                        <th>Date </th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($maintenances as $maintenance)
                                    <tr>
                                        <td>{{ $maintenance->id }}</td>
                                       
                                       

                                        <td>@if (isset($maintenance->equipement)){{$maintenance->equipement->nom}} @endif</td>
                                        <td>{{ $maintenance->description }}</td>
                                        <td>{{ $maintenance->montant }}</td>
                                        <td>{{ $maintenance->date }}</td>
                                      
 
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                               
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
 @endif
  </div>
  <!-- /.content-wrapper -->

  
