@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Delete Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Roles</a></li>
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
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Delete role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

               @if ($UsersHasRole->count())

                  <h2 class="text-center text-danger"> Le role est déjà attribué à des users</h2>
                  <h4 class="text-center"> Vous devez changer ces relations avant de pouvoir le supprimer</h4>

                  
              @else

              <form id="quickForm" method="POST" action="{{route('adminDeleteRolePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$role->id}}" />
                
                  <h2 class="text-center"> Are you sure ? </h2>

                  <h4 class="text-center">Delete the role  : {{$role->name}} </h4>
                   <div class="card-footer">
                  <p class="text-center">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a href="{{route('adminShowRoles')}}" class="btn btn-success">No</a>
                  </p>
                </div>
              </form>
              @endif
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


