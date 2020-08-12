@extends('user.app')
@section('img', asset('user/img/home-bg.jpg'))
@section('title', 'Read It')
@section('subHeading', 'This A Blogs')
@section('content')

 <!-- Main Content -->
 <div class="container">
  <div class="row">
          <div class="col-md-12">
            <div class="case">
                <?php foreach ($posts as $post): ?>
              <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                       <img src="{{ Storage::url($post->image) }}" class="img w-100 mb-3 mb-md-0" > 
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                      <div class="text w-100 pl-md-3">
                        <h2><a href="{{ route('post', $post->id) }}"> {{$post->title}} 
                          <h3 class="post-subtitle">
                          {{$post->subtitle}}
                          </h3> 
                        </a>
                        </h2>
                        <div class="meta">
                          <p ><a > {{$post->created_at->format('Y-m-d')   }}</a></p>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php endforeach ?>
          <!-- Pager -->
          {{$posts->links()}}
      </div>
  </div>
  <hr>
@endsection
