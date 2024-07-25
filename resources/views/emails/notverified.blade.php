<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    Your Email is not verified please verify it.
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>