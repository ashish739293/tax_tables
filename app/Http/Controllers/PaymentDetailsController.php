<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentDetailsController extends Controller
{
    public function index() {
        return view('admin.setPaymentDetails.paymentDetails');
    }

    public function fetch()
    {
        $paymentDetail = PaymentDetail::first(); // Fetch the only existing record
        return response()->json(['data' => $paymentDetail]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|string|max:255',
            'ifsc_code' => 'required|string|max:50',
            'holder_name' => 'required|string|max:255',
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        // Check if a record already exists
        $paymentDetail = PaymentDetail::first();

        // Handle QR Code Upload
        $qrCodePath = $paymentDetail->qr_code ?? null;
        if ($request->hasFile('qr_code')) {
            if ($qrCodePath && file_exists(public_path($qrCodePath))) {
                unlink(public_path($qrCodePath)); // Delete old QR Code
            }
            $fileName = time() . '.' . $request->qr_code->extension();
            $request->qr_code->move(public_path('uploads/qr_codes'), $fileName);
            $qrCodePath = '/uploads/qr_codes/' . $fileName;
        }

        if ($paymentDetail) {
            // Update existing details
            $paymentDetail->update([
                'account_number' => $request->account_number,
                'ifsc_code' => $request->ifsc_code,
                'holder_name' => $request->holder_name,
                'qr_code' => $qrCodePath
            ]);
            return response()->json(['success' => true, 'message' => 'Payment details updated successfully']);
        } else {
            // Create a new record
            PaymentDetail::create([
                'account_number' => $request->account_number,
                'ifsc_code' => $request->ifsc_code,
                'holder_name' => $request->holder_name,
                'qr_code' => $qrCodePath
            ]);
            return response()->json(['success' => true, 'message' => 'Payment details added successfully']);
        }
    }

    public function destroy()
    {
        $paymentDetail = PaymentDetail::first();

        if (!$paymentDetail) {
            return response()->json(['success' => false, 'message' => 'No payment details found']);
        }

        if ($paymentDetail->qr_code && file_exists(public_path($paymentDetail->qr_code))) {
            unlink(public_path($paymentDetail->qr_code)); // Delete QR Code file
        }

        $paymentDetail->delete();
        return response()->json(['success' => true, 'message' => 'Payment details deleted successfully']);
    }
}
