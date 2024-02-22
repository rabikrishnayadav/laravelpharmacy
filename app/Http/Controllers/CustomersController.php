<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomersModel;

class CustomersController extends Controller
{
    public function customers(Request $request){

        // $data['getRecord'] = CustomersModel::get(); or
        $data['getRecord'] = CustomersModel::getAllRecord();

        return view('admin.customers.list', $data);
    }

    public function add_customer(Request $request)
    {
        return view('admin.customers.add');
    }

    public function insert_add_customer(Request $request)
    {
        $save = new CustomersModel;
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success', 'customer successfully created.');
    }

    public function edit_customer($id, Request $request){
        // $data['getRecord'] = CustomersModel::find($id); or
        $data['getRecord'] = CustomersModel::getSingle($id);

        return view('admin.customers.edit', $data);
    }

    public function update_customer($id, Request $request){

        $save = CustomersModel::find($id);
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success', 'customer successfully updated.');
    }

    public function delete_customer($id){
        // $delete_record = CustomersModel::find($id);  or
        $delete_record = CustomersModel::getSingle($id);

        $delete_record->delete();
        return redirect('admin/customers')->with('error', 'customer successfully deleted');
    }
}
