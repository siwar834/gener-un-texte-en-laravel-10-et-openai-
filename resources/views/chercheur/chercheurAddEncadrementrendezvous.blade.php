@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ajouter un rendezvous d'un encadrement </h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('chercheurShowEncadrement',Session::get('encadrement_id'))}}">Encadrement</a></li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter un rendez-vous  d'un encadrement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurAddEncadrementrendezvousPost')}}">
                @csrf
                <div class="card-body">
                
                 
                 
                  <div class="form-group">
                    <label>Discussion</label>
                    <textarea required name="discussion" class="form-control"placeholder="Entrer une discussion" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="datetime-local" required name="datetime" class="form-control"placeholder="Entrer un etat" />
                  </div>
                   
                  <div class="form-group">
                    <label>Etat</label>
                           <select name="etat" required class="form-control">
                            <option value="en attende">En attende</option>
                            <option value="effectué">Effectué</option>
                            <option value="annulé">Annulé</option>
                            <option value="obsent chercheur">Obsent chercheur</option>
                            <option value="obsent etudiant">Obsent etudiant</option>
                           </select>


                
                  </div>
                

                 
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('chercheurShowEncadrement',Session::get('encadrement_id'))}}" class="btn btn-secondary">Annuler</a>
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

  




