<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login | Systemed</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #7209b7;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            height: 100vh;
            overflow: hidden;
        }
        
        .login-container {
            display: flex;
            width: 900px;
            height: 550px;
            margin: auto;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .brand-section::before {
            content: '';
            position: absolute;
            top: -70px;
            right: -70px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .brand-section::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .brand-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            z-index: 2;
        }
        
        .brand-tagline {
            font-size: 18px;
            margin-bottom: 30px;
            z-index: 2;
        }
        
        .brand-features {
            list-style: none;
            padding: 0;
            z-index: 2;
        }
        
        .brand-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .brand-features i {
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-section {
            flex: 1;
            background: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h3 {
            color: var(--dark-text);
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: #6c757d;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .input-group-text {
            background: white;
            border-right: none;
        }
        
        .input-group .form-control {
            border-left: none;
        }
        
        .input-group .form-control:focus {
            box-shadow: none;
            border-color: #ddd;
        }
        
        .input-group:focus-within {
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            border-radius: 6px;
        }
        
        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: var(--primary-color);
        }
        
        .btn-login {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .divider span {
            padding: 0 10px;
            color: #6c757d;
            font-size: 14px;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }
        
        .additional-links {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        
        .additional-links a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .additional-links a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        @media (max-width: 992px) {
            .login-container {
                width: 100%;
                height: auto;
                flex-direction: column;
                box-shadow: none;
            }
            
            .brand-section {
                padding: 30px;
            }
            
            .login-section {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-8">
                <div class="login-container">
                    <!-- Brand Section -->
                    <div class="brand-section">
                        <div class="brand-logo">
                            <i class="fas fa-shield-alt me-2"></i>Systemed
                        </div>
                        <div class="brand-tagline">
                            Secure Admin Portal for System Management
                        </div>
                        <ul class="brand-features">
                            <li><i class="fas fa-check"></i> User account management</li>
                            <li><i class="fas fa-check"></i> Client password security</li>
                        </ul>
                    </div>
                    
                    <!-- Login Form Section -->
                    <div class="login-section">
                        <div class="login-header">
                            <h3>Admin Login</h3>
                            <p>Enter your credentials to access the dashboard</p>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="{{ route('admin.password.request') }}" class="text-decoration-none">Forgot password?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-login w-100 mb-4">Login</button>
                        </form>

                        <div class="additional-links">
                            <p>Don’t have an account? <a href="{{ route('admin.register') }}">Register</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>