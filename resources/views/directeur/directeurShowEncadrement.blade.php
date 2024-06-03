@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Détail d'un encadrement</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="{{route('directeurShowEncadrements')}}">Encadrements</a></li>
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
                    <th>Etudiante  </th>
                    <td>{{$encadrement->etudiante_id}}</td>
                  </tr>

                  <tr>
                    <th>Chercheur </th>
                    <td>{{$encadrement->chercheur_id}}</td>
                  </tr>

                  <tr>
                    <th>Type </th>
                    <td>{{$encadrement->type}}</td>
                  </tr>
                  
                  <tr>
                    <th>Sujet </th>
                    <td>{{$encadrement->sujet}}</td>
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
            <div class="card">
           
              <!-- /.card-header -->
              <div class="card-body">
              <table id="exampleX1" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                     
                                        
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>datetime</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($encadrements_rendezvouss as $encadrementsrendezvous)
                                   

                                   
                                   <tr>
                                       <td>{{ $encadrementsrendezvous->id }}</td>
                                       <td>{!! $encadrementsrendezvous->discussion !!}</td>
                               
                                       <td>{{ $encadrementsrendezvous->etat }}</td>
                               
                                     
                                     
                                       <td>{{ $encadrementsrendezvous->datetime }}</td>
                                
                                 
                                  </tr>
                                 
                                  @endforeach
                         
                            
</tbody >      
                                <tfoot>
                                <tr>
                                <th>Id</th>
                                       
                                        
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>datetime</th>
                                   
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
              <table id="exampleX2" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                     
                                        <th>Tache</th>
                                        <th>discussion  </th>
                                        <th>etat  </th>
                                        <th>date debut</th>
                                        <th>date fin</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                             
                                @foreach($encadrements_taches as $encadrementstache)
                                   

                                   
                                   <tr>
                                       <td>{{ $encadrementstache->id }}</td>
                                       <td>{{ $encadrementstache->tache }}</td>
                               
                                       <td>{!! $encadrementstache->discussion !!}</td>
                               
                                       <td>{{ $encadrementstache->etat }}</td>
                               
                                     
                                     
                                       <td>{{ $encadrementstache->date_debut }}</td>
                                       <td>{{ $encadrementstache->date_fin }}</td>
                                
                                 
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
             
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="exampleX3" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>titre  </th>
                                        <th>fichier</th>
                                        <th>discussion  </th>
                                   
                                        <th>datetime</th>
                                    
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
 

  $("#exampleX1").DataTable({
    
    
  }).buttons().container().appendTo('#exampleX1_wrapper .col-md-6:eq(0)');
  
  $("#exampleX2").DataTable({
    
    
  }).buttons().container().appendTo('#exampleX2_wrapper .col-md-6:eq(0)');
  $("#exampleX3").DataTable({
    
    
  }).buttons().container().appendTo('#exampleX3_wrapper .col-md-6:eq(0)');
  

 


});
</script>