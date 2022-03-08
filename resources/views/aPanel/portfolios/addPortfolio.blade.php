@include('aPanel.asstes.header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Portfolios</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Portfolios</li>
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
    <div class="card card-success">
        <div class="card-header bg-dark">
            <h3 class="card-title">Add Portfolio Data</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.portfolio.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imgUpdate">Img</label><br>
                            <input type="file" name="image"  id="imgUpdate">
                        </div>
                    </div>
                    <div class="card-footer col-md-6">
                        <div class="form-group">
                            <button  class="btn btn-primary col-12">Add</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
@include('aPanel.asstes.footer')
