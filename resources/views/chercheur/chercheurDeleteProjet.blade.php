@include ('header')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 > Projets</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
             <li class="breadcrumb-item active"><a href="{{route('chercheurShowProjets')}}">Projets</a></li>
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
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Supprimer d'un projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            
              <form id="quickForm" method="POST" action="{{route('chercheurDeleteProjetPost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$projet->id}}" />
                
                  <h2 class="text-center"> Etes vous sur de vouloir supprimer ce projet?</h2>

                   <div class="card-footer">
                  <p class="text-center">
                    <button type="submit" class="btn btn-danger">Oui</button>
                    <a href="{{route('chercheurShowProjets')}}" class="btn btn-success">Non</a>
                  </p>
                </div>
              </form>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->








