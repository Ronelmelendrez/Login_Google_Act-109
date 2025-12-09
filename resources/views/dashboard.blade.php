<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: radial-gradient(circle at 20% 20%, #0b1b2a, #02070d 80%);
        min-height: 100vh;
        padding: 20px;
        overflow-x: hidden;
        position: relative;
        color: #d7e9ff;
    }

    /* Floating Stars */
    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 200%;
        height: 200%;
        background: transparent url('https://www.transparenttextures.com/patterns/stardust.png');
        opacity: 0.2;
        animation: drift 40s linear infinite;
        z-index: 0;
    }

    @keyframes drift {
        0% { transform: translate(0,0); }
        100% { transform: translate(200px,200px); }
    }

    /* Nebula Light */
    body::after {
        content: "";
        position: fixed;
        inset: 0;
        background: radial-gradient(circle at 70% 30%, rgba(0,140,255,0.15), transparent 60%),
                    radial-gradient(circle at 20% 80%, rgba(0,200,255,0.1), transparent 70%);
        filter: blur(80px);
        z-index: 0;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 40px auto;
        position: relative;
        z-index: 5;
    }

    /* HEADER */
    .header {
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0,255,255,0.15);
        border-radius: 20px;
        padding: 25px 40px;
        box-shadow: 0 0 25px rgba(0,180,255,0.25);
        display: flex;
        justify-content: space-between;
        align-items: center;
        animation: fadeIn 0.7s ease-out;
    }

    .header h1 {
        color: #8cd6ff;
        font-size: 34px;
        font-weight: 700;
        text-shadow: 0 0 10px #00c8ff;
        letter-spacing: 1px;
    }

    /* FUTURISTIC BUTTON */
    .logout-btn {
        padding: 12px 30px;
        background: linear-gradient(135deg, #00bfff, #0088ff);
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 0 20px rgba(0,150,255,0.4);
    }

    .logout-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 0 30px rgba(0,200,255,0.6);
    }

    /* USER CARD */
    .user-info-card {
        margin-top: 30px;
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(25px);
        border-radius: 22px;
        border: 1px solid rgba(0,255,255,0.15);
        padding: 40px;
        box-shadow: 0 0 40px rgba(0,150,255,0.25);
        animation: fadeInUp 1s ease-out;
    }

    /* WELCOME BANNER */
    .welcome-message {
        background: linear-gradient(135deg, rgba(0,170,255,0.2), rgba(0,130,255,0.15));
        border: 1px solid rgba(0,200,255,0.2);
        padding: 25px;
        border-radius: 16px;
        text-align: center;
        margin-bottom: 35px;
        box-shadow: 0 0 25px rgba(0,130,255,0.2);
    }

    .welcome-message h3 {
        font-size: 26px;
        color: #aee6ff;
        text-shadow: 0 0 10px #00bbff;
    }

    .welcome-message p {
        opacity: 0.8;
        font-size: 15px;
    }

    /* PROFILE */
    .user-profile {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 40px;
        border-bottom: 1px solid rgba(0,200,255,0.15);
        padding-bottom: 25px;
    }

    .avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 3px solid rgba(0,200,255,0.5);
        box-shadow: 0 0 20px rgba(0,200,255,0.4);
        object-fit: cover;
    }

    .user-details h2 {
        font-size: 28px;
        font-weight: 700;
        color: #dff7ff;
        text-shadow: 0 0 8px #00bbff;
    }

    .user-details p {
        opacity: 0.8;
        font-size: 15px;
        color: #c4e7ff;
    }

    .badge {
        display: inline-block;
        margin-top: 10px;
        padding: 6px 14px;
        background: rgba(0,255,200,0.2);
        border: 1px solid rgba(0,255,200,0.25);
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        color: #97ffd7;
        box-shadow: 0 0 10px rgba(0,255,200,0.3);
    }

    /* GRID */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 20px;
    }

    /* CARD */
    .info-item {
        padding: 22px;
        background: rgba(255,255,255,0.04);
        border-radius: 14px;
        border: 1px solid rgba(0,255,255,0.15);
        box-shadow: 0 0 20px rgba(0,130,255,0.2);
        transition: 0.3s;
        animation: popUp 0.6s ease-out;
    }

    .info-item:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 0 25px rgba(0,200,255,0.3);
    }

    .info-item label {
        text-transform: uppercase;
        font-size: 11px;
        color: #99c9ff;
        opacity: 0.8;
        margin-bottom: 8px;
    }

    .info-item .value {
        font-size: 16px;
        font-weight: 600;
        color: #e8f7ff;
        text-shadow: 0 0 5px rgba(0,150,255,0.4);
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes popUp {
        0% { opacity: 0; transform: scale(0.9); }
        100% { opacity: 1; transform: scale(1); }
    }

    @media (max-width: 768px) {
        .header { flex-direction: column; gap: 15px; }
        .user-profile { flex-direction: column; text-align: center; }
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
                <h3>Welcome Back, {{ Auth::user()->name }}! 👋</h3>
                <p>You're successfully authenticated with Google OAuth 2.0</p>
            </div>

            <div class="user-profile">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="Profile Picture" class="avatar">
                @else
                    <div class="avatar" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px; font-weight: bold;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
                
                <div class="user-details">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                    <span class="badge">✓ Verified Account</span>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <label>User ID</label>
                    <div class="value">#{{ Auth::user()->id }}</div>
                </div>

                <div class="info-item">
                    <label>Full Name</label>
                    <div class="value">{{ Auth::user()->name }}</div>
                </div>

                <div class="info-item">
                    <label>Email Address</label>
                    <div class="value">{{ Auth::user()->email }}</div>
                </div>

                <div class="info-item">
                    <label>Google ID</label>
                    <div class="value">{{ Auth::user()->google_id ?? 'N/A' }}</div>
                </div>

                <div class="info-item">
                    <label>Member Since</label>
                    <div class="value">{{ Auth::user()->created_at->format('F d, Y') }}</div>
                </div>

                <div class="info-item">
                    <label>Last Updated</label>
                    <div class="value">{{ Auth::user()->updated_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
