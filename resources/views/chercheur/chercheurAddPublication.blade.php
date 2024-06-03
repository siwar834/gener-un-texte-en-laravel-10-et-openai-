@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 >Ajouter une publication</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            
              <li class="breadcrumb-item active"><a href="{{route('chercheurShowPublications')}}">Publications</a></li>
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
                <h3 class="card-title">Ajouter une publication</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurAddPublicationPost')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" required name="titre" value="@if (session('titre')){{session('titre')}}@endif"class="form-control"placeholder="Entrer un titre d'une publication">
                  </div>
                 


                  <div class="form-group">
                    <label>Description</label>
                    <textarea  required name="description" class="form-control" placeholder="Entrer une description d'une publication"rows="3" >{{session('description')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <button type="submit" class="btn btn-success">Gener un image avec IA</button> 
                     <a href="{{session('image')}}" class="btn btn-primary">Voir image avec IA</a>
                   <input type="file" id="image" name="image" class="form-control">
                      </div>
                  <div class="form-group">
                    <label>Date </label>
                    <input type="date"  name="date_publication"  class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Affiliation</label>
                    <input type="text"  name="affiliation" class="form-control"placeholder="Entrer un affiliation d'une publication">
                  </div>
                  <div class="form-group">
                    <label>Revue</label>
                    <select name="revue"  class="form-control">
                      <option value="journal">journal</option>
                      <option value="conference"> conférence</option>
                      <option value="brevet"> brevet</option>
                    
                      <option value="livre">livre</option>
                      <option value="autre">autre</option>
                      </select> 
                 
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('chercheurShowPublications')}}" class="btn btn-secondary">Annuler</a>
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

  






