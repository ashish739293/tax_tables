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
    
    public function index()
    {
        return view('admin.appointments.index');
    }

    public function fetchAppointments()
    {
        try {
            $appointments = Appointment::select(['id', 'name', 'email', 'phone', 'service', 'time_slot', 'status', 'message'])->get();
    
            return response()->json([
                'success' => true,
                'data' => $appointments
            ], 200);
        } catch (\Exception $e) {
            \Log::error("Error fetching appointments: " . $e->getMessage()); // Log error for debugging
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch appointments. Please try again later.'
            ], 500);
        }
    }
    
    

    public function updateStatus($id, $status)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $status;
        $appointment->save();

        return response()->json(['success' => true, 'message' => 'Appointment status updated.']);
    }


}
