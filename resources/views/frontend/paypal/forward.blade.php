<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Processing Payment...</title>
</head>
<body onload="document.getElementById('paypalForwardForm').submit();" style="text-align: center; font-family: Arial; padding: 100px;">
    <p>🔄 Processing your payment, please wait...</p>

    <form id="paypalForwardForm" method="POST" action="{{ route('paypal.payment.secure') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
    </form>
</body>
</html>
