@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des projets</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="{{route('directeurShowProjets')}}">Projets</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
     <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    
                    <a href="#" class="btn btn-default btn-sm infoBTN"><img src="{{asset('/img/icons/help.png')}}" width="20px"/> Aide</a>
                    <a href="{{route('directeurAddProjet')}}" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> 
                             Ajouter un projet
                        </a>
                    <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
                  <div class="infoTXT" style="display:none; margin-top: 10px; margin-bottom: -15px;">
                    <p>
                     
                    </p>
                  </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Chef de projet</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                        <th>Date debut </th>
                                        <th>Date fin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($projets as $item)
                                   

                                   
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->titre }}</td>
                                        <td>{{ $item->chefprojet_id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->statut }}</td>
                                        <td>{{ $item->date_debut }}</td>
                                        <td>{{ $item->date_fin }}</td>
 
                                        <td>
                                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu"> 
                                        <a href="{{route('directeurEditProjet',$item->id)}}" class="dropdown-item text-warning "> <i class="fa fa-wrench"></i> Modifier  </a>
 
                                        <a href="{{route('directeurDeleteProjet',$item->id)}}" class="dropdown-item text-danger "> <i class="fa fa-trash"></i>  Supprimer </a>

                                        <a href="{{route('directeurShowProjet',$item->id)}}" class="dropdown-item text-primary "><i class="fas fa-eye"></i>  Voir détails  </a>
                                            </div>                               
</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Chef de projet</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                        <th>Date debut </th>
                                        <th>Date fin</th>
                                        <th>Action</th>
                                    </tr>
</tfool>
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