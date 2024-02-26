<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class PurchasesModel extends Model
{
	
	protected $table = 'purchases';

	static public function getAllRecord(){
		return self::get();
	}

	static public function getSingle($id)
	{
		return self::find($id);
	}

	public function getSuppliersName(){
		return $this->belongsTo(SuppliersModel::class,'suppliers_id');
	}
}