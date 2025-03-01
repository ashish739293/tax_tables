<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeSource; // Import the model

class IncomeSourceController extends Controller
{
    public function index()
    {
        return response()->json(IncomeSource::all());
    }
}
