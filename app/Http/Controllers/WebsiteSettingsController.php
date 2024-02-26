<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteSettingsModel;
use Str;

class WebsiteSettingsController extends Controller
{
    public function settings(){
        $data['getRecord'] = WebsiteSettingsModel::find(1);
        $data['meta_title'] = 'Website Settings';
        return view('admin.website_settings.update', $data);
    }

    public function website_update(Request $request)
    {
        $data = WebsiteSettingsModel::find(1);

        $data->website_name = trim($request->website_name);

        if (!empty($request->file('logo'))) {
            if (!empty($data->logo) && file_exists('upload/logo/'.$data->logo)) {
                unlink('upload/logo/'.$data->logo);
            }

            $file = $request->file('logo');
            $randomStr = Str::random(10);
            $filename = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/logo/', $filename);
            $data->logo = $filename;
        }
        $data->save();
        return redirect('admin/settings')->with('success', 'settings successfully updated');
    }
}
