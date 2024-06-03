@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des laborataires</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowLaborataires')}}">Laborataies</a></li>
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
                  <a href="{{route('adminAddLaborataire')}}" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Ajouter un laborataire </a>
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                  <th>Id </th>
                    <th>Nom </th>
                    <th>Logo</th>
                 
                 
                    <th>Directeur</th>
                     <th>Description</th>
            
                 
                    <th>Actions</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($laborataires as $laborataire)
                    <tr>
                    <td>{{$laborataire->id}}</td>
                      <td>{{$laborataire->nom}}</td>
                      <td><img src="{{asset('logos/'.$laborataire->logo)}}"   width="75px" height="75px"/></td>
                  
                     
                    @foreach($directeurs as $directeur)
                    @if($directeur->id==$laborataire->directeur_id)
                      <td>{{$directeur->nom}}  {{$directeur->prenom}}</td>
                      @endif
                   @endforeach
                      <td>{{$laborataire->description}}</td>
                    
                      

                   
                    
                     
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                          <a href="{{route('adminEditLaborataire',$laborataire->id)}}" class="dropdown-item text-warning" target="_blank"> <i class="fas fa-user"></i> Modifier </a>
                         
                            <a href="{{route('adminShowLaborataire',$laborataire->id)}}" class="dropdown-item text-primary" target="_blank"><i class="fas fa-eye"></i>Détails </a>
                          </div>
                        </div>
                      </td>

                    </tr>
                    @endforeach
                  
                  </tbody>
                 <tfoot>
                 <tr>
                  <th>Id </th>
                    <th>Nom </th>
                    <th>Logo</th>
                 
                 
                    <th>Directeur</th>
                     <th>Description</th>
            
                 
                    <th>Actions</th>
                 
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

    $("#exampleX").DataTable({
      
      "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            filter:'applied'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            filter:'applied'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                          filter:'applied'
                        }
                    },
                  
                    "colvis"
                ],
      
      "language": {
            "decimal": '.',
            "thousands": '',
        },
      
       "columnDefs": [
          { 
            "visible": false, "targets": [6,7] 
          },
          

        ],


    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });



});


</script>