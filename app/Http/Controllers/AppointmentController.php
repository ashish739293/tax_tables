<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'service' => 'required|string',
            'time_slot' => 'required|string',
            'message' => 'nullable|string'
        ]);

        try {
            Appointment::create($request->all());
            return response()->json(['success' => 'Appointment booked successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to book appointment'], 500);
        }
    }
}
