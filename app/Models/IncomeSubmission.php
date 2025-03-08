<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'kyc_docs',
        'income_proof',
        'other_files',
        'plan',
        'payment_method',
        'account_number',
        'ifsc_code',
        'account_holder',
        'qr_receipt',
        'bank_receipt',

    ];
}

