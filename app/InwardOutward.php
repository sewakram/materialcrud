<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InwardOutward extends Model
{
	use SoftDeletes;
    protected $table = 'inward-outward';
    protected $fillable = ['category_id','mat_id','entry_date','in_out_qty'];
}
