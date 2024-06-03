@include ('header')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier un encadrement</h3>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier un encadrement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST"  enctype="multipart/form-data" action="{{route('chercheurEditEncadrementPost')}}">
                @csrf
                <div class="card-body">
                 <input type="hidden" value="{{$encadrement->id}}"name="id">
                  <div class="form-group">
                    <label>Sujet</label>
                    <textarea required name="sujet" class="form-control" placeholder="Entrer des sujets" rows="4">{{$encadrement->sujet}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select name="type"   value="{{$encadrement->type}}" class="form-control">
                      <option value="master de recherche"@if($encadrement->type =='master de recherche') selected @endif>Master de recherche </option>
                      <option value="doctorat"@if($encadrement->type =='doctorat') selected @endif >Doctorat </option>
                      <option value=" post doctorat" @if($encadrement->type =='post doctorat') selected @endif>Post Doctorat </option>
                      <option value="habilitation" @if($encadrement->type =='habilitation') selected @endif>habilitation </option>
                      </select>

              </div>
                  <div class="form-group">
                    <label>Etudiant</label>
                    <select name="etudiante_id" value="{{$encadrement->etudiante_id}}" class="form-control">
                      @foreach ($users as $user)
                        <option value="{{$user->id}}" @if($user->id ==$encadrement->etudiante_id) selected @endif>
                        {{$user->nom}}   {{$user->prenom}}  
                        </option>
                      @endforeach
                    </select>
                      </div>
                      <div class="form-group">
                    <label>Avancement</label>
                    <textarea  name="avancement"require  class="form-control" placeholder="Entrer l'avancement"rows="2">{{$encadrement->avancement}}</textarea>
                  </div>
                  <div class="form-group">
                    <label> Etat</label>
                    <input type="text" require name="etat"value="{{$encadrement->etat}}" class="form-control" placeholder="Entrer un etat">
                  </div>
                  <div class="form-group">
                    <label>Lien meet</label>
                    <input type="text" require name="lien_meet" class="form-control" value="{{$encadrement->lien_meet}}" placeholder="Entrer le lien meet ">
                  </div>
                  <div class="form-group">
                    <label>Cahier de charge</label>
                    <input type="file" require name="cahier_charge" value="{{$encadrement->cahier_charge}}" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
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

  






