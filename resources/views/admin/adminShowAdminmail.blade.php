@include ('header')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détails du courrier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowAdminmails')}}">Envoi de mail</a></li>
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
            <p><b>Date : </b>{{$mail->date_envoi}}<br/>
               <b>Sujet : </b>{{$mail->sujet}}<br/>
          </div>
          @if(isset($mail))
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Courrier</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        {!!$mail->courrier!!}
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
          @endif

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
            <div class="card card-secondary">
              <div class="card-header">
                 
              
                <h3 class="card-title">Liste des destinataires</h3>
               
                <div class="card-tools">
                  <button type="button" class="btn btn-tool BtnFiltrer1">
                    <i class="fas fa-filter"></i>
                  </button>
                  <button type="button" class="btn btn-tool BtnExporter1">
                    <i class="fas fa-file-export"></i>
                  </button>
               
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
               <div class="table-responsive-sm">
                  <table id="example1"  class="table table-bordered table-striped table-head-fixed">
                    <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($users as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$mails[$loop->index]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                  </table>


                </div>
              </div>
            </div>
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

    $("#example1").DataTable({


    
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrer1').on('click', function (event) {
                $('#example1_wrapper .dtsb-searchBuilder').toggle();
    });

    $('.BtnExporter1').on('click', function (event) {
                $('#example1_wrapper .dt-buttons').toggle();
    });





});


</script>