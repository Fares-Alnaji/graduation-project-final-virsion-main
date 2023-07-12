@extends('dashboard.parent')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('roles.store') }}">
                            <div class="card-body">
                                  @csrf
                                  <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control" id="guard" name="city_id">
                                            <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                      name="user_name"  placeholder="Enter the Name">
                                </div>
                                </div>

                                <div class="card-footer">
                                    <button type="button" onclick="performSave()" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


<script>
    function performSave(){
        axios.post('/dashboard/roles',{
            guard: document.getElementById('guard').value,
            name: document.getElementById('name').value,
        })
        .then(function (response){
            toastr.success(response.data.message);
        })
        .catch(function (error){
            toastr.error(error.response.data.message);
        })
    }
</script>

