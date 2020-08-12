@extends('admin.admin')
@section('content')

<h1> Edit Post </h1>
        <form action="{{ route('post.update', [$post->id]) }}" method="post" enctype="mutlipart/form-data">
        <!-- CSRF Token -->
        @CSRF
        @method('put')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= $post->title?>" >
          </div>

          <div class="form-group">
          <label for="title">Sub Title</label>
            <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?= $post->subtitle?>" >
          </div>
          <div class="form-group">
          <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="<?= $post->slug?>" >
          </div>
              
            <!-- <div class="form-check">
              <input type="checkbox" class="form-check-input" name="stauts"  value="">
              <label class="form-check-label" for="exampleCheck1" >Publish</label>
             </div> -->
             <div class="form-group"> 
            <label for="name">Status</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-Publish" value="published" <?= $post->status == 'published'? 'checked' : '' ?>>
              <label class="form-check-label" for="status-Publish">
                Published
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-draft" value="dreft" <?= $post->status == 'draft'? 'checked' : '' ?> >
              <label class="form-check-label" for="status-draft">
                Draft
              </label>
            </div>
            
             <div class="select"    style=" margin-top: 16px;">
             <div class="form-g" style="margin-right: 55%">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible"name="tags[]"  multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                  <?php foreach (App\tag::all() as $tag): ?>
                  <option value="<?= $tag->id?>"> <?= $tag->name?> </option>
                  <?php endforeach ?>
                  </select>
                </div>
    
                <div class="form-g1" style="margin-left: 57%; margin-top: -119px">
                  <label>Select Category</label>
                  <select class="select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                  <?php foreach (App\Category::all() as $category): ?>
                  <option value="<?= $category->id?>"> <?= $category->name?> </option>
                  <?php endforeach ?>
                  </select>
                </div>
              </div>
            <div class="card-header">
              <h3 class="card-title"> Post </h3>
            </div>
            <!-- <div class="card-body pad">
                <div class="mb-3">
                  <textarea name="content" class="textarea"  placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" > {{ $post->content}} </textarea>
                            <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>           
                </div> 
            </div> -->
            <div>
            <textarea class="textarea" id="content" name="content"> {{ $post->content}} </textarea>

          <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>   
         <script>
            CKEDITOR.replace( 'content' );
            </script>
          </div>
          <div class="form-group">
          <label for="image">Image</label>
            <div class="d-flex">
            <input type="file"  name="image" id="image" >
            @if($post->image)
            <img src="{{ asset($post->image)}}" height="150">
            @endif
            </div>
            </div>
          <button type="submit" class="btn btn-primary"> Update </button>
          </form>
@endsection


