<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PayPal Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .success-icon {
            font-size: 48px;
            color: green;
        }
        .error-icon {
            font-size: 48px;
            color: red;
        }
        .details li {
            list-style: none;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('error'))
            <div class="error-icon">❌</div>
            <h2 style="color: red;">Payment Failed</h2>
            <p>{{ session('error') }}</p>
        @elseif(isset($payment))
            <div class="success-icon">✅</div>
            <h2 style="color: green;">Payment Successful</h2>
            <ul class="details">
                <li><strong>Transaction ID:</strong> {{ $payment['transaction_id'] }}</li>
                <li><strong>Payer Name:</strong> {{ $payment['payer_name'] }}</li>
                <li><strong>Email:</strong> {{ $payment['payer_email'] }}</li>
                <li><strong>Amount:</strong> ${{ $payment['amount'] }} {{ $payment['currency'] }}</li>
                <li><strong>Status:</strong> {{ $payment['status'] }}</li>
                <li><strong>Payment Date:</strong> {{ $payment['payment_date'] }}</li>
            </ul>
        @else
            <h2>Waiting for Payment...</h2>
        @endif

        <a href="{{ url('/') }}">← Back to Home</a>
    </div>
</body>
</html>
