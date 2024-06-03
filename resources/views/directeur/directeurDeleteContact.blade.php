@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 >   Supprimer un contact</h3>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etes vous sur de vouloir supprimer cette contact?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            
              <form id="quickForm" method="POST" action="{{route('directeurDeleteContactPost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$contact->id}}" />
                    <div class="card-body">

                      <div class="details">
                        <label >Type :</label>
                        <span>{{$contact->type}}</span>

                      </div>
                      
                      <div class="details">
                        <label >User :</label>
                        <span>{{$contact->user_id}}</span>

                      </div>
                      <div class="details">
                        <label >Etat :</label>
                        <span>{{$contact->etat}}</span>

                      </div>
                      <div class="details">
                        <label >Demande :</label>
                        <span>{{$contact->demande}}</span>

                      </div>
                      <div class="details">
                        <label >Reponse :</label>
                        <span>{{$contact->reponse}}</span>

                      </div>
                      <div class="details">
                        <label >Date et heure de reponse :</label>
                        <span>{{$contact->dateheure_demande}}</span>

                      </div>
                      <div class="details">
                        <label >Date et heure de reponse :</label>
                        <span>{{$contact->dateheure_reponse}}</span>

                      </div>
                    </div>

                   <div class="card-footer">
            
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('directeurShowContacts')}}" class="btn btn-secondary">Annuler</a>
             
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





