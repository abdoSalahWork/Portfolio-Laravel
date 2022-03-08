@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Service</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Service</li>
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
            <h3 class="card-title">Add Experince Data</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
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
                            <label for="icon">Icon Class Font Awsome</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
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
