@extends('admin.admin')
@section('content')
@if(session()->has('alert.success'))
<div class="alert alert-success">
{{session('alert.success')}}
</div>
@endif
        <h1 class="h3 mb-4 text-gray-800" >Posts</h1>
        <a href="{{route('post.create')}}" class=" btn btn-primary"> Creat New Post </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Slug</th>
                    <!-- <th>Content</th> -->
                    <th>stauts </th>
                    <th>Creat At</th>
                    <th>Edit</th>
                    <th>Delelt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post) : ?>
                <tr>
                    <td> {{ $post->id }}  </td>
                    <td> {{ $post->title }}</td>
                    <td> {{ $post->subtitle }}  </td>
                    <td> {{ $post->slug }}  </td>
                    <!-- <td> {{ $post->content }}</td> -->
                    <td> {{ $post->status }}</td>
                    <td> {{ $post->created_at }}</td>
                    <td> <a href="{{ route('post.edit', [$post->id])}}" class=" btn btn-static" style="background:#6d6d88; color: white"> Edit </a> </td>
                       <td>  <form action="{{ route('post.destroy', [$post->id])}}" method="post" >
                         @method('delete')
                         @CSRF
                         <button type="submit" class=" btn btn-danger"> Delete </button>
                         </form>
                     </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>
@endsection