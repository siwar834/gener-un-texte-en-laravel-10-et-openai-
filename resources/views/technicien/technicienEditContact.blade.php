@include ('header')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Mettre à jour un contact</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('technicienShowContacts')}}">Contacts</a></li>
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
                <h3 class="m-0">Modifier un contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('technicienEditContactPost')}}">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="id" value="{{$contact->id}}"/>

                 
                 
                  <div class="form-group">
                    <label>Reponse</label>
                    <Textarea  name="reponse"class="form-control"placeholder="Entrer une reponse"rows="4">{{$contact->reponse}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Etat</label>
                    <select  required name="etat"value="{{$contact->etat}}"  class="form-control">
                      <option value="non lu" @if($contact->etat == "non lu") selected @endif>non lu</option>
                    
                      <option value=" lu"@if($contact->etat == " lu") selected @endif > lu</option>
                      <option value="traite"@if($contact->etat == "traite") selected @endif > traité</option>
                    </select>
                 
                  </div>
                

                  
                
                  <div class="form-group">
                    <label>Date et heure du reponse</label>
                    <input type="datetime-local"  name="dateheure_reponse" value="{{$contact->dateheure_reponse}}"class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('technicienShowContacts')}}" class="btn btn-secondary">Annuler</a>
                  </div>

                

              </div>
            </div>
        
        </div>
       
      </div>
    </section>
    

      
 </form>

  </div>
 

  

  </div>
  <!-- /.content-wrapper -->

  





<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
  
