
<div class="container">
    <h2 class="text-warning">Payment History</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->name }}</td>
                    <td>{{ $payment->email }}</td>
                    <td>₹{{ number_format($payment->amount, 2) }}</td>
                    <td><span class="badge bg-{{ $payment->status == 'Completed' ? 'success' : 'warning' }}">{{ $payment->status }}</span></td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->created_at->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('invoice.show', $payment->id) }}" class="btn btn-primary btn-sm">View Invoice</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
