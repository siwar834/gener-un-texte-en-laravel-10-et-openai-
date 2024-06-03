@include ('header')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@if ($alerts->count())
              Liste des alertes concernant les {{$alerts->first()->typealert}}
              @endif
            </h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Alertes</a></li>
            </ol>
          </div>

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
                <div class="row">
                  <p>
                  <a href="#" class="BtnFiltrerX btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporterX btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
         </p>
                </div>    
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
             
                <table id="exampleX" class="table table-bordered table-striped table-head-fixed">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Messages</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($alerts as $alert)
                    <tr>
                      <td>
                        {{$alert->date}}
                      </td>
                      <td>
                        {{$alert->message}}
                      </td>

                      <td>
                         <a class="btn btn-primary btn-sm" target="_blank" href="{{$alert->alert_route}}">Accéder</a>
                         <a class="btn btn-danger btn-sm btnDelete" href="{{route('delete_alert',$alert->id)}}"> Supprimer </a>
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
  

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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





    // Sélectionner tous les éléments avec la classe btnDelete
    var deleteButtons = document.querySelectorAll('.btnDelete');

    // Attacher un gestionnaire d'événements à chaque bouton de suppression
    deleteButtons.forEach(function (button) {
      button.addEventListener('click', function (event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien

        // Afficher la SweetAlert
        Swal.fire({
          title: 'Êtes-vous sûr?',
          text: 'Cette action est irréversible!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
          // Si l'utilisateur clique sur le bouton de confirmation
          if (result.isConfirmed) {
            // Rediriger vers l'URL de suppression
            window.location.href = button.href;
          }
        });
      });
    });



});


</script>