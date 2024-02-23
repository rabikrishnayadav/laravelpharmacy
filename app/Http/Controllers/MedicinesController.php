<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinesModel;

class MedicinesController extends Controller
{
    public function medicines(){
        $data['getRecord'] = MedicinesModel::getAllRecord();
        return view('admin.medicines.list',$data);
    }

    public function add_medicine(){
        return view('admin.medicines.add');
    }

    public function insert_add_medicine(Request $request){
    
        $saveUpdate = new MedicinesModel;        
        $saveUpdate->name = trim($request->name);
        $saveUpdate->packing = trim($request->packing);
        $saveUpdate->generic_name = trim($request->generic_name);
        $saveUpdate->supplier_name = trim($request->supplier_name);
        $saveUpdate->save();

        return redirect('admin/medicines')->with('success','Medicine successfully add');
    }

    public function edit_medicine($id){
        $data['getRecord'] = MedicinesModel::getSingle($id);
        return view('admin.medicines.edit', $data);
    }

    public function update_medicine($id = '', Request $request){
        
        if (!empty($id)) {
            $saveUpdate = MedicinesModel::getSingle($id);
        }else{
            $saveUpdate = new MedicinesModel;
        }
        
        $saveUpdate->name = trim($request->name);
        $saveUpdate->packing = trim($request->packing);
        $saveUpdate->generic_name = trim($request->generic_name);
        $saveUpdate->supplier_name = trim($request->supplier_name);
        $saveUpdate->save();

        return redirect('admin/medicines')->with('success','Medicine successfully updated');
    }

    public function delete_medicine($id){
        $delete_record = MedicinesModel::getSingle($id);
        $delete_record->is_deleted = 1;
        $delete_record->save();
        return redirect('admin/medicines')->with('error', 'medicine successfully deleted');
    }


}
