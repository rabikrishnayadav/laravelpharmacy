<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinesModel;
use App\Models\MedicinesStockModel;

class MedicinesController extends Controller
{
    public function medicines(){
        $data['getRecord'] = MedicinesModel::getAllRecord();
        $data['meta_title'] = 'Medicines';
        return view('admin.medicines.list',$data);
    }

    public function add_medicine(){
        $data['meta_title'] = 'Add Medicines';
        return view('admin.medicines.add',$data);
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
        $data['meta_title'] = 'Edit Medicines';
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

    public function medicines_stock_list()
    {
        $data['getRecord'] = MedicinesStockModel::get();
        $data['meta_title'] = 'Medicines Stock';
        return view('admin.medicines.stock.list',$data);
    }

    public function medicines_stock_add()
    {
        $data['getRecord'] = MedicinesModel::where('is_deleted', '=', 0)->get();
        $data['meta_title'] = 'Add Medicines Stock';
        return view('admin.medicines.stock.add', $data);
    }

    public function medicines_stock_store(Request $request)
    {
        $save = new MedicinesStockModel;

        $save->medicines_id = $request->medicines_id;
        $save->batch_id = trim($request->batch_id);
        $save->expiry_date = trim($request->expiry_date);
        $save->quantity = trim($request->quantity);
        $save->mrp = trim($request->mrp);
        $save->rate = trim($request->rate);
        $save->save();

        return redirect('admin/medicines_stock')->with('success', 'Medicine Stock successfully added');
    }

    public function edit_medicines_stock($id)
    {
        $data['oldRecord'] = MedicinesStockModel::getSingle($id);
        $data['getRecord'] = MedicinesModel::where('is_deleted', '=', 0)->get();
        $data['meta_title'] = 'Edit Medicines Stock';
        return view('admin.medicines.stock.edit', $data);
    }

    public function update_medicines_stock($id, Request $request)
    {
        $save = MedicinesStockModel::getSingle($id);

        $save->medicines_id = $request->medicines_id;
        $save->batch_id = trim($request->batch_id);
        $save->expiry_date = trim($request->expiry_date);
        $save->quantity = trim($request->quantity);
        $save->mrp = trim($request->mrp);
        $save->rate = trim($request->rate);
        $save->save();

        return redirect('admin/medicines_stock')->with('success', 'Medicine Stock successfully updated');
    }

    public function delete_medicines_stock($id)
    {
        $delete_record = MedicinesStockModel::getSingle($id);
        $delete_record->delete();
        return redirect()->back()->with('error', 'medicine stock successfully deleted');
    }

}
