@extends('admin.admin')
@section('content')
<div class="container">

    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Title</h3>
              </div>
              <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
              @CSRF
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title"  name="title" >
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="subtitle">Post Subtitle</label>
                    <input type="text" class="form-control" id="subtitle"  name="subtitle" >
                    @error('subtitle')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control" id="slug"  name="slug" >
                    @error('slug')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="stauts"  value="1">
                    <label class="form-check-label" for="exampleCheck1" >Publish</label>
                  </div>-->
                        <div class="form-group">
                  <label for="name">Status</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-Publish" value="published" checked>
                    <label class="form-check-label" for="status-Publish">
                      Published
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft">
                    <label class="form-check-label" for="status-draft">
                      Draft
                    </label>
                  </div>
                </div> 

            </div>

            <div class="select"    style=" margin-top: 16px;">
             <div class="form-g" style="margin-right: 55%">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
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
              <h3 class="card-title">
                    Post
              </h3>
            </div>
            <!-- <div class="card-body pad">
                <div class="mb-3">
                  <textarea name="content" class="textarea" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            @error('content')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                </div>

                <div> -->
                <div>
            <textarea class="textarea" id="content" name="content"></textarea>
            <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js">
            </script>
            <script>
            CKEDITOR.replace( 'content' );
            CKEditor.replace('content', { removePlugins : 'elementspath' });
            </script>
            <!-- <script>
                $(function(){
$(".textarea").wysihtml5();
                });
            </script> -->
          </div>
                
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="d-flex">
                   <input type="file"  name="image" id="image" >
                </div>
              </div>


      </div>
    </section>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

</div>

@endsection