<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\BulkMail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'recipients' => 'required|array',
                'recipients.*' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
        
            // Extract recipients, subject, and message
            $recipients = $request->input('recipients');
            $subject = $request->input('subject');
            $message = $request->input('message');
        
            // Log recipients before sending
            Log::info("Emails being sent to: " . implode(', ', $recipients));
        
            // Loop through each recipient and send an email
            foreach ($recipients as $recipient) {
                $emailData = [
                    'subject' => $subject,
                    'message' => $message,
                ];
        
                Mail::to($recipient)->send(new BulkMail($emailData));
        
                // Log success message for each recipient
                Log::info("Email successfully sent to: " . $recipient);
            }
        
            return response()->json(['message' => 'Emails sent successfully!'], 200);
        } catch (\Exception $e) {
            Log::error("Bulk email sending failed: " . $e->getMessage());
            return response()->json(['error' => 'Failed to send bulk emails'], 500);
        }
        
        
    }
}
