<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
	use SoftDeletes;
    protected $table = 'material';
    protected $fillable = ['category_id','mat_name','open_balance'];
}
