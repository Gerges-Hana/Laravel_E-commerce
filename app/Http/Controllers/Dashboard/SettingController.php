<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequests;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Nette\Utils\Image;
use Image;

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
        // $imagename = date('Y-m-d') . '.' . $request->logo->extension();
        // $logo = Image::make($request->logo->path());
        // $logo->fit(200, 200, function ($constraint) {
        //     $constraint->upsize();
        // })->stream();
        // Storage::disk('public')->put($imagename, $logo);
        // Setting::where('id', $settig)->update(['logo' => 'public/' . $imagename]);


        $logoName = time().'.'.$request->logo->extension();

        $request->logo->storeAs('public/logos', $logoName);

        $logoName = time().'.'.$request->logo->extension();

        $request->logo->storeAs('public/logos', $logoName);


        return redirect()->route('dashboard.settings.index')->with('succes', 'تم تحديث الاعدادات بنجاح');

        // dd($settig);
    }
}
