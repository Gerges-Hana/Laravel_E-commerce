<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequests;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Nette\Utils\Image;
use Image;
// use ImageUpload\ImageUpload;
use App\Utils\ImageUpload;

class SettingController extends Controller
{
    //

    public function index()
    {

        return view('dashboard.settings.index');
    }

    public function update(SettingUpdateRequests $request, $settig)
    {
        // dd($request->all());

        Setting::where('id', $settig)->update($request->validated());

        if ($request->logo) {
           $logo= ImageUpload::uploadImage($request->logo, 100, 200, 'logo/');
            Setting::where('id', $settig)->update(['logo' => $logo]);
        }


        if ($request->favicon) {
           $favicon= ImageUpload::uploadImage($request->favicon, 32, 32, 'favicon/');
            Setting::where('id', $settig)->update(['favicon' => $favicon]);
        }




        // $imagename = date('Y-m-d') . '.' . $request->logo->extension();
        // $logo = Image::make($request->logo->path());
        // $logo->fit(200, 200, function ($constraint) {
        //     $constraint->upsize();
        // })->stream();
        // Storage::disk('public')->put($imagename, $logo);
        // Setting::where('id', $settig)->update(['logo' => 'public/' . $imagename]);

        // this is another way to upload image
        // $logoName = time().'.'.$request->logo->extension();

        // $request->logo->storeAs('public/logos', $logoName);

        // $faveiconsName = time().'.'.$request->faveicons->extension();

        // $request->faveicons->storeAs('public/faveiconss', $faveiconsName);


        return redirect()->route('dashboard.settings.index')->with('succes', 'تم تحديث الاعدادات بنجاح');

        // dd($settig);
    }
}
