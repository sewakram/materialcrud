@extends('layout.app')

@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Adding inward-outward</h2>
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
<form action="{{ route('inward-outward.store') }}" method="POST">
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
                <select class="form-control" name="mat_id">

                @if ($materials->count())

                @foreach($materials as $mat)
                <option value="{{ $mat->id }}">{{ $mat->mat_name }}</option>    
                @endforeach
                @endif

                </select>
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                <input type="text" name="entry_date" id="dob" class="form-control" placeholder="DD/MM/YYYY">
            </div>
            <div class="form-group">
                <strong>Material inward-outward quantity:</strong>
                <input type="text" name="in_out_qty" class="form-control" placeholder="Inward-outward quantity">
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
