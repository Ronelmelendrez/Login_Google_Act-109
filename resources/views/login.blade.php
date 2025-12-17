<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Secure Access Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #06b6d4;
            --primary-dark: #0891b2;
            --primary-darker: #0e7490;
            --gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-darker) 100%);
            --white: #ffffff;
            --gray-light: #f8fafc;
            --gray: #64748b;
            --gray-dark: #334155;
            --error: #ef4444;
            --success: #10b981;
            --shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
            --shadow-light: 0 10px 30px rgba(6, 182, 212, 0.2);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --border-radius: 24px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .bg-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
            background: rgba(255, 255, 255, 0.05);
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 20%;
            animation-delay: 1s;
            background: rgba(255, 255, 255, 0.08);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        /* Main container */
        .login-container {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            border-radius: var(--border-radius);
            padding: 60px 50px;
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.8s ease-out;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 90px;
            height: 90px;
            margin-bottom: 20px;
            border-radius: 22px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            color: var(--white);
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .logo:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 15px 40px rgba(6, 182, 212, 0.4);
        }

        .logo::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            top: 0;
            left: -100%;
            transition: left 0.7s;
        }

        .logo:hover::after {
            left: 100%;
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .login-header p {
            color: var(--gray);
            font-size: 16px;
            line-height: 1.5;
            max-width: 320px;
            margin: 0 auto;
        }

        /* Google Button */
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 18px 24px;
            border-radius: 14px;
            background: var(--white);
            border: 2px solid #e2e8f0;
            font-size: 17px;
            font-weight: 600;
            color: var(--gray-dark);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .google-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent,
                rgba(66, 133, 244, 0.1),
                transparent
            );
            transition: left 0.6s;
        }

        .google-btn:hover::before {
            left: 100%;
        }

        .google-btn:hover {
            border-color: #4285f4;
            box-shadow: 0 10px 25px rgba(66, 133, 244, 0.2);
            transform: translateY(-3px);
        }

        .google-btn:active {
            transform: translateY(-1px);
        }

        .google-icon {
            width: 24px;
            height: 24px;
            margin-right: 14px;
        }

        /* Error Message */
        .error-message {
            background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
            color: var(--white);
            padding: 16px 24px;
            border-radius: 14px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            animation: fadeInUp 0.4s ease-out;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .error-message i {
            font-size: 18px;
        }

        /* Features */
        .features {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e2e8f0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature {
            text-align: center;
            transition: var(--transition);
            padding: 10px;
            border-radius: 12px;
        }

        .feature:hover {
            background: rgba(6, 182, 212, 0.05);
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--white);
            margin: 0 auto 12px;
            box-shadow: 0 5px 15px rgba(6, 182, 212, 0.2);
            transition: var(--transition);
        }

        .feature:hover .feature-icon {
            transform: scale(1.1);
        }

        .feature p {
            font-size: 13px;
            color: var(--gray);
            font-weight: 500;
        }

        /* Footer */
        .footer-text {
            margin-top: 30px;
            text-align: center;
            color: var(--gray);
            font-size: 13px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .footer-text i {
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 600px) {
            .login-container {
                padding: 40px 30px;
                max-width: 100%;
            }

            .login-header h1 {
                font-size: 30px;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .feature {
                padding: 15px;
            }

            .shape:nth-child(2), .shape:nth-child(4) {
                display: none;
            }
        }

        @media (max-width: 400px) {
            .login-container {
                padding: 30px 20px;
            }

            .logo {
                width: 75px;
                height: 75px;
                font-size: 34px;
            }

            .login-header h1 {
                font-size: 26px;
            }

            .google-btn {
                padding: 16px 20px;
                font-size: 16px;
            }
        }

        /* Loading animation for button */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top-color: #4285f4;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success message */
        .success-message {
            background: linear-gradient(135deg, #10b981, #059669);
            color: var(--white);
            padding: 16px 24px;
            border-radius: 14px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            animation: fadeInUp 0.4s ease-out;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <!-- Background shapes -->
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Login container -->
    <div class="login-container">
        <div class="logo-container">
            <div class="logo">G</div>
        </div>

        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Sign in with your Google account to securely access your dashboard</p>
        </div>

        <!-- Error message (example - replace with dynamic content) -->
        <div class="error-message" id="errorMessage" style="display: none;">
            <i class="fas fa-exclamation-circle"></i>
            <span id="errorText">Invalid credentials. Please try again.</span>
        </div>

        <!-- Success message (example) -->
        <div class="success-message" id="successMessage" style="display: none;">
            <i class="fas fa-check-circle"></i>
            <span id="successText">Login successful! Redirecting...</span>
        </div>

        <a href="{{ route('google.redirect') }}" class="google-btn" id="googleBtn">
            <img class="google-icon" src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo">
            <span id="btnText">Sign in with Google</span>
        </a>

        <div class="features">
            <div class="feature">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <p>Enterprise-grade Security</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <p>Lightning Fast Access</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="fas fa-user-check"></i></div>
                <p>One-Click Authentication</p>
            </div>
        </div>

        <div class="footer-text">
            <i class="fas fa-lock"></i>
            <span>Secure authentication powered by Google OAuth 2.0</span>
        </div>
    </div>

    <script>
        // Simulate dynamic error/success messages
        document.addEventListener('DOMContentLoaded', function() {
            const googleBtn = document.getElementById('googleBtn');
            const btnText = document.getElementById('btnText');
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
            // For demo purposes - show a success message after clicking the button
            googleBtn.addEventListener('click', function(e) {
                // In a real app, this would be handled by the server
                // This is just for demo UI feedback
                
                // Show loading state
                btnText.textContent = 'Connecting to Google...';
                googleBtn.classList.add('loading');
                
                // Simulate API call delay
                setTimeout(() => {
                    // This would be replaced with actual authentication flow
                    // For demo, we'll show success message
                    successMessage.style.display = 'flex';
                    errorMessage.style.display = 'none';
                    
                    // Reset button
                    btnText.textContent = 'Sign in with Google';
                    googleBtn.classList.remove('loading');
                    
                    // In a real app, the page would redirect to Google OAuth
                    // For demo, we'll simulate a redirect after 1.5 seconds
                    setTimeout(() => {
                        // window.location.href = "{{ route('google.redirect') }}";
                        console.log("Redirecting to Google OAuth...");
                    }, 1500);
                }, 1000);
                
                // Prevent actual navigation for this demo
                // e.preventDefault();
            });
            
            // Example: Show error message if URL has error parameter
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                const errorType = urlParams.get('error');
                let errorText = 'An error occurred during authentication.';
                
                if (errorType === 'access_denied') {
                    errorText = 'Access denied. Please grant the required permissions.';
                } else if (errorType === 'invalid_request') {
                    errorText = 'Invalid authentication request. Please try again.';
                }
                
                document.getElementById('errorText').textContent = errorText;
                errorMessage.style.display = 'flex';
            }
            
            // Example: Show success message if URL has success parameter
            if (urlParams.has('success')) {
                successMessage.style.display = 'flex';
                errorMessage.style.display = 'none';
                
                // Auto redirect after 2 seconds
                setTimeout(() => {
                    console.log("Redirecting to dashboard...");
                    // window.location.href = "/dashboard";
                }, 2000);
            }
        });
    </script>
</body>
</html>