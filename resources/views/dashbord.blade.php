@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      @if (Auth::user()->hasRole(['technicien']))
       
          
       <div class="col-md-12">
         <div class="card">
         

         
           <div class="card-body">
             <!-- contenu de planifier des projets-->
             <div class="row">

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{count($equipements)}}</h3>
<p>Equipements</p>
</div>
<div class="icon">
<i class="fa  fa-solid fa-lock"></i>
</div>
<a href="{{route('technicienShowEquipements')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>           

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>{{count($maintenances)}}</h3>
<p>Maintenances</p>
</div>
<div class="icon">

</div>
<a href="{{route('technicienShowMaintenances')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>{{count($contacttechniciens)}}</h3>
<p>Contacts</p>
</div>
<div class="icon">
<i class="fas fa-user-plus"></i>
</div>
<a href="{{route('technicienShowContacts')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>




             </div> <!-- end de contenu de planifier des projets-->


           </div>

         </div>
     
       </div>


   
     @endif
     @if (Auth::user()->hasRole(['directeur']))
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
           
              <div class="card-body">
                <!-- contenu de planifier des projets-->
                <div class="row">
                <div class="col-lg-3 col-6">




<div class="small-box bg-info">
<div class="inner">
<h3>{{count($publications)}}</h3>
<p>Publications</p>
</div>
<div class="icon">
<i class="fas fa-solid fa-pager nav-icon"></i>
</div>
<a href="{{route('directeurShowPublications')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{count($projets)}}</h3>
<p>Projets</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="{{route('directeurShowProjets')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>{{count($contacts)}}</h3>
<p>Contacts</p>
</div>
<div class="icon">
<i class="fas fa-user-plus"></i>
</div>
<a href="{{route('directeurShowContacts')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-secondary">
<div class="inner">
<h3>{{count($equipements)}}</h3>
<p>Equipements</p>
</div>
<div class="icon">
<i class="fa  fa-solid fa-lock"></i>
</div>
<a href="{{route('directeurShowEquipements')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-primary">
<div class="inner">
<h3>{{count($encadrements)}}</h3>
<p>Encardrements</p>
</div>
<div class="icon">
<i class="fas fa-solid fa-user-graduate nav-icon"></i>
</div>
<a href="{{route('directeurShowEncadrements')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>




                </div> <!-- end de contenu de planifier des projets-->


              </div>

            </div>
        
          </div>

          </div>
        </div>
        <!-- /.row -->
        @endif
      @if(isset($adminmessage))
          <div class="row">
            <div class="col-md-12">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Message de l'administrateur</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6" style="padding-left:20px; padding-right:20px;">
                      {!!$adminmessage->message_fr!!}
                    </div>
                    <div class="col-md-6" style="padding-left:20px; padding-right:20px;">
                      {!!$adminmessage->message_en!!}
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <form id="quickForm" method="POST" action="{{route('MarkUserAsReadMessagePost')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$adminmessage->id}}" />
                    <button type="submit" class="btn btn-secondary">Ok, ne plus afficher ce message / do not display this message anymore</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endif

        
       
        
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title ">Notes d'information / Notes de service</h3>

                  <div class="card-tools">
                  <button type="button" class="btn btn-tool BtnFiltrer2">
                    <i class="fas fa-filter"></i>
                  </button>
                  <button type="button" class="btn btn-tool BtnExporter2">
                    <i class="fas fa-file-export"></i>
                  </button>
               
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>

              </div>
              <div class="card-body">
                <div class="table-responsive-sm">
                <table id="example2" class="table table-sm table-bordered table-striped  table-head-fixed">
                  <thead>
                  <tr>
                    <th width="20%">Date</th>
                    <th width="75%">Information/Note</th>
                    <th width="5%">Lien</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($notes as $note)
                     <tr @if (\Carbon\Carbon::parseFromLocale($note->date)->isoFormat('YYYY-MM')==\Carbon\Carbon::parseFromLocale(now())->isoFormat('YYYY-MM'))
                      class="table-warning"
                      @endif
                      >
                      <td>{{$note->date}}</td>
                      <td>{{$note->note}}</td>
                      <td>
                        @if ($note->lien<>"") 
                          <a href="{{route('getFile',['rep'=>'notes','filename'=>$note->lien])}}" target="_blank">Voir</a>
                        @endif

                      </td>
                    </tr>
                    @endforeach
                  
                  @if (!$notes->count())
                    <tr><td colspan="3" class="text-center">Pas de notes pour le moment. </td></tr>
                  @endif
                  
                  </tbody>
                </table>
              </div>

              </div>

            </div>
        
         


        </div>
        <!-- /.row -->
      @if (Auth::user()->hasRole(['directeur']))
        
        
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title ">Planification des projets</h3>

              

              </div>
              <div class="card-body">
                <!-- contenu de planifier des projets-->
              
                <div class="table-responsive">
                  
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nom de projet</th>
                        <th scope="col">Date de début/Date de fin</th>
                       
                        <th scope="col">Statut</th>
                    </tr>
    <tbody class="table-group-divider">
    @foreach($projets as $projet)
        <tr>
         
            <td>{{$projet->titre}}</td>
            <td>{{$projet->date_debut}}<hr>
              {{$projet->date_fin}}</td>
           
            <td>{{$projet->statut}}</td>
        </tr>
        @endforeach
</tbody>
</table>    


</div>

                </div> <!-- end de contenu de planifier des projets-->


              </div>

           
        
         
        @endif

       
       
   
      
       

      
       
      

  
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
  

 
  


<script>


$(function () {



$("#example2").DataTable({

          "language": 
                {
                    "lengthMenu": "_MENU_ éléments",
                    "info": "De _START_ à _END_ sur _TOTAL_ éléments",
                
                }


        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


         $('.BtnFiltrer2').on('click', function (event) {
                    $('#example2_wrapper .dtsb-searchBuilder').toggle();
        });
        $('.BtnExporter2').on('click', function (event) {
                    $('#example2_wrapper .dt-buttons').toggle();
        });


   


});

</script>