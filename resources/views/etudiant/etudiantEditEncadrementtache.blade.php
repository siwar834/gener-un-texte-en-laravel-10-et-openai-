@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier une tache d'un  encadrement </h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('etudiantShowEncadrement')}}">Encadrement</a></li>
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
                <h3 class="card-title">Modifier une tache d'un  encadrement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('etudiantEditEncadrementtachePost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$encadrements_tache->id}}"/>
                <div class="form-group">
                    <label>Tache</label>
                    <textarea required name="tache"   class="form-control"placeholder="Entrer une tache" rows="4">{{$encadrements_tache->tache}}</textarea>
                  </div>
                 
                  <div class="form-group">
                    <label>Discussion</label>
                    <textarea required name="discussion"   class="form-control"placeholder="Entrer une discussion" rows="4"></textarea>
                  </div>
                 
                   
                 
                

                 
                 
              
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('etudiantShowEncadrement')}}" class="btn btn-secondary">Annuler</a>
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

  





