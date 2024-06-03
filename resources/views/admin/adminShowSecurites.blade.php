@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des alertes de sécurité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Securité</a></li>
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
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Employé</th>
                    <th>Table</th>
                    <th>Champ</th>
                    <th>Element</th>
                    <th>Ancien</th>
                    <th>Nouveau</th>
                    <th>Etat</th>
                    <th>Alerte</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($securites->sortByDesc('date') as $securite)
                    <tr>
                      <td>{{$securite->date}}</td>
                      <td>{{$securite->niveau}}</td>
                      <td>{{$securite->type}}</td>
                      <td>{{$securite->user->name}} ({{$securite->user->ref}}) </td>
                      <td>{{$securite->nomtable}}</td>
                      <td>{{$securite->nomelement}}</td>
                      <td>{{$securite->element}}</td>
                      <td>{{$securite->ancien}}</td>
                      <td>{{$securite->nouveau}}</td>
                      <td>{{$securite->etat}}</td>
                      <td>{{$securite->alerte}}</td>
                      <td>{!!$securite->commentaire!!}</td>
                      <td><a href="{{route('adminEditSecurite',$securite->id)}}" class="btn btn-warning">Edit</a></td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Employé</th>
                    <th>Table</th>
                    <th>Champ</th>
                    <th>Element</th>
                    <th>Ancien</th>
                    <th>Nouveau</th>
                    <th>Etat</th>
                    <th>Alerte</th>
                    <th>Commentaire</th>
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

      
    "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            filter:'applied'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            filter:'applied'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                          filter:'applied'
                        }
                    },
                  
                    "colvis"
                ],
    
      
    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });


});


</script>