<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliersModel extends Model
{
	use HasFactory;

	protected $table = 'suppliers';

	static public function getSingle($id){
		return self::find($id);
	}

	static public function getAllRecord(){
		return self::get();
	}

}