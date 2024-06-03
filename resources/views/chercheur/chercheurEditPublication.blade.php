@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 >Modifier une publication</h3>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier une publication</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurEditPublicationPost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$publication->id}}" />
        
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" value="{{$publication->titre}}" required name="titre" class="form-control"placeholder="Entrer un titre d'une publication" >
                  </div>
                  
                  

                  <div class="form-group">
                    <label>Description</label>
                    <textarea  required name="description" class="form-control" placeholder="Entrer une description d'une publication" >{{$publication->description}}</textarea>
                  </div>
                  
                 
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date"  name="date_publication" value="{{$publication->date_publication}}" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Affiliation</label>
                    <input type="text" required name="affiliation" value="{{$auteur_publication->affiliation}}"  class="form-control"placeholder="Entrer un affiliation d'une publication">
                  </div>
                  <div class="form-group">
                    <label>Revue</label>
                    <select name="revue" value="{{$publication->revue}}"  class="form-control">
                      <option value="journal" @if ($publication->revue=='journal') selected @endif >journal</option>
                      <option value="conference" @if ($publication->revue=='conference') selected @endif> conférence</option>
                      <option value="brevet"@if ($publication->revue=='brevet') selected @endif > brevet</option>
                    
                      <option value="livre" @if ($publication->revue=='livre') selected @endif >livre</option>
                      <option value="autre"@if ($publication->revue=='autre') selected @endif>autre</option>
                      </select> 
</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('chercheurShowPublications')}}" class="btn btn-secondary text-dark">Annuler</a>
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

  




