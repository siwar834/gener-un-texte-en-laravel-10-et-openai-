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
              <li class="breadcrumb-item active"><a href="{{route('directeurShowEquipements')}}">Equipements</a></li>
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
                  <a href="{{route('directeurShowEquipements')}}" class="btn btn-secondary btn-sm"> Retour  </a>
                  <a href="{{route('directeurEditEquipement',$equipement->id)}}" class="btn btn-warning btn-sm text-white">  <i class="fa fa-wrench"></i> Modifier  </a>
                  <a href="{{route('directeurDeleteEquipement',$equipement->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>Nom </th>
                                        <th>Description</th>
                                        <th>Disponibilité</th>
                                        <th>Date d'achat </th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                           
                                    <tr>
                                        <td>{{$equipement->id}}</td>
                                       
                                        <td>{{$equipement->nom}}</td>
                                       

                                        <td>{{ $equipement->description }}</td>
                                        <td>{{ $equipement->disponibilite }}</td>
                                        <td>{{$equipement->date_achat}}</td>
                                      
 
                                       
                                    </tr>
                                
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                        
                <h2 >Liste des maintenances de cet équipement</h2>
              </div>
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
                                <tfoot>
                  <tr>
                                <th>Id</th>
                                        <th>Equipement </th>
                                        <th>Description</th>
                                        <th>Montant</th>
                                        <th>Date </th>
                                    
</tr>
                    
</tfoot>
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

  
  @include ('footer')
  
  <script>

$(function () {
$('.infoBTN').on('click', function (event) {
            $('.infoTXT').toggle();
});
$("#exampleX").DataTable({
  
  
}).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');


$('.BtnFiltrerX').on('click', function (event) {
            $('.dtsb-searchBuilder').toggle();
});
$('.BtnExporterX').on('click', function (event) {
            $('.dt-buttons').toggle();
});


});
</script>  