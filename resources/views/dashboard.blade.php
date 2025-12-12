<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Futuristic UI</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0a0f1f, #00111f, #001a33);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #fff;
            overflow-y: overlay;
        }

        /* Glassmorphism Card */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 18px;
            padding: 40px 35px;
            backdrop-filter: blur(12px);
            box-shadow: 0 0 20px rgba(0, 200, 255, 0.15);
            border: 1px solid rgba(0, 180, 255, 0.2);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 1px;
            color: #00d9ff;
            text-shadow: 0 0 12px rgba(0, 200, 255, 0.5);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #bfeaff;
            margin-bottom: 6px;
            display: block;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid rgba(0, 170, 255, 0.3);
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            font-size: 15px;
            outline: none;
            transition: 0.25s ease;
        }

        input:focus {
            border-color: #00cfff;
            box-shadow: 0 0 12px rgba(0, 200, 255, 0.5);
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(90deg, #0095ff, #00d9ff);
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.25s ease;
            box-shadow: 0 0 12px rgba(0, 150, 255, 0.4);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 18px rgba(0, 200, 255, 0.7);
        }

        /* Links */
        .extra-links {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
        }

        .extra-links a {
            color: #00d9ff;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .extra-links a:hover {
            text-shadow: 0 0 10px rgba(0, 200, 255, 0.7);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(0, 40, 80, 0.5);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #00bfff, #0088ff);
            border-radius: 10px;
            border: 2px solid rgba(0, 50, 100, 0.4);
            box-shadow: 0 0 10px rgba(0, 180, 255, 0.5);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #00d9ff, #0099ff);
            box-shadow: 0 0 15px rgba(0, 200, 255, 0.7);
        }

        /* Responsive */
        @media (max-width: 420px) {
            .login-card {
                padding: 30px 25px;
            }
            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h2>Welcome Back</h2>

        <form>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="Enter password">
            </div>

            <button class="btn">Login</button>

            <div class="extra-links">
                <p><a href="#">Forgot Password?</a></p>
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

</body>
</html>
