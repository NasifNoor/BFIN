<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'id';
	public $timestamps = false;
}
