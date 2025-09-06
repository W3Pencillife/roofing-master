<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Register | Systemed</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            max-width: 450px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .register-header {
            text-align: center;
            margin-bottom: 25px;
        }
        .register-header h3 {
            font-weight: 600;
            color: #212529;
        }
        .form-control {
            border-radius: 6px;
            margin-bottom: 15px;
            padding: 12px;
        }
        .btn-register {
            background: #4361ee;
            border: none;
            color: white;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background: #3a0ca3;
        }
        .additional-links {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .additional-links a {
            color: #4361ee;
            text-decoration: none;
        }
        .additional-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h3>Create Admin Account</h3>
            <p>Please fill in the details to register</p>
        </div>
        <form action="{{ route('admin.register.submit') }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            <button type="submit" class="btn btn-register">Register</button>
        </form>
        <div class="additional-links">
            <p>Already have an account? <a href="{{ route('admin.login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>
