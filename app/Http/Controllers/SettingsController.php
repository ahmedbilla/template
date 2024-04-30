<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::orderBy('created_at', 'desc')->get();
        return Inertia::render('Admin/Settings/General', ['settings' => $settings]);
    }

    public function store(Request $request){
    
   
    }

    public function update(Request $request, Settings $settings){
       dd($request->storeLogo);
       $settingEd = Settings::find($request->input('id'));
       //$settingEd->settings = $request->address;
       $settingEd->update();
    }
}
