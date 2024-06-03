@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Suppression d'une note</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowNotes')}}">Notes</a></li>
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
          <div class="col-md-3">
          </div>
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etes vous sur de vouloir supprimer cette note ?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
              <form id="quickForm" method="POST" action="{{route('adminDeleteNotePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$note->id}}" />
               
                <div class="detail">
                   <label>Note: </label>
                   <span>{{$note->note}} </span>
                </div>
                <div class="detail">
                   <label>Date :</label>
                   <span>{{$note->date}} </span>
                </div>
                 
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('adminShowNotes')}}" class="btn btn-secondary">Annuler</a>
              
             
             
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


