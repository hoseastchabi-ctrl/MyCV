<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        return Resume::where('user_id', $request->user()->id)->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'data' => 'nullable|array',
        ]);

        $resume = Resume::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'data' => $request->data ?? [],
        ]);

        return response()->json($resume, 201);
    }

    public function show(Request $request, $id)
    {
        return Resume::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail();
    }

    public function destroy(Request $request, $id)
    {
        $resume = Resume::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        $resume->delete();

        return response()->json([
            'message' => 'CV supprimé avec succès'
        ]);
    }
}