@include('aPanel.asstes.header')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories List : {{$portfolioItem->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$portfolioItem->name}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="col-8 mx-auto card p-2 mb-3">
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
        <form method="post" action="{{route('admin.portfolio.itemCategory.store')}}">
            @csrf
            <div class="card card-danger p-3">
                <div class="card-body">
                    <div class="row justify-content-center py-2">
                        <!-- <label for="productCategory">category Name : </label> -->
                        <div class="col-md-6">
                            <select name="portfolioCategoryId" class="form-control" placeholder="dasdas" id="">
                                <option value="" disabled selected hidden>Please Choose...</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            <!-- <input type="text" name="name"  id="productCategory"> -->
                        </div>
                        <input type="hidden" name="portfolioItemId" value="{{$portfolioItem->id}}">
                        <button class="btn btn-info" name="skillAddSubmit">add Category</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="card-header">
            <h3 class="card-title">Categories List : {{$portfolioItem->name}}</h3>
        </div>
        <!-- /.card-header -->

        <div class=" card-body p-0">
            <!-- <div class="alert alert-success" role="alert">
                                </div> -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($portfolioItem->ItemCategories as $ItemCategory)
                    <tr>
                        <td>{{$ItemCategory->id}}</td>
                        <td>{{$ItemCategory->category->name}}</td>
                        <td style="width: 180px;">
                            <a href="#editEmployeeModal{{$ItemCategory->id}}" class="edit" data-toggle="modal" title="Edit">
                                <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#deleteEmployeeModal{{$ItemCategory->id}}" class="delete ml-2" data-toggle="modal">
                                <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                            </a>
                        </td>
                        <!-- Edit Modal HTML -->
                        <div id="editEmployeeModal{{$ItemCategory->id}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{route('admin.portfolio.itemCategory.update',[$ItemCategory->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Category Info</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <select name="portfolioCategoryId" class="form-control" placeholder="dasdas" id="">
                                                        <option value="{{$ItemCategory->category->id}}}" selected>{{$ItemCategory->category->name}}</option>
                                                        @foreach ($categories as $category)
                                                        @if ($category->id != $ItemCategory->category->id)
                                                        <option value="{{$category->id}}">
                                                            {{$category->name}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    <!-- <input type="text" name="name"  id="productCategory"> -->
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
                        <div id="deleteEmployeeModal{{$ItemCategory['id']}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{route('admin.portfolio.itemCategory.delete',[$ItemCategory->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Skill</h4>
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
