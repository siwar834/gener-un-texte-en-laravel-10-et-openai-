@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Mettre à jour un équipement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('technicienShowEquipements')}}">Equipements</a></li>
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
                <h3 class="m-0">Mise à jour d'un équipement</h3>
              </div>
              <form id="quickForm" method="POST" action="{{route('technicienEditEquipementPost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$equipement->id}}" />
        
                  <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{$equipement->nom}}" required name="nom" class="form-control" placeholer="Entrer un nom">
                  </div>
                  
                  <div class="form-group">
    <label>Disponibilité</label>
    <select name="disponibilite" class="form-control">
        <option value="disponible" @if($equipement->disponibilite == "disponible") selected @endif>Disponible</option>
        <option value="non disponible" @if($equipement->disponibilite == "non disponible") selected @endif>Non disponible</option>
    </select>
</div>


                  <div class="form-group">
                    <label>Description</label>
                    <textarea required  name="description" class="form-control" placeholder="Entrer une description d'un équipement"rows="2">{{$equipement->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Date achat</label>
                    <input type="date" required name="date_achat" value="{{$equipement->date_achat}}" class="form-control" >
                  </div>
                
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('technicienShowEquipements')}}" class="btn btn-secondary">Annuler</a>
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
  <!-- /.content-wrap