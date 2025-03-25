<div class="container">
    <div class="card p-4">
        <h2 class="text-warning">Invoice</h2>
        <hr>
        <p><strong>Name:</strong> {{ $invoice->name }}</p>
        <p><strong>Email:</strong> {{ $invoice->email }}</p>
        <p><strong>Mobile:</strong> {{ $invoice->mobile }}</p>
        <p><strong>Amount Paid:</strong> ₹{{ number_format($invoice->amount, 2) }}</p>
        <p><strong>Payment Method:</strong> {{ $invoice->payment_method }}</p>
        <p><strong>Status:</strong> <span class="badge bg-{{ $invoice->status == 'Completed' ? 'success' : 'warning' }}">{{ $invoice->status }}</span></p>
        <p><strong>Date:</strong> {{ $invoice->created_at->format('d M, Y') }}</p>
        <hr>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
</div>