@extends('admin.admin')
@section('content')
@if(session()->has('alert.success'))
<div class="alert alert-success">
{{session('alert.success')}}
</div>
@endif
        <h1 class="h3 mb-4 text-gray-800" >Tags</h1>
        <a href="{{route('tag.create')}}" class=" btn btn-primary"> Creat New </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Tag Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tags as $tag) : ?>
                <tr>
                    <td> {{ $tag->id }}  </td>
                    <td> {{ $tag->name }}</td>
                    <td> {{ $tag->slug }}</td>
                    <td> <a href="{{ route('tag.edit', [$tag->id])}}" class=" btn btn-static" style="background:#6d6d88; color: white"> Edit </a> </td>
                     
                    <td>  <form action="{{ route('tag.destroy', [$tag->id])}}" method="post" >
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