@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laborataire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowlaborataire')}}">Laborataire</a></li>
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
             
              <!-- /.card-header -->
              <div class="card-body">

                <table  class="table table-bordered table-striped table-head-fixed">
                 
                  <tr>
                  <th>Nom </th>
                  <td>{{$laborataire->nom}}</td>
                  </tr>
                  <tr>
          
                    <th>Logo</th>
                 <td><img src="{{asset('logos/'.$laborataire->logo)}}"   width="75px" height="75px"/></td>
                    </tr>
                  <tr>
                     <th>Description</th>
                   <td>{{$laborataire->description}}</td>
                     </tr>
                     <tr>
                     <th>Action</th>
                   <td> <a href="{{route('directeurEditLaborataire',$laborataire->id)}}" class="btn btn-warning" target="_blank"> <i class="fas fa-user"></i> Modifier </a>
             </td>
                     </tr>
                    
                
                
                 
                 
                    
                      

                   
                    
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
    
          <div class="col-12">

            <h3>Les membres </h3>
            <div class="card">
              <div class="card-header">
             
                         
              <a href="{{route('directeurAddMembre')}}" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Ajouter un membre </a>
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
                      
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Id</th>
                     <th>User</th>
                     <th>Fonction</th>
                     <th>grade</th>
                     <th>Domaine de recherche</th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($membres as $membre)
                  <tr>
                    <td>{{$membre->id}}</td>
                    <td>{{$membre->user->nom}}  {{$membre->user->prenom}} </td>
                    <td>{{$membre->fonction}}</td>
                    <td>{{$membre->grade}}</td>
                    <td>{{$membre->domainederecherche}}</td>
                    <td>
                    <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                          <a href="{{route('directeurEditMembre',$membre->id)}}" class="dropdown-item text-warning" target="_blank"> <i class="fas fa-user"></i> Modifier </a>
                         
                            <a href="{{route('directeurDeleteMembre',$membre->id)}}" class="dropdown-item text-danger" target="_blank"><i class="fas fa-eye"></i>Supprimer </a>
                          </div>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                <tfoot>
                <tr>
                     <th>Id</th>
                     <th>User</th>
                     <th>Fonction</th>
                     <th>grade</th>
                     <th>Domaine de recherche</th>
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
  $('.infoBTN').on('click', function (event) {
              $('.infoTXT').toggle();
  });
  $("#exampleX").DataTable({
    
    
  }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
  
  $("#exampleX1").DataTable({
    
    
  }).buttons().container().appendTo('#exampleX1_wrapper .col-md-6:eq(0)');
  
  $('.BtnFiltrerX').on('click', function (event) {
              $('.dtsb-searchBuilder').toggle();
  });
  $('.BtnExporterX').on('click', function (event) {
              $('.dt-buttons').toggle();
  });


});
</script>