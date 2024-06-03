@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Mon encadrement</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('etudiantShowEncadrement')}}">Encadrement</a></li>
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
                <table class="table table-bordered table-striped">
                  
                 
                  <tr>
                    <th>Sujet  </th>
                    <td>{{$encadrement->sujet}}</td>
                  </tr>
                
                  <tr>
                    <th>Type  </th>
                    <td>{{$encadrement->type}}</td>
                  </tr>

                  <tr>
                    <th>Encadreur  </th>
                    <td>{{$encadreur->nom }}   {{$encadreur->prenom }}</td>
                  </tr>
                  <tr>
                    <th>Lien meet </th>
                    <td>{{$encadrement->lien_meet}}</td>
                  </tr>
                  <tr>
                    <th>Avancement </th>
                    <td>{{$encadrement->avancement}}</td>
                  </tr>
                  <tr>
                    <th>Cahier de charge </th>
                    <td> <a href="{{route('getFile',['rep'=>'cahiers des charges','filename'=>$encadrement->cahier_charge])}}" target="_blank">Cahier des charges</a>
                      </td>
                  </tr>
                  <tr>
                    <th>Etat </th>
                    <td>{{$encadrement->etat}}</td>
                  </tr>
                </table>
              </div>
             
        
   
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
       
          <div class="col-12">
          <h3>Encadrements rendez-vous</h3>    
            <div class="card ">
            
              <!-- /.card-header -->
              <div class="card-body">
              <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                     
                                        
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>datetime</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($encadrements_rendezvouss as $encadrementsrendezvous)
                                   

                                   
                                   <tr>
                                       <td>{{ $encadrementsrendezvous->id }}</td>
                                       <td>{!!$encadrementsrendezvous->discussion !!}</td>
                               
                                       <td>{{ $encadrementsrendezvous->etat }}</td>
                               
                                     
                                     
                                       <td>{{ $encadrementsrendezvous->datetime }}</td>
                                
                                  <td>
                                  <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                            
                        <a href="{{Route('etudiantEditEncadrementrendezvous',$encadrementsrendezvous->id)}}" class="dropdown-item  text-warning"><i class="fa fa-wrench"></i>  Modifier <i class="fas fa-add"></i> </a>
                       </div></div>
                                  </td>
                                  </tr>
                                 
                                  @endforeach
                         
                            
</tbody >      
                                <tfoot>
                                <tr>
                                <th>Id</th>
                                       
                                        
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>datetime</th>
                                        <th>Action</th>
                                    </tr>
</tfoot>
                            </table>
              </div>
             
        
   
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12">
          <h3>Encadrements taches</h3>
            <div class="card">
             
                 
              <!-- /.card-header -->
              <div class="card-body">
              <table id="exampleX1" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                     
                                        <th>Tache</th>
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>date debut</th>
                                        <th>date fin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($encadrements_taches as $encadrementstache)
                                   

                                   
                                   <tr>
                                       <td>{{ $encadrementstache->id }}</td>
                                       <td>{{ $encadrementstache->tache }}</td>
                               
                                       <td>{!!$encadrementstache->discussion !!}</td>
                               
                                       <td>{{ $encadrementstache->etat }}</td>
                               
                                     
                                     
                                       <td>{{ $encadrementstache->date_debut }}</td>
                                       <td>{{ $encadrementstache->date_fin }}</td>
                                
                                  <td>
                                  <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                            
                        <a href="{{Route('etudiantEditEncadrementtache',$encadrementstache->id)}}" class="dropdown-item  text-warning"><i class="fa fa-wrench"></i>  Modifier <i class="fas fa-add"></i> </a>
                        </div></div>
                                  </td>
                                  </tr>
                                 
                                  @endforeach
                         
                            
</tbody >      
                                <tfoot>
                                <tr>
                                <th>Id</th>
                                     
                                     <th>Tache</th>
                                     <th>discussion  </th>
                                     <th>etat  </th>
                                     <th>date debut</th>
                                     <th>date fin</th>
                                     <th>Action</th>
                                    </tr>
</tfoot>
                            </table>
              </div>
             
        
   
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12">
          <h3>Encadrements fichiers</h3>
            <div class="card">
             
                   <div class="card-header">
                   <a href="{{Route('etudiantAddEncadrementfichier')}}"  class="btn btn-success btn-sm" >
                    <i class="fas fa-plus"></i>  Ajouter un fichier d'un encadrement 
                        </a>
                           
                     
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="exampleX2" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>titre  </th>
                                        <th>fichier</th>
                                        <th>discussion  </th>
                                   
                                        <th>datetime</th>
                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($encadrements_fichiers as $encadrementsfichier)
                                   

                                   
                                   <tr>
                                       <td>{{ $encadrementsfichier->id }}</td>
                                       <td>{{ $encadrementsfichier->user->nom }}  {{ $encadrementsfichier->user->prenom }}</td>
                                     
                                       <td>{{ $encadrementsfichier->titre }}</td>
                                 
                                       <td><a  href="{{route('getFile',['rep'=>'fichiersencadrements','filename'=>$encadrementsfichier->fichier])}}" target="_blank">Voir fichier</a></td>
                      
                                       <td>{!! $encadrementsfichier->discussion !!}</td>
                               
                                    
                               
                                     
                                     
                                       <td>{{ $encadrementsfichier->datetime }}</td>
                                     
                                
                                  <td>
                                  <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                            
                        <a href="{{Route('etudiantEditEncadrementfichier',$encadrementsfichier->id)}}" class="dropdown-item  text-warning"><i class="fa fa-wrench"></i>  Modifier <i class="fas fa-add"></i> </a>
                        <a href="{{Route('etudiantDeleteEncadrementfichier',$encadrementsfichier->id)}}" class="dropdown-item text-danger"><i class="fa fa-trash"></i>  Supprimer <i class="fas fa-add"></i> </a>
                       </div></div>
                                  </td>
                                  </tr>
                                 
                                  @endforeach
                         
                            
</tbody >      
                                <tfoot>
                                <tr>
                                  <th>Id</th>
                                  <th>User</th>
                                  <th>titre  </th>
                                  <th>fichier</th>
                                  <th>discussion  </th>
                                   
                                  <th>datetime</th>
                                 
                                  <th>Action</th>
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

  
@include('footer')

  <script>

  $(function () {
    $('.infoBTN').on('click', function (event) {
                $('.infoTXT').toggle();
    });

    $("#exampleX").DataTable({
      
      
    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    
    $("#exampleX1").DataTable({
      
      
    }).buttons().container().appendTo('#exampleX1_wrapper .col-md-6:eq(0)');
    $("#exampleX2").DataTable({
      
      
    }).buttons().container().appendTo('#exampleX2_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });


});
</script>

