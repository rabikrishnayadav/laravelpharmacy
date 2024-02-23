<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinesModel extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    static public function getAllRecord(){
        return self::where('is_deleted', '=', 0)->get();
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
