<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Password Reset | Systemed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container { 
            max-width: 450px; 
            padding: 30px; 
            background: #fff; 
            border-radius: 12px; 
            box-shadow: 0 8px 25px rgba(0,0,0,0.1); 
        }
        .btn-primary { 
            background-color: #4361ee; 
            border: none; 
            border-radius: 6px; 
            width: 100%; 
            padding: 12px; 
        }
        .btn-primary:hover { 
            background-color: #3a0ca3; 
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
            <h3>Reset Admin Password</h3>
            <p class="text-muted">Enter your email to receive a reset link</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your admin email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </form>

        <p class="text-center mt-3">
            <a href="{{ route('admin.login') }}">Back to Login</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>