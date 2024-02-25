<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicesModel;
use App\Models\CustomersModel;

class InvoicesController extends Controller
{
	public function invoices(){
		$data['getRecord'] = InvoicesModel::getAllRecord();
		return view('admin.invoices.list', $data);
	}	

	public function add_invoice(){
		$data['getRecord'] = CustomersModel::get();
		return view('admin.invoices.add', $data);
	}

	public function save_invoice(Request $request){
		$data = new InvoicesModel;
		$data->net_total = trim($request->net_total);
		$data->invoices_date = trim($request->invoices_date);
		$data->customers_id = trim($request->customers_id);
		$data->total_amount = trim($request->total_amount);
		$data->total_discount = trim($request->total_discount);
		$data->save();

		return redirect('admin/invoices')->with('success','Invoice successfully added');
	}

	public function edit_invoice($id)
    {
    	$data['oldRecord'] = InvoicesModel::getSingle($id);
        $data['getRecord'] = CustomersModel::getAllRecord();
        return view('admin.invoices.edit', $data);
    }

    public function update_invoice($id, Request $request)
    {
        $data = InvoicesModel::getSingle($id);
        $data->net_total = trim($request->net_total);
		$data->invoices_date = trim($request->invoices_date);
		$data->customers_id = trim($request->customers_id);
		$data->total_amount = trim($request->total_amount);
		$data->total_discount = trim($request->total_discount);
        $data->save();

        return redirect('admin/invoices')->with('success', 'Invoice successfully updated');
    }

    public function delete_invoice($id)
    {
        $data = InvoicesModel::getSingle($id);
        $data->delete();

        return redirect()->back()->with('error', 'Invoice successfully deleted');
    }
}