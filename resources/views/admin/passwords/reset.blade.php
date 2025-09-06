<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Admin Password | Systemed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .input-group-text {
            background: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
            <h3>Reset Admin Password</h3>
            <p class="text-muted">Enter your new password below</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
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

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" required autofocus>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>

        <p class="text-center mt-3">
            <a href="{{ route('admin.login') }}">Back to Login</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>