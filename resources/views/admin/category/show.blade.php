@extends('admin.admin')
@section('content')
@if(session()->has('alert.success'))
<div class="alert alert-success">
{{session('alert.success')}}
</div>
@endif
        <h1 class="h3 mb-4 text-gray-800" >categories</h1>
        <a href="{{route('category.create')}}" class=" btn btn-primary"> Creat New </a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($entries as $category) : ?>
                <tr>
                    <td> {{ $category->id }}  </td>
                    <td> {{ $category->name }}</td>
                    <td> {{ $category->slug }}</td>
                    <td> <a href="{{ route('category.edit', [$category->id])}}" class=" btn btn-static" style="background:#6d6d88; color: white"> Edit </a> </td>
                    <td>  <form action="{{ route('category.destroy', [$category->id])}}" method="post" >
                         @method('delete')
                         @CSRF
                         <button type="submit" class=" btn btn-danger"> Delete </button>
                         </form>
                </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>
@endsection