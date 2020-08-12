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
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title"  name="title" >
                  </div>

                  <div class="form-group">
                    <label for="subtitle">Post Subtitle</label>
                    <input type="text" class="form-control" id="subtitle"  name="subtitle" >
                  </div>
                  
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="stauts">
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                  </div>
                </div>

              </form>
            </div>
            <div class="card-header">
              <h3 class="card-title">
                    Post
              </h3>
            </div>
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
            <div class="form-group">
                    <label for="image">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      
                    </div>
            </div>
        </div>
      </div>
    </section>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
</div>

@endsection