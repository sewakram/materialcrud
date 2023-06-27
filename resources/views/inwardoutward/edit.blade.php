@extends('layout.app')

@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Updating inward-outward</h2>
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
    <form action="{{ route('inward-outward.update',$in_outs[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <select class="form-control" name="category_id">

                @if (count($categories))

                @foreach($categories as $cat)
                <option value="{{ $cat['id'] }}" {{$in_outs[0]->category_id==$cat['id']? 'selected=selected' : ''}}>{{ $cat['cat_name'] }}</option>    
                @endforeach
                @endif

                </select>

            </div>
            <div class="form-group">
                <strong>Material Name:</strong>
                <select class="form-control" name="mat_id">

                @if (count($materials))

                @foreach($materials as $mat)
                <option value="{{ $mat['id'] }}" {{$in_outs[0]->mat_id==$mat['id']? 'selected=selected' : ''}}>{{ $mat['mat_name'] }}</option>    
                @endforeach
                @endif

                </select>
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                <input type="text" name="entry_date" value="{{$in_outs[0]->entry_date}}" id="dob" class="form-control" placeholder="DD-MM-YYYY">
            </div>
            <div class="form-group">
                <strong>Material inward-outward quantity:</strong>
                <input type="text" name="in_out_qty" value="{{$in_outs[0]->in_out_qty}}" class="form-control" placeholder="Inward-outward quantity">
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
