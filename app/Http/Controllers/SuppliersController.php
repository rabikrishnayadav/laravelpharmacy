<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuppliersModel;

class SuppliersController extends Controller
{
    public function suppliers(){
        $data['getRecord'] = SuppliersModel::get();
        $data['meta_title'] = 'Suppliers';
        return view('admin.suppliers.list',$data);
    }

    public function add_supplier(){
        $data['meta_title'] = 'Add Suppliers';
        return view('admin.suppliers.add');
    }

    public function insert_add_supplier(Request $request){

        $data = new SuppliersModel;

        $data->suppliers_name = trim($request->suppliers_name);
        $data->suppliers_email = trim($request->suppliers_email);
        $data->contact_number = trim($request->contact_number);
        $data->address = trim($request->address);
        $data->save();

        return redirect('admin/suppliers')->with('success', 'Supplier successfully add');
    }

    public function edit_supplier($id)
    {
        $data['getRecord'] = SuppliersModel::getSingle($id);
        $data['meta_title'] = 'Edit Suppliers';
        return view('admin.suppliers.edit', $data);
    }

    public function update_supplier($id, Request $request)
    {
        $data = SuppliersModel::getSingle($id);

        $data->suppliers_name = trim($request->suppliers_name);
        $data->suppliers_email = trim($request->suppliers_email);
        $data->contact_number = trim($request->contact_number);
        $data->address = trim($request->address);
        $data->save();

        return redirect('admin/suppliers')->with('success', 'Supplier successfully updated');
    }

    public function delete_supplier($id)
    {
        $data = SuppliersModel::getSingle($id);
        $data->delete();

        return redirect()->back()->with('error', 'Supplier successfully deleted');
    }
}
