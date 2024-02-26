<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
use App\Models\CustomersModel;
use App\Models\MedicinesModel;
use App\Models\MedicinesStockModel;
use App\Models\SuppliersModel;
use App\Models\InvoicesModel;
use App\Models\PurchasesModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['totalCustomer'] = CustomersModel::count();
        $data['totalMedicines'] = MedicinesModel::getAllRecord()->count();
        $data['totalMedicinesStock'] = MedicinesStockModel::count();
        $data['totalSuppliers'] = SuppliersModel::count();
        $data['totalInvoices'] = InvoicesModel::count();
        $data['totalPurchases'] = PurchasesModel::count();
        $data['meta_title'] = 'Dashboard';
        return view('admin.dashboard.list',$data);
    }

    public function my_account(Request $request)
    {   
        $data['getRecord'] = User::find(Auth::user()->id);
        $data['meta_title'] = 'My Account';
        return view('admin.my_account.update', $data);
    }

    public function my_account_update(Request $request)
    {
        $save = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);

        $save = User::find(Auth::user()->id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);

        if (!empty($request->file('profile_image'))) {
            if (!empty($save->profile_image) && file_exists('upload/profile/'.$save->profile_image)) {
                unlink('upload/profile/'.$save->profile_image);
            }

            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $save->profile_image = $filename;
        }

        if(!empty($request->password)){
            $save->password = Hash::make($request->password);
        }

        $save->save();

        return redirect()->back()->with('success', 'Account successfully updated');
    }
}
