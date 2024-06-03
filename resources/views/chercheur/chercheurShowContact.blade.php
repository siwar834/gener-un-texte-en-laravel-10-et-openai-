@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Détail d'un contact</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chercheurShowContacts')}}">Contacts</a></li>
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
           

 
                  <a href="{{route('chercheurShowContacts')}}" class="btn btn-secondary btn-sm"> <i class="fas fa-solid fa-less-than"></i> Retour  </a>
                  <a href="{{route('chercheurEditContact',$contact->id)}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-wrench"></i> Modifier  </a>
                  <a href="{{route('chercheurDeleteContact',$contact->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>  Supprimer  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
                

                  <tr>
                    <th>Utilisateur   </th>
                    <td>{{$contact->user->nom}} {{$contact->user->prenom}} </td>
                  </tr>

                  

                  <tr>
                    <th>Type </th>
                    <td>{{$contact->type}}</td>
                  </tr>

                  <tr>
                    <th>Etat </th>
                    <td>{{$contact->etat}}</td>
                  </tr>
                  <tr>
                    <th>Demande </th>
                    <td>{{$contact->demande}}</td>
                  </tr>
                  <tr>
                    <th>Reponse </th>
                    <td>{{$contact->reponse}}</td>
                  </tr>
                  <tr>
                    <th>Date et heure demande </th>
                    <td>{{$contact->dateheure_demande}}</td>
                  </tr>
                  <tr>
                    <th>Date et heure reponse </th>
                    <td>{{$contact->dateheure_reponse}}</td>
                  </tr>
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

  


