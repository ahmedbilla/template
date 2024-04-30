<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EDoc;
use Inertia\Inertia;

class EDocController extends Controller
{

    public function index(){
        $edocs = EDoc::orderBy('created_at', 'desc')->get();
        return Inertia::render('Admin/Settings/Edocs/Edocs', ['edocs' => $edocs]);
    }


    public function store(Request $request){
        EDoc::create($request->validate([
        'title' => ['required'],
        'header' => ['required'],
        'content' => ['required'],
        'footer' => ['required'],

        ]));
}
}
