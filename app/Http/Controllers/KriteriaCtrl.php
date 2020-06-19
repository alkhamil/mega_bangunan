<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Dimension;
use App\Criteria;

class KriteriaCtrl extends Controller
{
    public function index()
    {
        $dimensions = Dimension::all();
        $criterias = Criteria::all();
        return view('kriteria.index', compact('dimensions', 'criterias'));
    }

    public function tambah(Request $request)
    {
        $criteria = new Criteria;
        $criteria->code = Str::upper($request->code);
        $criteria->content = $request->content;
        $criteria->dimension_id = $request->dimension_id;
        $criteria->save();
        return redirect('pernyataan')->with('msg', 'Data kriteria berhasil dibuat!');
    }

    public function edit(Request $request)
    {
        $criteria = Criteria::where('id', $request->criteria_id)->first();
        if ($criteria !== null) {
            $criteria->code = Str::upper($request->code);
            $criteria->content = $request->content;
            $criteria->dimension_id = $request->dimension_id;
            $criteria->save();
            return redirect('pernyataan')->with('msg', 'Data kriteria berhasil diedit!');
        }
    }

    public function hapus(Request $request, $id)
    {
        $criteria = Criteria::where('id', $id)->first();
        if ($criteria !== null) {
            $criteria->delete();
            return redirect('pernyataan')->with('msg', 'Data kriteria berhasil dihapus!');
        }
    }
}
