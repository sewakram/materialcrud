@extends('layout.app')

@section('content')
    <div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Categories</h2>
</div>
<br/>
</div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="{{ route('categories.create') }}" class="btn btn-success">Add Categories</a>
</div>
</div>
</div>
<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p id="msg">{{ $message }}</p>
</div>
@endif
    
<div class="row">
<div class="col-lg-12">
@if ($errors->any())
<div class="alert alert-danger">
There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
</div>
</div>

<div class="row">
    
    <div class="col-lg-12 d-flex justify-content-center">
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $cat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $cat->cat_name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$cat->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('categories.edit',$cat->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table></br>
  
    </div>
    <div class="col-lg-12">{!! $categories->links() !!}</div>

</div>
@stop
