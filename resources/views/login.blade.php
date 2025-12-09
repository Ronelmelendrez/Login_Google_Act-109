<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #0e7490 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: moveBackground 20s linear infinite;
            opacity: 0.25;
        }

        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Box */
        .login-container {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.6s ease-out;
            box-shadow: 
                0 25px 80px rgba(0,0,0,0.25), 
                0 0 0 1px rgba(255,255,255,0.3) inset;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 20px;
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: white;
            box-shadow: 0 10px 30px rgba(6,182,212,0.4);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 32px;
            font-weight: 700;
        }

        .login-header p {
            color: #666;
            font-size: 15px;
        }

        /* Google Button */
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 16px 24px;
            border-radius: 12px;
            background: #fff;
            border: 2px solid #e0e0e0;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
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
                rgba(66,133,244,0.1),
                transparent
            );
            transition: left .5s;
        }

        .google-btn:hover::before { left: 100%; }

        .google-btn:hover {
            border-color: #4285f4;
            box-shadow: 0 8px 20px rgba(66,133,244,0.25);
            transform: translateY(-2px);
        }

        .google-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
        }

        /* Error */
        .error-message {
            background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
            color: white;
            padding: 14px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            animation: fadeInUp .4s ease-out;
            box-shadow: 0 4px 15px rgba(255,107,107,0.3);
        }

        /* Footer features */
        .features {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-around;
        }

        .feature {
            text-align: center;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            margin-bottom: 8px;
        }

        .feature p {
            font-size: 11px;
            color: #666;
            font-weight: 500;
        }

        .footer-text {
            margin-top: 30px;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">G</div>

        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Sign in with your Google account to continue</p>
        </div>

        @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
        @endif

        <a href="{{ route('google.redirect') }}" class="google-btn">
            <img class="google-icon" src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo">
            Sign in with Google
        </a>

        <div class="features">
            <div class="feature">
                <div class="feature-icon">🔒</div>
                <p>Secure</p>
            </div>
            <div class="feature">
                <div class="feature-icon">⚡</div>
                <p>Fast</p>
            </div>
            <div class="feature">
                <div class="feature-icon">✨</div>
                <p>Simple</p>
            </div>
        </div>

        <div class="footer-text">Secure authentication powered by Google OAuth 2.0</div>
    </div>
</body>
</html>
