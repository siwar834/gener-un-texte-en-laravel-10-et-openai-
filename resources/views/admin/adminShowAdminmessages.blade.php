@include ('header')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des messages Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowAdminmessages')}}">Messages Admin</a></li>
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
                  <a href="{{route('adminAddAdminmessage')}}" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Ajouter un nouveau message</a>
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
         
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Titre</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($messages as $message)
                    <tr>
                      <td>{{$message->datemessage}}</td>
                      <td>{{$message->titre}}</td>
                      <td>{{$message->etat}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary">Actions</button>
                          <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a href="{{route('adminShowAdminmessage',$message->id)}}" class="dropdown-item"> Consulter <i class="fas fa-add"></i> </a>
                            
                            @if ($message->etat == "En cours de préparation")
                              <a href="{{route('adminEditAdminmessage',$message->id)}}" class="dropdown-item"> Editer <i class="fas fa-add"></i> </a>
                              <a href="{{route('adminDiffuseAdminmessage',$message->id)}}" class="dropdown-item"> Diffuser <i class="fas fa-add"></i> </a>
                              <a href="{{route('adminDeleteAdminmessage',$message->id)}}" class="dropdown-item"> Supprimer <i class="fas fa-add"></i> </a>
                            @endif

                            @if ($message->etat == "Diffusé")
                              <a href="{{route('adminAnnuleAdminmessage',$message->id)}}" class="dropdown-item"> Annuler <i class="fas fa-add"></i> </a>
                            @endif
                            


                           
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach



                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Titre</th>
                    <th>Etat</th>
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
      
      
    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });


});


</script>