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

    public function edit(Request $request)
    {
        $dimension = Dimension::where('id', $request->dimension_id)->first();
        if ($dimension) {
            $dimension->code = Str::upper($request->code);
            $dimension->name = $request->name;
            $dimension->description = $request->description;
            $dimension->save();
            return redirect('dimensi')->with('msg', 'Data dimensi berhasil diedit!');
        }
    }

    public function hapus(Request $request, $id)
    {
        $dimension = Dimension::where('id', $id)->first();
        if ($dimension) {
            foreach ($dimension->criteria as $c) {
                $c->delete();
            }
            $dimension->delete();
            return redirect('dimensi')->with('msg', 'Data dimensi berhasil dihapus!');
        }
    }
}

