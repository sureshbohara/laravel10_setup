<!DOCTYPE html>
<html>
<head>
    <title>Subscription Confirmation</title>
</head>
<body>
    <p>Dear {{ $name }},</p>
    <p>Thank you for subscribing to our newsletter!</p>
    <p>Please click the following link to confirm your subscription:</p>
    <a href="{{ $confirmationLink }}">Confirm Subscription</a>
</body>
</html>
