<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 40px auto;
        }

        .header {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #333;
            font-size: 28px;
        }

        .logout-btn {
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        }

        .user-info-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .user-profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 30px;
            border: 4px solid #667eea;
            object-fit: cover;
        }

        .user-details h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .user-details p {
            color: #666;
            font-size: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            border-left: 4px solid #667eea;
        }

        .info-item label {
            display: block;
            color: #888;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .info-item .value {
            color: #333;
            font-size: 16px;
            font-weight: 500;
            word-break: break-all;
        }

        .welcome-message {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
        }

        .welcome-message h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .welcome-message p {
            font-size: 14px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="user-info-card">
            <div class="welcome-message">
                <h3>Welcome, {{ Auth::user()->name }}! 🎉</h3>
                <p>You have successfully signed in with Google</p>
            </div>

            <div class="user-profile">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="Profile Picture" class="avatar">
                @else
                    <div class="avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 40px; font-weight: bold;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
                
                <div class="user-details">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <label>User ID</label>
                    <div class="value">{{ Auth::user()->id }}</div>
                </div>

                <div class="info-item">
                    <label>Name</label>
                    <div class="value">{{ Auth::user()->name }}</div>
                </div>

                <div class="info-item">
                    <label>Email</label>
                    <div class="value">{{ Auth::user()->email }}</div>
                </div>

                <div class="info-item">
                    <label>Google ID</label>
                    <div class="value">{{ Auth::user()->google_id ?? 'N/A' }}</div>
                </div>

                <div class="info-item">
                    <label>Account Created</label>
                    <div class="value">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                </div>

                <div class="info-item">
                    <label>Last Updated</label>
                    <div class="value">{{ Auth::user()->updated_at->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
