<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterReading;

class MeterReadingController extends Controller
{
    public function index()
    {
        $readings = MeterReading::orderBy('hall_name')->get();
        return view('dashboard', compact('readings'));
    }

    public function table(Request $request)
    {
        $query = MeterReading::query();

        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('client_name', 'like', "%$search%")
                ->orWhere('hall_name', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%");
            });
        }

        $readings = $query->latest()->get();

        return view('table', compact('readings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hall_name' => 'required|string',
            'client_name' => 'required|string',
            'previous_meter' => 'integer',
            'current_meter' => 'integer',
            'total' => 'required|integer',
            'amount' => 'numeric',
            'notes' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        MeterReading::create($validated);

        return redirect()->back()->with('success', 'Reading successfully saved.');
    }
}
