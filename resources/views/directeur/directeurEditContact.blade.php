@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier un contact</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('directeurShowContacts')}}">Contacts</a></li>
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
                <h3 class="card-title">Modifier un contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurEditContactPost')}}">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="id" value="{{$contact->id}}"/>
               
                  <div class="form-group">
                    <label>Type</label>
                    <select  required name="type"value="{{$contact->type}}"  class="form-control">

                      <option value="reclamation" @if($contact->type=='reclamation')selected @endif>Réclamation</option>
                      <option value="demande" @if($contact->type=='demande')selected @endif>Demande</option>
                      <option value=" idee" @if($contact->type=='idee')selected @endif> Idée</option>
                    </select>
               
                  </div>
                  <div class="form-group">
                    <label>Demande</label>
                    <input type="text" required name="demande"value="{{$contact->demande}}" class="form-control" placeholder="Entrer une demende">
                  </div>
                  <div class="form-group">
                    <label>reponse</label>
                    <input type="text"  name="reponse"value="{{$contact->reponse}}" class="form-control"placeholder="Entrer une reponse">
                  </div>
                  <div class="form-group">
                    <label>Etat</label>
                    <select name="etat" class="form-control"  >
                    <option value="non lu" @if ($contact->etat=='non lu') selected @endif>Non lu</option>
                    <option value=" lu" @if ($contact->etat=='lu') selected @endif> Lu</option>
                    <option value="traite"@if ($contact->etat=='traite') selected @endif >Traité</option>
                    </select>


                    </div>
                

                  
                  <div class="form-group">
                    <label>Date et heure du demande</label>
                    <input type="datetime-local"  name="dateheure_demande" value="{{$contact->dateheure_demande}}"class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Date et heure du reponse</label>
                    <input type="datetime-local"  name="dateheure_reponse" value="{{$contact->dateheure_reponse}}"class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('directeurShowContacts')}}" class="btn btn-secondary">Annuler</a>
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

  


