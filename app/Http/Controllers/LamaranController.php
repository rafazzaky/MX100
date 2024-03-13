<?php

namespace App\Http\Controllers;

use App\Http\Resources\LamaranDetailResource;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
{
    public function store(Request $request)
    {
        if ($request->user()->tokenCan('PEKERJA'))
        {
            $validated = $request->validate([
                'lowongan_id' => 'required',
                'cv' => 'mimes:doc,docx,pdf'
            ]);

            $userName = Auth::user()->name;
            $cv = $request->file('cv');

            $cvName = $userName . '-' . time() . '.' . $cv->getClientOriginalExtension();

            $cv->move(storage_path('cv'), $cvName);
            $cvPath = storage_path('cv/' . $cvName);

            $lamaran = new Lamaran();
            $lamaran->user_id = Auth::id();
            $lamaran->lowongan_id = $request->lowongan_id;
            $lamaran->cv = $cvPath;
            $lamaran->save();

            return new LamaranDetailResource($lamaran->load('pelamar', 'lowongan'));
        }

    }
    public function showbylowongan($id)
    {
        $authenticatedUserId = Auth::id();
        $lowongan = Lowongan::find($id);
        if($authenticatedUserId == $lowongan->author)
        {
            $lamaran = Lamaran::where('lowongan_id', $id)
            ->with('pelamar:id,name')
            ->get();
            return response()->json(['data' => $lamaran]);
        }
        return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    }
    
}
