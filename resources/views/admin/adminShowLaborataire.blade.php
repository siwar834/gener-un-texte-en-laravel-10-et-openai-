@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Détail d'un laborataire</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="{{route('adminShowLaborataires')}}">Laborataires</a></li>
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
                    <th>Nom </th>
                    <td>{{$laborataire->nom}}</td>
                  </tr>

                  <tr>
                    <th>Description</th>
                    <td>{{$laborataire->description}}</td>
                  </tr>

                  <tr>
                    <th>Directeur</th>
                    <td>{{$laborataire->directeur_id}}</td>
                  </tr>
                  
                  <tr>
                    <th>Logo</th>
                    <td><img src="{{asset('logos/'.$laborataire->logo)}}"   width="75px" height="75px"/></td>
                  </tr>
                
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <h3>Les membres </h3>
            <div class="card">
             

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Id</th>
                     <th>Nom et Prenom</th>
                     <th>Fonction</th>
                     <th>grade</th>
                     <th>Domaine de recherche</th>
                   
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
                    
                  </tr>
                  @endforeach
                  </tbody>
                <tfoot>
                <tr>
                     <th>Id</th>
                     <th>Nom et Prenom</th>
                     <th>Fonction</th>
                     <th>grade</th>
                     <th>Domaine de recherche</th>
                 
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

  

  
  

<script>

  $(function () {

    $("#exampleX").DataTable({
      
      


    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    



});


</script>