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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .status-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .success-icon {
            color: green;
        }

        .error-icon {
            color: red;
        }

        .details {
            padding: 0;
        }

        .details li {
            list-style: none;
            padding: 6px 0;
            border-bottom: 1px solid #eee;
        }

        .back-home {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .back-home:hover {
            text-decoration: underline;
        }

        .heading {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session('error'))
            <div class="status-icon error-icon">❌</div>
            <h2 class="heading" style="color: red;">Payment Failed</h2>
            <p>{{ session('error') }}</p>

        @elseif(isset($payment))
            <div class="status-icon success-icon">✅</div>
            <h2 class="heading" style="color: green;">Payment Successful</h2>
            <ul class="details">
                <li><strong>Transaction ID:</strong> {{ $payment['transaction_id'] }}</li>
                <li><strong>Email:</strong> {{ $payment['user_email'] }}</li>
                <li><strong>Amount:</strong> ${{ $payment['amount'] }} {{ $payment['currency'] }}</li>
                <li><strong>Status:</strong> {{ $payment['status'] }}</li>
                <li><strong>Payment Date:</strong> {{ $payment['payment_date'] }}</li>
            </ul>

        @else
            <h2 class="heading">Waiting for Payment...</h2>
            <p>Please complete your payment through PayPal.</p>
        @endif

        <a class="back-home" href="{{ url('/') }}">← Back to Home</a>
    </div>
</body>

</html>
