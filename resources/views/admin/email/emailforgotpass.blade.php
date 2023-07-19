<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Reset Your Password</h2>
                <p>You recently requested to reset your password. Click the button below to set a new password:</p>
                <a class="btn btn-primary" href="{{ env('APP_URL').'/formresetpassword/'.$token }}">Change Password</a>
                <p>If you did not request a password reset, please ignore this email.</p>
                <p>Thank you,</p>
                <p>Villa Liang Ubud</p>
            </div>
        </div>
    </div>
</body>
</html>
