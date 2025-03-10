<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeSubmission;
use DataTables;

class IncomeController extends Controller
{

    public function index()
    {
        return view('admin.income_details.incomeDetails');
    }

    public function getData(Request $request)
    {
        $incomes = IncomeSubmission::select('id', 'name', 'email', 'mobile', 'kyc_docs', 'income_proof', 'other_files', 'plan', 'payment_method', 'account_number', 'ifsc_code', 'account_holder', 'qr_receipt', 'bank_receipt', 'status');

        return DataTables::of($incomes)->make(true);
    }
    

    public function submitForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'kyc_docs' => 'required|file|mimes:jpg,png,pdf',
            'income_proof' => 'required|file|mimes:jpg,png,pdf',
            'other_files' => 'nullable|file|mimes:jpg,png,pdf',
            'plan' => 'required|array',
            'payment_method' => 'required|string|in:QR,Bank,PayLater',
            'qr_receipt' => 'nullable|file|mimes:jpg,png,pdf',
            'bank_receipt' => 'nullable|file|mimes:jpg,png,pdf',
            'account_number' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:255',
            'account_holder' => 'nullable|string|max:255',
        ]);
    
        // Ensure the 'storage' disk is used and files are stored correctly
        $kycPath = $request->hasFile('kyc_docs') ? $request->file('kyc_docs')->store('kyc_documents', 'public') : null;
        $incomeProofPath = $request->hasFile('income_proof') ? $request->file('income_proof')->store('income_proofs', 'public') : null;
        $otherFilesPath = $request->hasFile('other_files') ? $request->file('other_files')->store('other_files', 'public') : null;
        $qrReceiptPath = $request->hasFile('qr_receipt') ? $request->file('qr_receipt')->store('payment_receipts', 'public') : null;
        $bankReceiptPath = $request->hasFile('bank_receipt') ? $request->file('bank_receipt')->store('payment_receipts', 'public') : null;

        // Save data to database
        $submission = new \App\Models\IncomeSubmission();
        $submission->name = $request->name;
        $submission->email = $request->email;
        $submission->mobile = $request->mobile;
        $submission->kyc_docs = $kycPath;
        $submission->income_proof = $incomeProofPath;
        $submission->other_files = $otherFilesPath;
        $submission->plan = json_encode($request->plan);
        $submission->payment_method = $request->payment_method;
    
        // Save payment details based on the selected method
        if ($request->payment_method === 'Bank') {
            $submission->account_number = $request->account_number;
            $submission->ifsc_code = $request->ifsc_code;
            $submission->account_holder = $request->account_holder;
        }
    
        $submission->qr_receipt = $qrReceiptPath;
        $submission->bank_receipt = $bankReceiptPath;
        $submission->save();
    
        return response()->json(['message' => 'Form submitted successfully']);
    }
    
    public function updateStatus(Request $request, $id)
    {
        $income = IncomeSubmission::findOrFail($id);
        $income->status = $request->status;
        $income->save();
    
        return response()->json(['message' => 'Status updated successfully!']);
    }
    
    
    }
    