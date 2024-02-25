<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicinesModel;


class MedicinesStockModel extends Model
{
	use HasFactory;

	protected $table = 'medicines_stock';

	static public function getSingle($id){
        return self::find($id);
    }

    public function getMedicineName(){
    	return $this->belongsTo(MedicinesModel::class, 'medicines_id');
    }
}