@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      
              <!-- /.card-header -->
              <h3 class="m-0">Détail d'une  publication</h3>
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

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <a href="{{route('chercheurShowPublications')}}" class="btn btn-secondary btn-sm "><i class="fas fa-solid fa-less-than"></i> Retour  </a>
                  <a href="{{route('chercheurEditPublication',$publication->id)}}" class="btn btn-warning btn-sm text-white"> <i class="fa fa-wrench"></i>  Modifier </a>
                  <a href="{{route('chercheurDeletePublication',$publication->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>  Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
                

                  <tr>
                    <th>Titre  </th>
                    <td>{{$publication->titre}}</td>
                  </tr>


                  <tr>
                    <th>Description </th>
                    <td>{{$publication->description}}</td>
                  </tr>
                  <tr>
                    <th>    Revue </th>
                    <td>{{$publication->revue}}</td>
                  </tr>
                  <tr>
                    <th>Affiliation </th>
                    <td>{{$auteur_publication->affiliation}}</td>
                  </tr>
                  <tr>
                    <th>Ordre  </th>
                    <td>{{$auteur_publication->ordre}}</td>
                  </tr>
                  <tr>
                    <th>Date </th>
                    <td>{{$publication->date_publication}}</td>
                  </tr>
@if($image)
                  <tr>
                    <th>Image</th>
                    <td><a href="{{asset('photos publications/'.$image->description)}}"> Voir image</a></td>
                  </tr>
                  @endif
                </table>
              </div>
             
       
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


 
  </div>
  <!-- /.content-wrapper -->

  


</div>


