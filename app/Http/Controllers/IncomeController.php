<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
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

    // Store the uploaded files
    $kycPath = $request->file('kyc_docs')->store('kyc_documents');
    $incomeProofPath = $request->file('income_proof')->store('income_proofs');
    $otherFilesPath = $request->hasFile('other_files') ? $request->file('other_files')->store('other_files') : null;
    $qrReceiptPath = $request->hasFile('qr_receipt') ? $request->file('qr_receipt')->store('payment_receipts') : null;
    $bankReceiptPath = $request->hasFile('bank_receipt') ? $request->file('bank_receipt')->store('payment_receipts') : null;

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

}
