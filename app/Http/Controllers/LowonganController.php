<?php

namespace App\Http\Controllers;

use App\Http\Resources\LowonganDetailResource;
use App\Http\Resources\LowonganResource;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('is_published', true)
                        ->with(['author' => function ($query) {
                            $query->select('id', 'name');
                        }])
                        ->get();
        return LowonganResource::collection($lowongan);
    }

    public function show($id)
    {
        $lowongan = Lowongan::where('is_published', true)
                        ->with('author:id,name')
                        ->findOrFail($id);
        return response()->json(['data' => $lowongan]);
    }

    public function showcompanyjobs($id)
    {
        $authenticatedUserId = Auth::id();

        if ($authenticatedUserId != $id) {
            $lowongan = Lowongan::where('author', $id)
                                ->where('is_published', true)
                                ->with(['author' => function ($query) {
                                    $query->select('id', 'name');
                                }])
                                ->get();
        } else {
            $lowongan = Lowongan::where('author', $id)
                                ->with(['author' => function ($query) {
                                    $query->select('id', 'name');
                                }])
                                ->get();
        }
            return LowonganResource::collection($lowongan);
    }

    public function store(Request $request)
    {
        if ($request->user()->tokenCan('PERUSAHAAN')) {
            $validated = $request->validate([
                'judul' => 'required|max:200',
                'deskripsi' => 'required'
            ]);

            $requestData = $request->all();
            $requestData['author'] = $request->user()->id;

            $lowongan = Lowongan::create($requestData);
            return new LowonganDetailResource($lowongan);
        }
        return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    }
}
