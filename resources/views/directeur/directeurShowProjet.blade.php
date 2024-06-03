@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Détail d'un  projet</h3>
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
          <div class="col-12">
            <div class="card ">
              
              <div class="card-body">
              <table  class="table table-bordered table-striped ">
           
                                       
                                       <tr>
                                        <th>Titre</th>
                                           
                                        <td>{{ $projet->titre }}</td>
</tr>  <tr>
                                        <th>Chef de projet</th>
                                        <td>{{ $projet->chefprojet_id }}</td>
</tr>
<tr>
                                        <th>Description</th>
                                        <td>{{ $projet->description }}</td>
</tr>
<tr>                                
                                        <th>Statut</th>
                                        <td>{{ $projet->statut }}</td>
                                        </tr>
<tr> 
                                        <th>Date debut </th>
                                        <td>{{ $projet->date_debut }}</td>
                                        </tr>
<tr> 
                                        <th>Date fin</th>
                                        

                                        <td>{{ $projet->date_fin }}</td>
                                    </tr>
                             
                  @if($image)
                  <tr>
                    <th>Image</th>
                    <td><a href="{{asset('photos projets/'.$image->description)}}"> Voir image</a></td>
                  </tr>
                  @endif
                              

                             
                                   

                                   
                                   
                                      
                                   
                               
                            </table>
              </div>
               
        </div>       
        </div>
           
          
 
     <div class="col-12">
     <h2>Liste des membres </h2>
     <div class="card ">
        
         
           
            <!-- /.card-header -->
   <div class="card-body">
  
     <table  class="table table-bordered table-striped table-head-fixed">
       <thead>
       <tr>
       <th>Id</th> 
                             <th>Nom</th>
                              <th>Prenom</th>
                             <th>Email</th>
                          
                            
                      
                         </tr>
                     </thead>
                     <tbody>

                     <?php   $affiches = []; ?>

                  @foreach($membres as $membre)
                @if(!in_array($membre->id, $affiches)) 
                        

                        
                         <tr>
                         <td>{{ $membre->id}}</td>
                             <td>{{ $membre->nom}}</td>
                             <td>{{ $membre->prenom }}</td>
                             <td>{{ $membre->email }}</td>
                          
                           

                           
                         </tr>
                         <?php $affiches[] = $membre->id; ?>
    @endif
@endforeach
                     </tbody>
                  
                    
                 </table>
             </div>

         </div>
     </div>


             
    
 
            <div class="col-12">
            <h2>Liste des taches </h2>
                <div class="card ">
               
                    <div class="card-header ">
                    <a href="{{route('directeurAddTache',$projet->id)}}" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> 
                             Ajouter une tache
                        </a>
                    </div>
                
                       
                   
                  
               
                       <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                      
                                        <th>Description</th>
                                        <th>Etat</th>
                                        <th>Date debut </th>
                                        <th>Date fin</th>
                                        <th>Chercheur</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($taches as $tache)
                              

                                   
                                    <tr>
                                        <td>{{ $tache->id }}</td>
                                        <td>{{ $tache->titre }}</td>
                                    
                                        <td>{{ $tache->description }}</td>
                                        <td>{{ $tache->etat }}</td>
                                        <td>{{ $tache->date_debut }}</td>
                                        <td>{{ $tache->date_fin }}</td>
                                        @foreach($tache_chercheurs as $tache_chercheur)
                                       @if($tache->id ==$tache_chercheur->tache_id )
                                       <td>
                                    
                                       {{ $tache_chercheur->membre_id }}
                                       </td>
                                       @endif
                                       @endforeach 
                                       <td>
                                       <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu"> 
                                        <a href="{{route('directeurEditTache',$tache->id)}}" class="dropdown-item text-warning "> <i class="fa fa-wrench"></i> Modifier  </a>
 
                                        <a href="{{route('directeurDeleteTache',$tache->id)}}" class="dropdown-item text-danger "> <i class="fa fa-trash"></i>  Supprimer </a>

                                        <a href="{{route('directeurShowTache',$tache->id)}}" class="dropdown-item text-primary "><i class="fas fa-eye"></i>  Voir détails  </a>
                                            </div>                               
</div>
</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
      
      
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

    $("#exampleX").DataTable({
      
      
    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });

    $('.infoBTN').on('click', function (event) {
                $('.infoTXT').toggle();
    });

});
</script>


  