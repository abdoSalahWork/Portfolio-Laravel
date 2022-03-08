@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Education Details</h2>
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
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Add Education Data</h3>
        </div>
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
        <div class="card-body">
            <form method="POST" action="{{route('admin.histories.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Place</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($historyCategories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="status" value='1' type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        If this work is now available, click the box
                    </label>
                </div>
                <div class="card-footer">
                    <button type="addCate" class="btn btn-primary">add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('aPanel.asstes.footer')
