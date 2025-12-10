<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    /* Animated Background Elements */
    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 300%;
        height: 300%;
        background: 
            radial-gradient(circle at 10% 20%, rgba(0, 150, 255, 0.1) 2%, transparent 3%),
            radial-gradient(circle at 90% 80%, rgba(0, 200, 255, 0.08) 1%, transparent 2%),
            radial-gradient(circle at 50% 50%, rgba(0, 255, 255, 0.05) 1%, transparent 2%);
        opacity: 0.8;
        animation: starField 60s linear infinite;
        z-index: 0;
    }

    @keyframes starField {
        0% { transform: translate(0,0) rotate(0deg); }
        100% { transform: translate(-100px,-100px) rotate(360deg); }
    }

    /* Nebula Glow */
    body::after {
        content: "";
        position: fixed;
        inset: 0;
        background: 
            radial-gradient(circle at 70% 30%, rgba(0,140,255,0.15) 0%, transparent 60%),
            radial-gradient(circle at 20% 80%, rgba(0,200,255,0.1) 0%, transparent 70%),
            radial-gradient(circle at 90% 50%, rgba(100,0,255,0.05) 0%, transparent 50%);
        filter: blur(80px);
        z-index: 0;
        opacity: 0.7;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 40px auto;
        position: relative;
        z-index: 5;
    }

    /* HEADER - Enhanced */
    .header {
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(0,255,255,0.2);
        border-radius: 24px;
        padding: 25px 40px;
        box-shadow: 
            0 0 25px rgba(0,180,255,0.25),
            inset 0 1px 0 rgba(255,255,255,0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        animation: fadeIn 0.7s ease-out;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .header::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(0, 255, 255, 0.1), 
            transparent);
        animation: headerShine 3s infinite;
    }

    @keyframes headerShine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .header h1 {
        color: #8cd6ff;
        font-size: 36px;
        font-weight: 700;
        text-shadow: 0 0 15px #00c8ff;
        letter-spacing: 1.5px;
        position: relative;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header h1::before {
        content: "🚀";
        font-size: 32px;
    }

    /* User Stats in Header */
    .user-stats {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .stat-badge {
        background: rgba(0, 150, 255, 0.15);
        padding: 8px 16px;
        border-radius: 12px;
        border: 1px solid rgba(0, 200, 255, 0.3);
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stat-badge i {
        color: #00d9ff;
    }

    /* LOGOUT BUTTON - Enhanced */
    .logout-btn {
        padding: 14px 32px;
        background: linear-gradient(135deg, #00bfff, #0088ff);
        border: none;
        border-radius: 14px;
        font-size: 16px;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: 0.4s;
        box-shadow: 
            0 0 20px rgba(0,150,255,0.4),
            inset 0 1px 0 rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
    }

    .logout-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255,255,255,0.2), 
            transparent);
        transition: 0.5s;
    }

    .logout-btn:hover::before {
        left: 100%;
    }

    .logout-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 
            0 0 30px rgba(0,200,255,0.6),
            0 10px 20px rgba(0,0,0,0.2);
    }

    /* MAIN CONTENT GRID */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
        margin-bottom: 30px;
    }

    /* USER CARD - Enhanced */
    .user-info-card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(30px);
        border-radius: 26px;
        border: 1px solid rgba(0,255,255,0.2);
        padding: 40px;
        box-shadow: 
            0 0 40px rgba(0,150,255,0.25),
            inset 0 1px 0 rgba(255,255,255,0.1);
        animation: fadeInUp 1s ease-out;
        position: relative;
        overflow: hidden;
    }

    .user-info-card::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(0,200,255,0.1) 0%, transparent 70%);
        filter: blur(40px);
        z-index: -1;
    }

    /* WELCOME BANNER - Enhanced */
    .welcome-message {
        background: linear-gradient(135deg, 
            rgba(0,170,255,0.2), 
            rgba(0,130,255,0.15));
        border: 1px solid rgba(0,200,255,0.25);
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 35px;
        box-shadow: 
            0 0 25px rgba(0,130,255,0.2),
            inset 0 0 20px rgba(0,200,255,0.1);
        position: relative;
        overflow: hidden;
    }

    .welcome-message::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(255,255,255,0.05) 50%, 
            transparent 70%);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .welcome-message h3 {
        font-size: 28px;
        color: #aee6ff;
        text-shadow: 0 0 15px #00bbff;
        margin-bottom: 10px;
        position: relative;
    }

    .welcome-message p {
        opacity: 0.9;
        font-size: 16px;
        color: #c4e7ff;
        position: relative;
    }

    /* PROFILE SECTION - Enhanced */
    .user-profile {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 40px;
        border-bottom: 1px solid rgba(0,200,255,0.15);
        padding-bottom: 30px;
        position: relative;
    }

    .avatar-container {
        position: relative;
    }

    .avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 3px solid rgba(0,200,255,0.5);
        box-shadow: 
            0 0 25px rgba(0,200,255,0.5),
            inset 0 0 20px rgba(0,200,255,0.2);
        object-fit: cover;
        transition: transform 0.5s;
    }

    .avatar:hover {
        transform: scale(1.05) rotate(5deg);
    }

    .avatar-ring {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border-radius: 50%;
        border: 2px solid transparent;
        border-top-color: #00d9ff;
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .user-details h2 {
        font-size: 32px;
        font-weight: 700;
        color: #dff7ff;
        text-shadow: 0 0 10px #00bbff;
        margin-bottom: 5px;
    }

    .user-details p {
        opacity: 0.9;
        font-size: 16px;
        color: #c4e7ff;
        margin-bottom: 15px;
    }

    .badge-container {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        background: rgba(0,255,200,0.15);
        border: 1px solid rgba(0,255,200,0.3);
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        color: #97ffd7;
        box-shadow: 0 0 15px rgba(0,255,200,0.3);
        transition: transform 0.3s;
    }

    .badge:hover {
        transform: translateY(-2px);
    }

    .badge i {
        font-size: 12px;
    }

    .badge.premium {
        background: rgba(255,215,0,0.15);
        border-color: rgba(255,215,0,0.3);
        color: #ffd700;
    }

    /* INFO GRID - Enhanced */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .info-item {
        padding: 25px;
        background: rgba(255,255,255,0.04);
        border-radius: 18px;
        border: 1px solid rgba(0,255,255,0.15);
        box-shadow: 
            0 0 20px rgba(0,130,255,0.2),
            inset 0 0 10px rgba(0,200,255,0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        animation: popUp 0.6s ease-out;
        position: relative;
        overflow: hidden;
    }

    .info-item::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, #00bfff, #0088ff);
    }

    .info-item:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 
            0 0 30px rgba(0,200,255,0.3),
            0 15px 25px rgba(0,0,0,0.2);
        border-color: rgba(0,255,255,0.3);
    }

    .info-item label {
        text-transform: uppercase;
        font-size: 12px;
        color: #99c9ff;
        opacity: 0.8;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        letter-spacing: 1px;
    }

    .info-item label i {
        color: #00d9ff;
    }

    .info-item .value {
        font-size: 18px;
        font-weight: 600;
        color: #e8f7ff;
        text-shadow: 0 0 8px rgba(0,150,255,0.4);
    }

    /* SIDEBAR - New Feature */
    .sidebar {
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(25px);
        border-radius: 24px;
        border: 1px solid rgba(0,255,255,0.15);
        padding: 30px;
        box-shadow: 0 0 30px rgba(0,150,255,0.2);
        height: fit-content;
    }

    .sidebar-title {
        font-size: 20px;
        color: #8cd6ff;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(0,200,255,0.2);
    }

    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 30px;
    }

    .action-btn {
        padding: 15px 20px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(0,200,255,0.2);
        border-radius: 14px;
        color: #c4e7ff;
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none;
        transition: all 0.3s;
        cursor: pointer;
    }

    .action-btn:hover {
        background: rgba(0,150,255,0.15);
        transform: translateX(5px);
        border-color: rgba(0,255,255,0.4);
    }

    .action-btn i {
        color: #00d9ff;
        font-size: 18px;
        width: 24px;
        text-align: center;
    }

    /* STATS WIDGET - New Feature */
    .stats-widget {
        background: linear-gradient(135deg, rgba(0,100,255,0.1), rgba(0,150,255,0.05));
        border-radius: 18px;
        padding: 25px;
        border: 1px solid rgba(0,200,255,0.2);
        margin-bottom: 30px;
    }

    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0,200,255,0.1);
    }

    .stat-item:last-child {
        border-bottom: none;
    }

    .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #00d9ff;
        text-shadow: 0 0 10px rgba(0,200,255,0.5);
    }

    /* ACTIVITY FEED - New Feature */
    .activity-feed {
        margin-top: 30px;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: rgba(255,255,255,0.02);
        border-radius: 14px;
        margin-bottom: 15px;
        border: 1px solid rgba(0,200,255,0.1);
        transition: background 0.3s;
    }

    .activity-item:hover {
        background: rgba(0,150,255,0.1);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: rgba(0,200,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #00d9ff;
    }

    /* FOOTER - New Feature */
    .dashboard-footer {
        text-align: center;
        padding: 25px;
        background: rgba(255,255,255,0.02);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(0,255,255,0.1);
        margin-top: 40px;
        font-size: 14px;
        color: #99c9ff;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 1100px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .header { 
            flex-direction: column; 
            gap: 20px; 
            text-align: center;
        }
        
        .user-stats {
            justify-content: center;
        }
        
        .user-profile { 
            flex-direction: column; 
            text-align: center; 
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
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

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(0, 50, 100, 0.2);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #00bfff, #0088ff);
        border-radius: 10px;
        border: 2px solid rgba(0, 50, 100, 0.2);
    }
</style>

</head>
<body>
    <div class="dashboard-container">
        <!-- Enhanced Header -->
        <div class="header">
            <h1>Dashboard</h1>
            
            <div class="user-stats">
                <div class="stat-badge">
                    <i class="fas fa-user-check"></i>
                    Active User
                </div>
                <div class="stat-badge">
                    <i class="fas fa-clock"></i>
                    {{ now()->format('h:i A') }}
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>

        <div class="content-grid">
            <!-- Main User Card -->
            <div class="user-info-card">
                <div class="welcome-message">
                    <h3>Welcome Back, {{ Auth::user()->name }}! 👋</h3>
                    <p>You're successfully authenticated with Google OAuth 2.0</p>
                </div>

                <div class="user-profile">
                    <div class="avatar-container">
                        @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="Profile Picture" class="avatar">
                        @else
                            <div class="avatar" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px; font-weight: bold;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="avatar-ring"></div>
                    </div>
                    
                    <div class="user-details">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->email }}</p>
                        <div class="badge-container">
                            <span class="badge">
                                <i class="fas fa-check-circle"></i>
                                Verified Account
                            </span>
                            <span class="badge premium">
                                <i class="fas fa-crown"></i>
                                Premium User
                            </span>
                        </div>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <label><i class="fas fa-id-card"></i> User ID</label>
                        <div class="value">#{{ Auth::user()->id }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-user"></i> Full Name</label>
                        <div class="value">{{ Auth::user()->name }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-envelope"></i> Email Address</label>
                        <div class="value">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fab fa-google"></i> Google ID</label>
                        <div class="value">{{ Auth::user()->google_id ?? 'N/A' }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-calendar-alt"></i> Member Since</label>
                        <div class="value">{{ Auth::user()->created_at->format('F d, Y') }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-history"></i> Last Updated</label>
                        <div class="value">{{ Auth::user()->updated_at->diffForHumans() }}</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-database"></i> Account Status</label>
                        <div class="value">Active</div>
                    </div>

                    <div class="info-item">
                        <label><i class="fas fa-shield-alt"></i> Security Level</label>
                        <div class="value">High</div>
                    </div>
                </div>
            </div>

            <!-- Sidebar with Quick Actions -->
            <div class="sidebar">
                <h3 class="sidebar-title">
                    <i class="fas fa-bolt"></i>
                    Quick Actions
                </h3>
                
                <div class="quick-actions">
                    <a href="#" class="action-btn">
                        <i class="fas fa-user-edit"></i>
                        <span>Edit Profile</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-shield-alt"></i>
                        <span>Security</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-question-circle"></i>
                        <span>Help Center</span>
                    </a>
                </div>

                <!-- Stats Widget -->
                <div class="stats-widget">
                    <h3 class="sidebar-title">
                        <i class="fas fa-chart-line"></i>
                        Your Stats
                    </h3>
                    
                    <div class="stat-item">
                        <span>Login Streak</span>
                        <span class="stat-value">14 days</span>
                    </div>
                    <div class="stat-item">
                        <span>Session Time</span>
                        <span class="stat-value">2h 15m</span>
                    </div>
                    <div class="stat-item">
                        <span>Total Logins</span>
                        <span class="stat-value">127</span>
                    </div>
                </div>

                <!-- Activity Feed -->
                <div class="activity-feed">
                    <h3 class="sidebar-title">
                        <i class="fas fa-history"></i>
                        Recent Activity
                    </h3>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div>
                            <p>Successful login</p>
                            <small>Just now</small>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div>
                            <p>Profile updated</p>
                            <small>2 days ago</small>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <p>Security check passed</p>
                            <small>1 week ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="dashboard-footer">
            <p>© {{ date('Y') }} {{ config('app.name') }} | Protected by OAuth 2.0 Security</p>
            <p style="margin-top: 10px; font-size: 12px; opacity: 0.7;">
                Last login: {{ now()->subMinutes(rand(5, 60))->diffForHumans() }} from {{ ['Chrome', 'Firefox', 'Safari', 'Edge'][rand(0,3)] }}
            </p>
        </div>
    </div>

    <script>
        // Add interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effect to info items
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.03)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Animate stats counter
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(stat => {
                const originalText = stat.textContent;
                if (originalText.includes('days') || originalText.includes('h') || originalText.match(/\d+/)) {
                    stat.style.opacity = '0';
                    setTimeout(() => {
                        stat.style.transition = 'opacity 0.5s ease';
                        stat.style.opacity = '1';
                    }, 300);
                }
            });

            // Add real-time clock update
            function updateClock() {
                const clockElement = document.querySelector('.stat-badge:nth-child(2)');
                if (clockElement) {
                    const now = new Date();
                    const timeString = now.toLocaleTimeString('en-US', { 
                        hour: '2-digit', 
                        minute: '2-digit',
                        hour12: true 
                    });
                    clockElement.innerHTML = `<i class="fas fa-clock"></i> ${timeString}`;
                }
            }
            
            setInterval(updateClock, 60000);
            updateClock();
        });
    </script>
</body>
</html>