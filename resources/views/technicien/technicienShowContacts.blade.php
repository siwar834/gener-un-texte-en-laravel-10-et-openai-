@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Liste des contacts</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('technicienShowContacts')}}">Contacts</a></li>
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
              <a href="#" class="btn btn-default btn-sm infoBTN"><img src="{{asset('/img/icons/help.png')}}" width="20px"/> Aide</a>
                     
                             <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
                  <div class="infoTXT" style="display:none; margin-top: 10px; margin-bottom: -15px;">
                    <p>
                      
                      <b>les contacts sont de type probléme technique </b> 
                    </p>
                  </div>
                 

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                                        <th>Id</th>
                                     
                                      
                                        <th>User</th>
                                        <th>Type</th>
                                       
                                         <th>Demande</th>
                                        <th>Reponse</th>
                                        <th>Etat</th>
                                        <th>Date et heure  demande</th>
                                        <th>Date et heure reponse</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                    
                                     
                                        
                      <td>@if (isset($contact->user)) {{$contact->user->nom}} {{$contact->user->prenom}} @endif</td>
                                        <td>{{ $contact->type}}</td>
                                        <td>{{ $contact->demande }}</td>
                                        <td>{{ $contact->reponse }}</td>
                                        <td>{{ $contact->etat}}</td>
                                        <td>{{ $contact->dateheure_demande }}</td>
                                        <td>{{ $contact->dateheure_reponse }}</td>
 
                                        <td>
                                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                            
                                                                     
                                            <a class="dropdown-item text-warning" href="{{route('technicienEditContact',$contact->id)}}" ><i class="fa fa-wrench"></i>  Modifier  </a>
                                                         
                                            <a class="dropdown-item text-danger" href="{{route('technicienDeleteContact',$contact->id)}}" ><i class="fa fa-trash"></i>  Supprimer  </a>
                                                         
                                            <a class="dropdown-item text-primary" href="{{route('technicienShowContact',$contact->id)}}" > <i class="fas fa-eye"></i> Voir détails  </a>
                                         
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
                                        <th>Type</th>
                                       
                                         <th>Demande</th>
                                        <th>Reponse</th>
                                        <th>Etat</th>
                                        <th>Date et heure  demande</th>
                                        <th>Date et heure reponse</th>
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