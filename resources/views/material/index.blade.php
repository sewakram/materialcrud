@extends('layout.app')

@section('content')
    <div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Materials</h2>
</div>
<br/>
</div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="{{ route('materials.create') }}" class="btn btn-success">Add Material</a>
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
        <table class="table table-bordered" id="materials">
        <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Material Name</th>
            <th>Opening Balance</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($materials as $mat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mat->cat_name }}</td>
            <td>{{ $mat->open_balance }}</td>
            <td>{{ $mat->cat_name }}</td>
            <td>
                <form action="{{ route('materials.destroy',$mat->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('materials.edit',$mat->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table></br>
  
    </div>
</div>
@stop
