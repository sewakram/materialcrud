@extends('layout.app')

@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Adding a material</h2>
</div>
<br/>
</div>
</div>
   
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
    <div class="col-lg-3"></div>
    <div class="col-lg-6 d-flex justify-content-center">
<form action="{{ route('materials.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <select class="form-control" name="category_id">

                @if ($categories->count())

                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>    
                @endforeach
                @endif

                </select>

            </div>
            <div class="form-group">
                <strong>Material Name:</strong>
                <input type="text" name="mat_name" class="form-control" placeholder="Material Name">
            </div>
            <div class="form-group">
                <strong>Opening Balance:</strong>
                <input type="text" name="open_balance" class="form-control" placeholder="Opening Balance">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
<div class="col-lg-3"></div>
</div>
@stop
