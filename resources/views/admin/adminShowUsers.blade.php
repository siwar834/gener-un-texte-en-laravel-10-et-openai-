@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des utilisateurs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Utilisateurs</a></li>
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
              <div class="card-body">
              
                <form  method="POST" action="{{route('adminShowUsersPost')}}" class="form-inline">
                  @csrf
                  <label  for="inlineFormInputName2" style="margin:5px;">Utilisateurs Actifs ?</label>
                  <select name="isactif" class="form-control " required style="margin:5px;">
                      <option value="tous" @if ($actifSelected=="tous") selected @endif>Tous</option>
                      <option value="oui" @if ($actifSelected=="oui") selected @endif>Oui</option>
                      <option value="non" @if ($actifSelected=="non") selected @endif>Non</option>
                  </select>
                  <button type="submit" class="btn btn-primary btn-sm " style="margin:5px;">Actualiser</button>
                </form>
              </div>
                   
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <a href="{{route('adminAddUser')}}" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Ajouter un utilisateur </a>
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                    <th>Nom </th>
                    <th>Prenom</th>
                 
                 
                    <th>Actif</th>
                 
                    <th>Email</th>
                    <th>Email valide</th>
                    <th>Rôles</th>

                 

                    <th>Actions</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{$user->nom}}</td>
                      <td>{{$user->prenom}}</td>
                  
                     
                    
                      <td>{{$user->actif}}</td>
                   
                      <td>{{$user->email}}</td>
                      <td>{{$user->emailvalide}}</td>
                      <td>
                        @foreach ($user->roles as $role)
                          <span class="right badge badge-info">{{$role->name}}</span>
                        @endforeach
                      </td>

                   
                    
                     
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary">Actions</button>
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">                          
                            
                            <a href="{{route('adminEditUser',$user->id)}}" class="dropdown-item text-warning" target="_blank"> <i class="fas fa-user"></i> Modifier </a>
                          </div>
                        </div>
                      </td>

                    </tr>
                    @endforeach
                  
                  </tbody>
                 
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
      
      "language": {
            "decimal": '.',
            "thousands": '',
        },
      
       "columnDefs": [
          { 
            "visible": false, "targets": [6,7] 
          },
          

        ],


    }).buttons().container().appendTo('#exampleX_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrerX').on('click', function (event) {
                $('.dtsb-searchBuilder').toggle();
    });
    $('.BtnExporterX').on('click', function (event) {
                $('.dt-buttons').toggle();
    });


    $.fn.dataTable.ext.search.push(function (settings, searchData, index, rowData, counter) 
    {
      var visibleColumns = settings.oInstance.api().columns().visible();
      var searchValue = $('#exampleX_filter input').val().toLowerCase();

      for (var i = 0; i < visibleColumns.length; i++) {
        if (visibleColumns[i]) {
          var columnData = searchData[i];
          if (columnData.toLowerCase().includes(searchValue)) {
            return true;
          }
        }
      }
      return false;
    });


});


</script>