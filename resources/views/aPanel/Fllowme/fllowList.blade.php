@include('aPanel.asstes.header')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Fllow Me</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.html">Home</a></li>
                    <li class="breadcrumb-item active">Fllow Me</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="col-10 mx-auto card p-2 mb-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
        </div>
        @endif
        @if (Session::has('done'))
        <div class="alert alert-success">
            {{Session::get('done')}}
        </div>
        @endif
        <form method="post" action="{{route('admin.fllow.store')}}">
            @csrf
            <div class="card card-danger p-1">
                <div class="card-body">
                    <div class="row justify-content-end  py-2">
                        <div class="col-6">
                            <label for="name">Name : </label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>

                        <div class="col-6">
                            <label for="url">LinkUrl : </label>
                            <input type="texr=t" name="url" class="form-control" id="url">
                        </div>
                        <button class="btn btn-info m-2 " name="skillAddSubmit">add Fllow</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="card-header">
            <h3 class="card-title">Fllows Full List</h3>
        </div>
        <!-- /.card-header -->

        <div class=" card-body p-0">
            <!-- <div class="alert alert-success" role="alert">
                                </div> -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>LinkUrl</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($fllows as $fllow)
                    <tr>
                        <td>{{$fllow['id']}}</td>
                        <td>{{$fllow['name']}}</td>
                        <td>{{$fllow['url']}}</td>
                        <td style="width: 180px;">
                            <a href="#editEmployeeModal{{$fllow['id']}}" class="edit" data-toggle="modal" title="Edit">
                                <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#deleteEmployeeModal{{$fllow['id']}}" class="delete ml-2" data-toggle="modal">
                                <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                            </a>
                        </td>
                        <!-- Edit Modal HTML -->
                        <div id="editEmployeeModal{{$fllow['id']}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{route('admin.fllow.update',[$fllow->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Fllow Info</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{$fllow['name']}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>LinkUrl</label>
                                                        <input type="text" name="url" class="form-control" value="{{$fllow['url']}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" name="updateSkillSubmit" class="btn btn-info" value="update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal HTML -->
                        <div id="deleteEmployeeModal{{$fllow['id']}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{route('admin.fllow.delete',[$fllow->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Fllow</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete these Records?</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" name="deleteSkillSubmit" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('aPanel.asstes.footer')
