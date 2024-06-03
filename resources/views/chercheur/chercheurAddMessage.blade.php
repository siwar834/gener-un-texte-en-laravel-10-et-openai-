@include('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Ajouter un  message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chercheurShowMessages')}}">Messages</a></li>
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter un message</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurAddMessagePost')}}">
           @csrf

                <div class="card-body">
                <div class="form-group">
                    <label>Recepteur</label>
                    <select name="recepteur" class="form-control">
                        @foreach($recepteurs as $recepteur)
                        <option value="{{$recepteur->user_id}}">{{$recepteur->user->nom}} {{$recepteur->user->prenom}}</option>
                        @endforeach
                    </select>
                   </div>

                  <div class="form-group">
                    <label>Message</label>
                    <textarea required name="message" class="form-control"placeholder="Entre un message" rows="2"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" required name="date" class="form-control" >
                  </div>
              
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('chercheurShowMessages')}}" class="btn btn-secondary">Annuler</a>
                  </div>

                

              </div>
            </div>
        
        </div>
       
      </div>
    </section>
    

      
 </form>

  </div>

