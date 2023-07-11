@extends('layout.app')

@section('content')
    <div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Inward Outward List</h2>
</div>
<br/>
</div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="{{ route('inward-outward.create') }}" class="btn btn-success">Add Inward Outward</a>
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
            <th>Date</th>
            <th>Inward-outward Qty.</th>
            <th>Current balance</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach ($in_outs as $mat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mat->cat_name }}</td>
            <td>{{ $mat->mat_name }}</td>
            <td>{{ $mat->entry_date }}</td>
            <td>{{ $mat->in_out_qty }}</td>
            <td>{{ (int)$mat->open_balance+((int)$mat->in_out_qty) }}</td>
            <td>
                <form action="{{ route('inward-outward.destroy',$mat->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('inward-outward.edit',$mat->id) }}">Edit</a>
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
