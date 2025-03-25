<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeSubmission;
use App\Http\Controllers\MailController;

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

        $mailController = new MailController();
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
        $submission->amount = $request->amount;
    
        // Save payment details based on the selected method
        if ($request->payment_method === 'Bank') {
            $submission->account_number = $request->account_number;
            $submission->ifsc_code = $request->ifsc_code;
            $submission->account_holder = $request->account_holder;
        }
    
        $submission->qr_receipt = $qrReceiptPath;
        $submission->bank_receipt = $bankReceiptPath;
        $submission->save();


        // Determine email message based on payment method
        $message = $this->getPaymentMessage($request->payment_method);

        // Prepare email data
        $emailData = new Request([
            'recipients' => [
                $request->email,  // User email
                'ashishkumar739293@gmail.com' // Admin email
            ],
            'subject' => 'Tax Tablet - Payment Confirmation',
            'message' => $message
        ]);

        $mailController->sendMail($emailData);
    
        return response()->json(['message' => 'Form submitted successfully']);
    }
    
    public function updateStatus(Request $request, $id)
    {
        $income = IncomeSubmission::findOrFail($id);
        $income->status = $request->status;
        $income->save();

        $emailData = new Request([
            'recipients' => [
                $request->email,  // User email
                'ashishkumar739293@gmail.com' // Admin email
            ],
            'subject' => 'Tax Tablet - Payment Status Update',
            'message' => `YOur  status of your requirment has been $request->status `
        ]);

        $mailController->sendMail($emailData);
    
        return response()->json(['message' => 'Status updated successfully!']);
    }
    
    private function getPaymentMessage($paymentMethod)
    {
        switch (strtolower($paymentMethod)) {
            case 'qr':
                return "✅ **Payment Successful!** <br>  
                        We have received your payment via **QR Code**. Your transaction has been successfully processed, and we are now preparing your order.  
                        📦 *Our team is working on it, and you will receive an update soon!* If you need any assistance, feel free to contact our support team.  
                        <br><br> 🎉 *Thank you for choosing us!*";
            
            case 'bank':
                return "🏦 **Payment Received!** <br>  
                        Your payment via **Bank Transfer** has been successfully recorded. We are currently verifying the transaction details, and once confirmed, your order will be processed.  
                        🔍 *Verification may take a few hours depending on your bank.* You will receive a confirmation email once everything is set.  
                        <br><br> 🙌 *We appreciate your trust in us!*";
            
            case 'paylater':
                return "🕒 **Payment Pending!** <br>  
                        You have chosen the **Pay Later** option. Please complete your payment at your earliest convenience to avoid any delays in processing your order.  
                        💳 *We recommend making the payment as soon as possible to ensure a smooth transaction process.*  
                        <br><br> 🤝 *Let us know if you need any help—we’re here for you!*";
            
            default:
                return "⚠️ **Payment Status Unknown!** <br>  
                        We could not determine your payment status. Please check your payment details and contact our support team if you need assistance.  
                        📞 *Reach out to us anytime—we’re happy to help!*";
        }
    }

    public function paymentHistory()
    {
        $payments = IncomeSubmission::orderBy('created_at', 'desc')->get();
        return response()->json($payments);
    }

    // Fetch single invoice details for AJAX
    public function showInvoice($id)
    {
        $invoice = IncomeSubmission::findOrFail($id);
        return response()->json($invoice);
    }

    }
    