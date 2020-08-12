@extends('user.app')
@section('img', Storage::url($post->image))
@section('title', $post->title)
@section('subHeading', $post->subtitle)

@section('content')
<article>
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">
          <h6> Created at: {{$post->created_at->diffForHumans()}} </h6>
          
               @foreach ($post->categories as $category)
                <small style="color: #007bff;
                      font-size: 20px;
                      background-color: rgba(98, 10, 158, 0.26);
                      margin-right: 10px"> 
                  {{ $category->name}}
                </small>
               @endforeach
         
               {!! htmlspecialchars_decode($post->content) !!}
                <!-- <h6> Tags </h6> -->
               @foreach ($post->tags as $tag)
            
                  <samll style= "text-transform: uppercase;
                          display: inline-block;
                          padding: 4px 10px;
                          margin-bottom: 7px;
                          margin-right: 4px;
                          border-radius: 4px;
                          color: #000000;
                          border: 1px solid #ccc;
                          font-size: 11px;"> 
                       # {{ $tag->name}}
                  </samll>
              @endforeach
        </div>

        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                <li style="   position: relative;
                              margin-bottom: 10px;
                              padding-bottom: 10px;
                              border-bottom: 1px solid #dee2e6;
                              list-style: none;
                              display: block;
                              color: #1a1a1a;">
                  @foreach ($post->categories as $category)
                    <small > 
                      {{ $category->name}}
                    </small>
                  @endforeach
                </li>
              </div>
            </div>
            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
                @foreach ($post->tags as $tag)
                <samll style= "text-transform: uppercase;
                              display: inline-block;
                              padding: 4px 10px;
                              margin-bottom: 7px;
                              margin-right: 4px;
                              border-radius: 4px;
                              color: #000000;
                              border: 1px solid #ccc;
                              font-size: 11px;"> 
                    # {{ $tag->name}}

                </samll>
              @endforeach
            </div>
          </div>
              <div>
                @comments(['model' => $post])
              </div>
     </div>
    </div>
  </article>
@endsection
