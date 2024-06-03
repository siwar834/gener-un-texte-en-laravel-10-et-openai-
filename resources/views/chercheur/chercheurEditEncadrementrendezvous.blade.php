@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier un rendez-vous d'un encadrement </h3>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier un rendez-vous d'un encadrement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurEditEncadrementrendezvousPost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$encadrements_rendezvous->id}}"/>
               
                 
                  <div class="form-group">
                    <label>Discussion</label>
                    <textarea required name="discussion"   class="form-control"placeholder="Entrer une discussion" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="datetime-local" required name="datetime" value="{{ $encadrements_rendezvous->datetime}}"class="form-control"placeholder="Entrer un etat" />
                  </div>
                   
                  <div class="form-group">
                    <label>Etat</label>
                    <select name="etat" required class="form-control">
                            <option value="en attende" @if($encadrements_rendezvous->etat=="en attende")selected @endif>En attende</option>
                            <option value="effectué " @if($encadrements_rendezvous->etat=="effectué")selected @endif>Effectué</option>
                            <option value="annulé" @if($encadrements_rendezvous->etat=="en annulé")selected @endif >Annulé</option>
                            <option value="obsent chercheur"  @if($encadrements_rendezvous->etat=="obsent chercheur")selected @endif>Obsencé chercheur</option>
                            <option value="obsent etudiant" @if($encadrements_rendezvous->etat=="obsent etudiant")selected @endif>Obsencé etudiant</option>
                           </select>
                
                  </div>
                

                 
                 
              
                  <button type="submit" class="btn btn-warning">Modifier</button>
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

  





