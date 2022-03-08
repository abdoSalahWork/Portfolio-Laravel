@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Clint</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Clint</li>
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

    <div class="card card-success">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Add Clint Data</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.client.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="discription" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="addCate" class="btn btn-primary">add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('aPanel.asstes.footer')
