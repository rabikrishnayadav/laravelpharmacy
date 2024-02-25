<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomersModel;

class InvoicesModel extends Model
{
	use HasFactory;

	protected $table = 'invoices';

	static public function getAllRecord(){
		return self::get();
	}

	static public function getSingle($id){
		return self::find($id);
	}

	public function getCustomerName(){
		return $this->belongsTo(CustomersModel::class, 'customers_id');
	}
}