@extends('admin.admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Title</h3>
              </div>
              <form role="form" action="{{route('category.store')}}" method="post">
              @CSRF
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Title</label>
                    <input type="text" class="form-control" id="name"  name="name" >
                         @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                    </div>
                    <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" class="form-control" id="slug"  name="slug" >
                         @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
@endsection
