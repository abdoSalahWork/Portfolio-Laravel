@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Education Section</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Education</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category list</h3>

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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Year</th>
                                <th>University</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history )
                            <tr>
                                <td >{{$history->id}}</td>
                                <td  width="20px" >{{$history->name}}</td>
                                <td>{{$history->category->name}}</td>
                                <td>{{$history->year}}</td>
                                <td>{{$history->slug}}</td>
                                <td><span class="text-wrap">{{$history->description}}</span></td>
                                <td>
                                    <a href="#editEmployeeModal{{$history->id}}" class="edit" data-toggle="modal" title="Edit">
                                        <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                                    </a>

                                    <a href="#deleteEmployeeModal{{$history->id}}" class="delete ml-2" data-toggle="modal">
                                        <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                                    </a>
                                </td>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal{{$history->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('admin.histories.update',[$history->id])}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Education Info</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="name" value="{{$history->name}}" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" name="year" value="{{$history->year}}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Place</label>
                                                                <input type="text" name="slug" value="{{$history->slug}}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="category_id">Category</label>
                                                                <select class="form-control" name="category_id" id="category_id">
                                                                    <option selected value="{{$history->category->id}}">{{$history->category->name}}</option>
                                                                    @foreach ($historyCategories as $category)
                                                                    @if ($history->category->id != $category->id)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ...">{{$history->description}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-check col-12">
                                                            <input class="form-check-input" name="status" value='1' type="checkbox" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                If this work is now available, click the box
                                                            </label>
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
                                <div id="deleteEmployeeModal{{$history->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('admin.histories.delete',$history->id)}}">
                                            @csrf
                                            @method('DELETE')
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
