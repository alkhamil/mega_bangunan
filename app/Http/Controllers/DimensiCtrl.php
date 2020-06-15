<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Dimension;

class DimensiCtrl extends Controller
{
    public function index()
    {
        $dimensions = Dimension::all();
        return view('dimensi.index', compact('dimensions'));
    }

    public function tambah(Request $request)
    {
        $dimension = new Dimension;
        $dimension->code = Str::upper($request->code);
        $dimension->name = $request->name;
        $dimension->description = $request->description;
        $dimension->save();
        return redirect('dimensi')->with('msg', 'Data dimensi berhasil dibuat!');
    }
}
