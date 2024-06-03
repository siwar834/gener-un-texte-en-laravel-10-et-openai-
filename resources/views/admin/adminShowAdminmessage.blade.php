@include ('header')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détails du message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowAdminmessages')}}">Messages Admin</a></li>
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
            <p><b>Date : </b>{{$message->datemessage}}<br/>
               <b>Titre : </b>{{$message->titre}}<br/>
               <b>Message : </b></p>
          </div>
          @if(isset($message))
              <div class="col-md-12">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Message de l'administrateur</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6" style="padding-left:20px; padding-right:20px;">
                        {!!$message->message_fr!!}
                      </div>
                      <div class="col-md-6" style="padding-left:20px; padding-right:20px;">
                        {!!$message->message_en!!}
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
                 
              
                <h3 class="card-title">Liste des utilisateurs qui ont consulé le message (@if (isset($message->adminmessagesusers)) {{$message->adminmessagesusers->count()}} @else 0 @endif)</h3>
               
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
                      <th>Fonction</th>
                      <th>Date consultation</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if (isset($message->adminmessagesusers))

                        @foreach ($message->adminmessagesusers as $adminmessagesuser)
                            <tr>
                              <td>{{$adminmessagesuser->user->nom}} {{$adminmessagesuser->user->prenom}}</td>
                              <td>{{$adminmessagesuser->user->fonction}}</td>
                              <td>{{$adminmessagesuser->dateconfirmation}}</td>
                            </tr>
                        @endforeach
                      @endif
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



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                 
              
                <h3 class="card-title">Liste des utilisateurs qui n'ont pas consulté le message</h3>
               
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
                  <table id="example2"  class="table table-bordered table-striped table-head-fixed">
                    <thead>
                    <tr>
                      <th>Nom </th>
                      <th>Email</th>
                     </tr>
                    </thead>
                    <tbody>
                      @foreach ($users_DidNotViewedMessage as $user)
                      
                          <tr>
                            <td>{{$user->nom}} {{$user->prenom}}</td>
                            <td>{{$user->email}}</td>
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





    $("#example2").DataTable({

      
      
      
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    

    $('.BtnFiltrer2').on('click', function (event) {
                $('#example2_wrapper .dtsb-searchBuilder').toggle();
    });

    $('.BtnExporter2').on('click', function (event) {
                $('#example2_wrapper .dt-buttons').toggle();
    });


});


</script>