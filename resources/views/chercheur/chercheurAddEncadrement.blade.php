@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ajouter un encadrement</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chercheurShowEncadrements')}}">Encadrements</a></li>
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
                <h3 class="card-title">Ajouter un encadrement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST"  enctype="multipart/form-data" action="{{route('chercheurAddEncadrementPost')}}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Sujet</label>
                    <textarea required name="sujet" class="form-control" placeholder="Entrer le sujet"rows="2"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select name="type"   class="form-control">
                      <option value="master de recherche">Master de recherche </option>
                      <option value="doctorat" >Doctorat </option>
                      <option value=" post doctorat" >Post Doctorat </option>
                      <option value="habilitation" >Habilitation </option>
                      </select>

              </div>
                  <div class="form-group">
                    <label>Etudiant</label>
                    <select name="etudiante_id" class="form-control">
                      @foreach ($users as $user)
                        <option value="{{$user->id}}">
                          {{$user->nom}}   {{$user->prenom}}  
                        </option>
                      @endforeach
                    </select>
                      </div>
                      <div class="form-group">
                    <label>Avancement</label>
                    <textarea  name="avancement" class="form-control" placeholder="Entrer l'avancement"rows="2"></textarea>
                  </div>
                  <div class="form-group">
                    <label> Etat</label>
                    <input type="text"  name="etat" class="form-control" placeholder="Entrer un etat">
                  </div>
                  <div class="form-group">
                    <label>Lien meet</label>
                    <input type="text"  name="lien_meet" class="form-control"  placeholder="Entrer le lien meet ">
                  </div>
                  <div class="form-group">
                    <label>Cahier de charge</label>
                    <input type="file"  name="cahier_charge" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('chercheurShowEncadrements')}}" class="btn btn-secondary">Annuler</a>
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

  






