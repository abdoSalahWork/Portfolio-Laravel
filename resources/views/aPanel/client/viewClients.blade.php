@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Clinets Section</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Clinets</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{$error}}
        @endforeach
    </div>
    @endif

    @if (Session::has('done'))
    <div class="alert alert-success">
        {{Session::get('done')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Clinets list</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->title}}</td>
                                <td>
                                    <img src="{{asset($client->image)}}" width="45px" alt="">
                                </td>
                                <td><span class="text-wrap">{{$client->discription}}</span></td>
                                <td>
                                    <a href="#editEmployeeModal{{$client->id}}" class="edit" data-toggle="modal" title="Edit">
                                        <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                                    </a>
                                    <a href="#deleteEmployeeModal{{$client->id}}" class="delete ml-2" data-toggle="modal">
                                        <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                                    </a>
                                </td>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal{{$client->id}}" class="modal fade">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('admin.client.update',[$client->id])}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update client Info</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control" name="name" value="{{$client->name}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" class="form-control" name="title" value="{{$client->title}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="image">Image</label>
                                                                <input type="file" name="image" value="{{$client->image}}" class="form-control" id="image">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea class="form-control" rows="3" name="discription" placeholder="Enter ...">{{$client->discription}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" class="btn btn-info" value="update">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteEmployeeModal{{$client->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('admin.client.delete',[$client->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Clint</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete these Records?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" class="btn btn-danger" value="Delete">
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
    </div>
</div>
@include('aPanel.asstes.footer')
