<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchasesModel;
use App\Models\SuppliersModel;
use App\Models\InvoicesModel;

class PurchasesController extends Controller
{
	public function purchases(){
		$data['getRecord'] = PurchasesModel::getAllRecord();
		return view('admin.purchases.list',$data);
	}

	public function add_purchases()
	{
		$data['getSuppliers'] = SuppliersModel::getAllRecord();
		$data['getInvoices'] = InvoicesModel::getAllRecord();
		return view('admin.purchases.add', $data);
	}

	public function save_purchases(Request $request)
	{
		$data = new PurchasesModel;
		$data->suppliers_id = trim($request->suppliers_id);
		$data->invoices_id = trim($request->invoices_id);
		$data->voucher_number = trim($request->voucher_number);
		$data->purchase_date = trim($request->purchase_date);
		$data->total_amount = trim($request->total_amount);
		$data->payment_status = trim($request->payment_status);
		$data->save();

		return redirect('admin/purchases')->with('success','Purchase successfully added');
	}

	public function edit_purchases($id){
		$data['getSuppliers'] = SuppliersModel::getAllRecord();
		$data['getInvoices'] = InvoicesModel::getAllRecord();
		$data['oldRecord'] = PurchasesModel::getSingle($id);
		return view('admin.purchases.edit', $data);
	}

	public function update_purchases($id, Request $request)
	{
		$data = PurchasesModel::getSingle($id);
		$data->suppliers_id = trim($request->suppliers_id);
		$data->invoices_id = trim($request->invoices_id);
		$data->voucher_number = trim($request->voucher_number);
		$data->purchase_date = trim($request->purchase_date);
		$data->total_amount = trim($request->total_amount);
		$data->payment_status = trim($request->payment_status);
		$data->save();

		return redirect('admin/purchases')->with('success','Purchase successfully Updated');
	}

	public function delete_purchases($id)
	{
		$data = PurchasesModel::getSingle($id);
		$data->delete();

		return redirect()->back()->with('error', 'purchases successfully deleted');
	}
}