@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modifier un membre</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowlaborataire')}}">Laborataire</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.cont   ainer-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
      

            <div class="col-md-12">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Modifier un membre</h3>
                </div>
                
                  <div class="card-body">
                  <form id="quickForm" method="POST" action="{{route('directeurEditMembrePost')}}">
                         @csrf
                    <input type="hidden" name="id" value="{{$membre->id}}">
                         <div class="form-group">
                        <label>User</label>
                        <select name="user_id"  class="form-control">
                      @foreach ($users as $user)
                        <option value="{{$user->id}}" @if($membre->user_id==$user->id) selected @endif >
                          {{$user->nom}}  {{$user->prenom}}
                        </option>
                      @endforeach
                    </select>
                         </div>
                      

                 
                      <div class="form-group">
                        <label>Fonction</label>
                        <input type="text"  require name="fonction" value="{{$membre->fonction}}" class="form-control"  placeholder="Ajouter la fonction">
                      </div>
                      <div class="form-group">
                        <label>Grade</label>
                        <input type="text" require name="grade" class="form-control" value="{{$membre->grade}}" placeholder="Ajouter un grade">
                      </div>
                      <div class="form-group">
                        <label>Domaine de recherche </label>
                        <input type="text" require name="domainederecherche" value="{{$membre->domainederecherche}}"class="form-control"  placeholder="Ajouter un domaine de recherche">
                      </div>
                     
                      <div class="form-group">
                        <label>Biographique </label>
                        <input type="text" name="biographique" class="form-control"value="{{$membre->biographique}}"  placeholder="Ajouter un domaine de recherche">
                      </div>
                    

               

                
                                    
                 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a class="btn btn-secondary" href="{{route('directeurShowlaborataire')}}">Annuler</a>
                </div>


              </div>
            </div>
                  
   
              



              </div>
              </form>
            </div>
            <!-- /.card -->
           
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->


  
