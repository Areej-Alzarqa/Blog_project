@extends('admin.admin')
@section('content')

<h1> Edit Tag</h1>
        <form action="{{ route('category.update', [$categories->id]) }}" method="post">
        <!-- CSRF Token -->
        @CSRF
        @method('put')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $categories->name?>" >
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="<?= $categories->slug?>" >
          </div>
          <button type="submit" class="btn btn-primary"> Update </button>
          </form>

@endsection