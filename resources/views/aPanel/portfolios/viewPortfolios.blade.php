@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">View Portfolios</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Portfolios</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
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
            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Portfolios list</h3>

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
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Img</th>
                                <th>Slug</th>
                                <th>Category Types</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>{{$portfolio->id}}</td>
                                <td>{{$portfolio->name}}</td>
                                <td>
                                    <img src="{{asset($portfolio->image)}}" width="45px" alt="">
                                </td>
                                <td>{{$portfolio->slug}}</td>
                                <td>
                                    <a href="{{route('admin.portfolio.itemCategories',[$portfolio->id])}}">
                                        <i class="fas fa-sign-in-alt fa-2x text-success"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#editEmployeeModal{{$portfolio->id}}" class="edit" data-toggle="modal" title="Edit">
                                        <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                                    </a>

                                    <a href="#deleteEmployeeModal{{$portfolio->id}}" class="delete ml-2" data-toggle="modal">
                                        <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                                    </a>
                                </td>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal{{$portfolio->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('admin.portfolio.update',[$portfolio->id])}}" method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Portfolio Info</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name" value="{{$portfolio->name}}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <!-- form-control-file -->

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Slug</label>
                                                                <input type="text" name="slug" value="{{$portfolio->slug}}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Img</label>
                                                                <input type="file" name="image" class="form-control-file">
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
                                <div id="deleteEmployeeModal{{$portfolio->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('admin.portfolio.delete',[$portfolio->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Category</h4>
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
