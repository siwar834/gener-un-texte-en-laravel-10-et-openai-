@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modifier un laborataire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowlaborataire')}}">Laborataire</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier un laborataire</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurEditLaboratairePost')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="id" value="{{$laborataire->id}}"/>
                  

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text"value="{{$laborataire->description}}" required name="description" class="form-control" placeholder="Entrer une description">
                  </div>
                  
                  <div class="form-group">
                    <label>Logo</label>
                    <input type="file" id="logo"value="{{$laborataire->logo}}" name="logo" class="form-control" placeholder="Entrer un ficher (Image), taille Max. 30Mo">
                  </div>
                  
                  


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                   <a href="{{route('directeurShowlaborataire')}}" class="btn btn-secondary">Annuler</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  




  @include ('footer')
  


  
