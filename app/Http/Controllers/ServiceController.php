<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

class ServiceController extends Controller
{
    // Display a listing of the services
    public function index()
    {
        $services = Service::all()->map(function ($service) {
            $service->features = json_decode($service->features, true); // Convert JSON to array
            return $service;
        });

        return response()->json($services);
    }

    // Store a newly created service in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'nullable|array', // Validate features as an array
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

        // Convert features array to JSON
        $featuresJson = $request->has('features') ? json_encode($request->features) : null;

        // Create a new service record
        $service = Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'features' => $featuresJson
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'service' => $service
        ], 201);
    }

    // Show the details of a specific service
    public function show($id)
    {
        $service = Service::findOrFail($id);
        $service->features = json_decode($service->features, true); // Convert JSON to array
        return response()->json($service);
    }

    // Show the form for editing the specified service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $service->features = json_decode($service->features, true); // Convert JSON to array
        return response()->json($service);
    }

    // Show all services names
    public function getServicesList()
    {
        $services = Service::all(['id', 'name']); // Fetch only id & name
        return response()->json($services);
    }

    // Show all services
    public function getServices()
    {
        $services = Service::all(); // Fetch all services
        return response()->json($services);
    }

    // Update the specified service in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'nullable|array', // Validate features as an array
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

        // Convert features array to JSON
        $featuresJson = $request->has('features') ? json_encode($request->features) : $service->features;

        // Update the service details
        $service->name = $request->name;
        $service->price = $request->price;
        $service->features = $featuresJson;
        $service->save();

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

        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully'
        ], 200);
    }
}
