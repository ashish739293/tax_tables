<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use Log;
class ServiceController extends Controller
{
    // Display a listing of the services
    public function index()
    {
        $services = Service::all(); // Get all services
        return response()->json($services); // Return the services as JSON (for AJAX)
    }

    // Store a newly created service in the database
    public function store(Request $request)
    {

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // If validation fails, return an error message
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        // Handle the image upload
        $imagePath = $request->file('image')->store('services', 'public');

        // Create a new service record
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        // Return a success response with the created service
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'service' => $service
        ], 201);
    }

    // Show the details of a specific service
    public function show($id)
    {
        $service = Service::findOrFail($id); // Find service by ID
        return response()->json($service); // Return service as JSON (useful for AJAX)
    }

    // Show the form for editing the specified service
    public function edit($id)
    {
        $service = Service::findOrFail($id); // Find service by ID
        return response()->json($service); // Return service details for the edit form
    }

    // Update the specified service in the database
    public function update(Request $request, $id)
    {


        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // If validation fails, return an error message
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        // Find the service to update
        $service = Service::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (Storage::exists('public/' . $service->image)) {
                Storage::delete('public/' . $service->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        // Update the service details
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        // Return a success response with the updated service
        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully',
            'service' => $service
        ], 200);
    }

    // Remove the specified service from the database
    public function destroy($id)
    {
        // Find the service to delete
        $service = Service::findOrFail($id);

        // Delete the image file from storage
        if (Storage::exists('public/' . $service->image)) {
            Storage::delete('public/' . $service->image);
        }

        // Delete the service record from the database
        $service->delete();

        // Return a success response indicating that the service was deleted
        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully'
        ], 200);
    }
}
