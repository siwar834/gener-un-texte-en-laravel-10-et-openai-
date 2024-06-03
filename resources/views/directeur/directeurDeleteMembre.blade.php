@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supprimer d'un membre</h1>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etes vous sur de vouloir supprimer ce membre ?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            
              <form id="quickForm" method="POST" action="{{route('directeurDeleteMembrePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$membre->id}}" />
                <div class="card-body">
                    

               
                <div class="detail">
                 <label>User:</label>
                  <span>{{$membre->user_id}}</span>
                </div>
                <div class="detail">
                   <label>fonction:</label>
                    <span>{{$membre->fonction}}</span>
                 </div>
                 <div class="detail">
                   <label>grade:</label>
                    <span>{{$membre->grade}}</span>
                 </div>
                 <div class="detail">
                   <label>domaine de recherche:</label>
                    <span>{{$membre->domainederecherche}}</span>
                 </div>
             
                  <p>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('directeurShowlaborataire')}}" class="btn btn-secondary">Annuler</a>
                  </p>
                </div>
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

  



  @include ('footer')


