
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Labortaire</title>
  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/adminlte.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/toastr/toastr.min.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/sb-1.1.0/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/fullcalendar/main.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css" >

  <!-- DualList -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">


<style>


.main-header
{
  z-index :9;
}


.dtsb-searchBuilder, .dt-buttons
{
    display: none;
}

#example1_filter, #example2_filter, #example3_filter, #example4_filter, #example5_filter, #exampleX_filter, #exampleY_filter, #exampleZ_filter
{
    display: inline-block;
    float: right;
}


.dataTables_filter
{
    display: inline-block;
    float: right;
}

.dataTables_length 
{
    display: inline-block;
}

.dt-buttons
{
    padding-bottom: 15px;
}

.dataTables_paginate
{
    display: inline-block;
    float: right;
}

.dataTables_info
{
    display: inline-block;
    padding-right: 20px;
}

  
</style>



 <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 


<!-- AdminLTE -->
<script src="{{asset('js/adminlte.js')}}"></script>

<!-- Chart.min.js -->
<script src="{{asset('plugins/chart.js/4/chart.js')}}"></script>
<script src="{{asset('plugins/chart.js/4/chartjs-plugin-datalabels.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.25/sb-1.1.0/datatables.min.js"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>

<!-- moment -->
<script src="{{asset('plugins/moment.min.js')}}"></script>
<script src="{{asset('plugins/datetime-moment.js')}}"></script>
<script src="{{asset('plugins/dataTables.dateTime.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

<!-- jquery validation -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- DualList -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<!-- sweetalert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>


</head>


      @php

        $userAlerts=\App\Models\Alert::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
        $userAlertsgroups=$userAlerts->groupBy('typealert');
        $NbreAlertsTotal=$userAlerts->count();
        $NbreAlertsNew=$userAlerts->where('etat','nonlu')->count();
        $photo=\App\Models\Gallerie::where('entite_id',Auth::user()->id)->where('type','photo profile')->first();

        $usermessages=\App\Models\Adminmessagesuser::where('user_id',Auth::user()->id)->get();
        $usermessageNews=[];
        $NbremessageNews=0;
        foreach($usermessages as $usermessage){
          $usermessageNew=\App\Models\Adminmessage::where('id',$usermessage->adminmessage_id)->where('etat','non lu')->get();
          if($usermessageNew){
            $usermessageNews[]=$usermessageNew;
            $NbremessageNews+=1;
          }


        }
       
        
       
      @endphp



<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Tableau de bord</a>  
      </li>
        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-comments"></i>
@if ($NbremessageNews<>0)
<span class="badge badge-danger navbar-badge">{{$NbremessageNews}}</span>
@endif
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

@foreach($usermessageNews as $usermessageNew)
<a href="#" class="dropdown-item">

<div class="media">
<img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">

<span class="float-right text-sm text-danger">{{$usermessageNew->titre}}<i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">{{$usermessageNew->message_fr}}</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$usermessageNew->datemessage}}</p>
</div>
</div>

</a>
@endforeach


<div class="dropdown-divider"></div>
<span class="dropdown-item dropdown-header">{{$NbremessageNews}} messages non lu </span>
@if (Auth::user()->hasRole(['administrateur']))
<a href="{{Route('adminShowAdminmessages')}}" class="dropdown-item dropdown-footer">Voir Messages</a>
@endif
@if (Auth::user()->hasRole(['technicien']))
<a href="{{route('technicienShowMessages')}}" class="dropdown-item dropdown-footer">Voir Messages</a>
@endif
@if (Auth::user()->hasRole(['chercheur']))
<a href="{{route('chercheurShowMessages')}}" class="dropdown-item dropdown-footer">Voir Messages</a>
@endif
@if (Auth::user()->hasRole(['directeur']))
<a href="" class="dropdown-item dropdown-footer">Voir Messages</a>
@endif
@if (Auth::user()->hasRole(['Etudiente de recherche']))
<a href="" class="dropdown-item dropdown-footer">Voir Messages</a>
@endif
</div>
</li>
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if ($NbreAlertsTotal<>0)
            <span class="badge badge-warning navbar-badge">{{$NbreAlertsTotal}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$NbreAlertsTotal}} Alertes dont {{$NbreAlertsNew}} nouvelle(s)</span>
          
          @foreach ($userAlertsgroups as $group)
              <div class="dropdown-divider"></div>
              <a href="{{route('alerts',$group->first()->typealert)}}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$group->count()}} {{$group->first()->typealert}} 
                <span class="float-right text-muted text-sm">{{\Carbon\Carbon::parseFromLocale($group->first()->date)->diffForHumans()}}</span>
              </a>
          @endforeach
        
         
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Mon Profil</span>
          
             <div class="dropdown-divider"></div>

              <a href="{{route('profile')}}" class="dropdown-item">
                <i class="fas fa-info mr-2"></i>Mes informations  
              </a>

              <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;"> @csrf </form>
              <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
              </a>
         
         
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="{{route('dashboard')}}" class="brand-link">
    @if (Auth::user()->hasRole(['administrateur']))
    <img src="{{asset('logos/start.png') }}" class="brand-image " width="50px" height="50px">
    <span class="brand-text   font-weight-light">    Start Search</span>
    @endif
    @if (Auth::user()->hasRole(['chercheur']) || Auth::user()->hasRole(['Chef de projet'])|| Auth::user()->hasRole(['directeur']) || Auth::user()->hasRole(['technicien']) || Auth::user()->hasRole(['Etudiante de recherche']))
    <img src="{{asset('logos/'.Session::get('logolaboratoire')) }}" class="brand-image ">
      <span class="brand-text font-weight-light">{{Session::get('nomlaboratoire') }}</span>
 
   @endif
  
    </a>

   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-4 d-flex">
        @if($photo)
        <img src="{{asset('photos/'.$photo->description)}}" style="margin-left:14px"class="brand-image rounded-circle">
        
        @else
          <img src="{{asset('img/user.png')}}" class="brand-image">
      @endif
        <div class="info">

          <a href="{{route('profile')}}" class="d-block">{{\Auth::user()->nom}}&nbsp {{\Auth::user()->prenom}}</a>
        </div>
      </div>

  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
           
               @if (Auth::user()->hasRole(['administrateur']))
            <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Administration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                
                    <li class="nav-item">
                      <a href="{{route('adminShowSecurites')}}" class="nav-link">
                        <i class="fas fa-exclamation-triangle  nav-icon"></i>
                        <p>Journal de sécurité</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowUsers')}}" class="nav-link">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Utilisateurs</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="{{route('adminShowRoles')}}" class="nav-link">
                        <i class="fas fa-user-tag nav-icon"></i>
                        <p>Rôles</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="{{route('adminShowNotes')}}" class="nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>Notes</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowAdminmessages')}}" class="nav-link">
                        <i class="fa fa-comment nav-icon"></i>
                        <p>Messages d'accueil</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowAdminmails')}}" class="nav-link">
                        <i class="fa fa-envelope nav-icon"></i>
                        <p>Envoi de mails</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowLaborataires')}}" class="nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>Laborataires</p>
                      </a>
                    </li>
  
              </ul>
            </li>

          @endif 
        
          @if (Auth::user()->hasRole(['technicien']))
         

            <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Technicien
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                
             
                    
                   

                    <li class="nav-item">
                      <a href="{{Route('technicienShowContacts')}}" class="nav-link">
                      <i class="fa fa-solid fa-users nav-icon"></i>
                        <p> Contacts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{Route('technicienShowMesContacts')}}" class="nav-link">
                      <i class="fa fa-solid fa-user nav-icon"></i>
                        <p> Mes contacts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{Route('technicienShowEquipements')}}" class="nav-link">
                      <i class="fa  fa-solid fa-lock nav-icon"></i>
                        <p> Equipements</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{Route('technicienShowMaintenances')}}" class="nav-link">
                      <i class="fa fa-wrench nav-icon"></i> 
                        <p> Maintenances</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{Route('technicienShowMessages')}}" class="nav-link">
                      <i class="fa fa-regular fa-comments nav-icon"></i>
                        <p> Messages</p>
                      </a>
                    </li>


                   
  
              </ul>
            </li>

          @endif 
          @if (Auth::user()->hasRole(['directeur']))
          
          <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
            Directeur labo
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
            
                   <li class="nav-item" >
                      <a href="{{Route('directeurShowlaborataire')}}" class="nav-link ">
                      <i class="fas fa-solid fa-clipboard-list nav-icon"></i>
                      <p>Laborataire</p>
                      </a>
                    </li>
                    <li class="nav-item" >
                     <a href="{{Route('directeurShowProjets')}}" class="nav-link ">
                     <i class="fas fa-solid fa-clipboard-list nav-icon"></i>
                     <p>Projets</p>
                     </a>
                    </li>
              <li class="nav-item" >
            <a href="{{Route('directeurShowPublications')}}" class="nav-link">
        <i class="fas fa-solid fa-pager nav-icon"></i>
       <p> Publications</p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{Route('directeurShowEquipements')}}" class="nav-link">
        <i class="fas   fa-solid fa-lock nav-icon"></i>
                        <p>Equipements</p>
                      </a>
          </li>
      <li class="nav-item">
        <a href="{{Route('directeurShowFonds')}}" class="nav-link ">
        <i class="fas fa-solid fa-building nav-icon"></i>
         <p>Fonds</p>
        </a>
      </li>
      <li class="nav-item" >
        <a href="{{Route('directeurShowRessources')}}" class="nav-link">
   
        <i class="fas fa-solid fa-layer-group nav-icon"></i>
        <p> Ressources</p>
        </a>
      </li>
      
      <li class="nav-item" >
        <a href="{{Route('directeurShowEncadrements')}}" class="nav-link ">
        <i class="fas fa-solid fa-user-graduate nav-icon"></i>
        <p>Encadrements</p>
        </a>
      </li>
      <li class="nav-item" >
        <a href="{{Route('directeurShowContacts')}}" class="nav-link ">
        <i class="fas fa-solid fa-users nav-icon"></i>
        <p> Contacts</p>
        </a>
        </li>
        </ul>
           

      @endif
      @if (Auth::user()->hasRole(['Etudiante de recherche']))
      <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
          Etudiant de recherche
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
            
              <li class="nav-item">
                      <a href="{{route('etudiantShowProjets')}}" class="nav-link">
                      <i class="fas fa-solid fa-clipboard-list nav-icon"></i>
                      <p>Mes projets</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('etudiantShowContacts')}}" class="nav-link">
                      <i class="fas fa-solid fa-users nav-icon"></i>
                      <p>Mes contacts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('etudiantShowEncadrement')}}" class="nav-link">
                      <i class="fas fa-solid fa-user-graduate nav-icon"></i>
                      <p>Mon encadrement</p>
                      </a>
                    </li>
</ul>

      @endif
      @if (Auth::user()->hasRole(['chercheur']))
      <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
              Chercheur
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
      <li  class="nav-item" >
        <a href="{{Route('chercheurShowProjets')}}" class="nav-link ">
        <i class="fas fa-solid fa-clipboard-list nav-icon"></i>
        <p>Mes projets</p>
        </a>
      </li>
      <li  class="nav-item" >
        <a href="{{Route('chercheurShowPublications')}}" class="nav-link ">
        <i class="fas fa-solid fa-pager nav-icon"></i>
       <p> Mes publications</p>
        </a>
      </li>
      
      
    <li  class="nav-item" >
        <a href="{{Route('chercheurShowEncadrements')}}" class="nav-link ">
        <i class="fas fa-solid fa-user-graduate nav-icon"></i>
       <p> Mes encadrements</p>
        </a>
      </li>
      <li  class="nav-item">
        <a href="{{Route('chercheurShowContacts')}}" class="nav-link ">
        <i class="fas fa-solid fa-users nav-icon"></i>
       <p> Mes contacts</p>
        </a>
      </li>
      <li class="nav-item">
                      <a href="{{Route('chercheurShowMessages')}}" class="nav-link">
                      <i class="fa fa-regular fa-comments nav-icon"></i>
                        <p> Messages</p>
                      </a>
                    </li>
</ul>
      @endif
      @if (Auth::user()->hasRole(['Chef de projet']))
      <li class="nav-item menu-open sidebar-collapse">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
              Chef de projet
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
      <li  class="nav-item" >
        <a href="{{Route('chefprojetShowProjets')}}" class="nav-link ">
        <i class="fas fa-solid fa-clipboard-list nav-icon"></i>
        <p> Mes projets</p>
        </a>
      </li>
     
  
        </ul>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

<script>
 
$(document).ready(function() {

  //Initialize Select2 Elements

  $('.select2').select2()

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('.select2bs4Tag').select2({
  theme: 'bootstrap4'
  })

  //Message Toaster
   
  @if(Session::has('InfoMessage'))
    $(function () {
        $(document).Toasts('create', {
            icon:'fa fa-info-circle',
            autohide: true,
            delay : 10000,
            class: 'bg-info',
            title: 'Information :',
            body: '{{Session::get('InfoMessage')}}'
          });
    });
  @endif

@if(Session::has('SuccessMessage'))
    $(function () {
        $(document).Toasts('create', {
            icon:'fa fa-check-circle',
            autohide: true,
            delay : 10000,
            class: 'bg-success',
            title: 'Opération effectuée avec succès.',
            body: '{{Session::get('SuccessMessage')}}'
          });
    });
  @endif

  @if(Session::has('WarningMessage'))
    $(function () {
        $(document).Toasts('create', {
            icon:'fas fa-exclamation-triangle',
            delay : 10000,
            class: 'bg-warning',
            title: 'Attention : ',
            body: '{{Session::get('WarningMessage')}}'
          });
    });
  @endif


  @if(Session::has('ErrorMessage'))
    $(function () {
        $(document).Toasts('create', {
            icon:'fa fa-times-circle',
            class: 'bg-danger',
            title: 'Attention : Opération non effectuée !',
            body: '{{Session::get('ErrorMessage')}}'
          });
    });
  @endif


});


</script>

<style>
  .toast
  {
    font-size: x-large;
    max-width: none;
  }
  
</style>

