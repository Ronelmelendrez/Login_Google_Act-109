# Google OAuth Login - Setup Guide

## What We've Built

A Laravel application with Google OAuth authentication that includes:

-   Login page with "Sign in with Google" button
-   Dashboard displaying user information after login
-   Secure authentication flow using Laravel Socialite

## Quick Start

### 1. Clone the Repository

```powershell
git clone https://github.com/Ronelmelendrez/Login_Google_Act-109.git
cd Login_Google_Act-109
```

### 2. Install Dependencies

```powershell
composer install
npm install
```

### 3. Environment Setup

Copy the example environment file:

```powershell
Copy-Item .env.example .env
```

Generate application key:

```powershell
php artisan key:generate
```

### 4. Enable SQLite (Required)

**Run PowerShell as Administrator** and execute:

```powershell
$phpIni = "C:\Program Files\PHP\php.ini"
$content = Get-Content $phpIni -Raw
$content = $content -replace ';extension=pdo_sqlite', 'extension=pdo_sqlite'
$content = $content -replace ';extension=sqlite3', 'extension=sqlite3'
Set-Content -Path $phpIni -Value $content
```

Close and reopen your terminal after this step.

### 5. Create Database

```powershell
New-Item -Path database/database.sqlite -ItemType File -Force
```

### 6. Run Database Migrations

```powershell
php artisan migrate
```

### 7. Configure Google OAuth

#### Step 1: Go to Google Cloud Console

Visit [Google Cloud Console](https://console.cloud.google.com/)

#### Step 2: Create a Project

1. Click on the project dropdown at the top
2. Click "New Project"
3. Enter project name (e.g., "Laravel Google Auth")
4. Click "Create"

#### Step 3: Enable Google+ API (Optional but recommended)

1. In the left sidebar, go to "APIs & Services" → "Library"
2. Search for "Google+ API"
3. Click on it and press "Enable"

#### Step 4: Create OAuth Credentials

1. Go to "APIs & Services" → "Credentials"
2. Click "+ CREATE CREDENTIALS" at the top
3. Select "OAuth client ID"

#### Step 5: Configure OAuth Consent Screen (if prompted)

1. Select "External" user type
2. Click "Create"
3. Fill in required fields:
   - **App name**: Your application name
   - **User support email**: Your email
   - **Developer contact email**: Your email
4. Click "Save and Continue"
5. Skip "Scopes" (click "Save and Continue")
6. Skip "Test users" (click "Save and Continue")
7. Review and click "Back to Dashboard"

#### Step 6: Create OAuth Client ID

1. Return to "Credentials" → "+ CREATE CREDENTIALS" → "OAuth client ID"
2. Select **Application type**: "Web application"
3. Enter a name (e.g., "Laravel Google Auth Client")
4. Under **Authorized JavaScript origins**, click "+ ADD URI":
   ```
   http://localhost:8000
   ```
5. Under **Authorized redirect URIs**, click "+ ADD URI":
   ```
   http://localhost:8000/auth/google/callback
   ```
6. Click "CREATE"
7. **Copy your Client ID and Client Secret** (you'll need these next)

### 8. Update .env File

Open `.env` and add your Google OAuth credentials:

```env
APP_URL=http://localhost:8000

GOOGLE_CLIENT_ID=your-client-id-here.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
```

**Important:** Replace `your-client-id-here` and `your-client-secret-here` with the actual values from Google Cloud Console.

### 9. Clear Cache

```powershell
php artisan config:clear
php artisan cache:clear
```

### 10. Start the Application

```powershell
php artisan serve
```

### 11. Test the Application

1. Open your browser and go to: `http://localhost:8000`
2. Click "Sign in with Google"
3. Select your Google account
4. Click "Allow" to authorize the application
5. You'll be redirected to the dashboard showing your information!

## Features

### Login Page (`/login`)

-   Clean, modern design
-   Google Sign-In button with official branding
-   Error message display

### Dashboard (`/dashboard`)

-   Displays user profile picture (avatar)
-   Shows user information:
    -   User ID
    -   Name
    -   Email
    -   Google ID
    -   Account creation date
    -   Last update time
-   Logout button

### Routes

-   `GET /` - Redirects to login
-   `GET /login` - Login page
-   `GET /auth/google` - Redirects to Google OAuth
-   `GET /auth/google/callback` - Handles Google OAuth callback
-   `GET /dashboard` - User dashboard (requires authentication)
-   `POST /logout` - Logs out user

## Database Schema

The `users` table includes:

-   `id` - Primary key
-   `google_id` - Google user ID (nullable)
-   `name` - User's full name
-   `email` - User's email address
-   `avatar` - Profile picture URL (nullable)
-   `password` - Password hash (nullable for Google auth)
-   `created_at` - Account creation timestamp
-   `updated_at` - Last update timestamp

## Security Features

-   CSRF protection on forms
-   Authentication middleware on protected routes
-   Secure OAuth flow with state verification
-   Session management

## Troubleshooting

### "Could not find driver" error

-   Make sure SQLite extensions are enabled in php.ini (see Step 4)
-   **Important:** Close and reopen your terminal after enabling extensions
-   Verify extensions are loaded: `php -m | Select-String -Pattern "sqlite"`

### "Invalid state" error

-   This has been fixed by using stateless OAuth mode
-   Clear your browser cache and cookies for localhost
-   Try using an incognito/private browsing window

### Google OAuth errors

-   **Redirect URI mismatch**: Verify your redirect URI in Google Console matches exactly:
    ```
    http://localhost:8000/auth/google/callback
    ```
    No trailing slashes, must match exactly!
-   **Invalid Client**: Check that Client ID and Secret are correct in `.env`
-   **Access denied**: Make sure you've configured the OAuth consent screen in Google Cloud Console
-   **API not enabled**: Enable the Google+ API in Google Cloud Console (optional but recommended)

### "Access denied for user 'root'@'localhost'" error

-   This means MySQL is configured but not available
-   Solution: Make sure `.env` has `DB_CONNECTION=sqlite`
-   Run: `php artisan config:clear`

### "NOT NULL constraint failed: users.password" error

-   This has been fixed in the migration
-   If you still see this, run: `php artisan migrate:fresh`
-   **Warning:** This will delete all existing data

### Session errors

-   Run `php artisan key:generate` if APP_KEY is not set
-   Clear cache: `php artisan cache:clear`
-   Clear config: `php artisan config:clear`

### Port already in use

-   If port 8000 is busy, use a different port:
    ```powershell
    php artisan serve --port=8080
    ```
-   Then update your Google OAuth redirect URI to match the new port

## Next Steps

You can enhance this application by:

-   Adding more user profile fields
-   Implementing role-based access control
-   Adding other OAuth providers (Facebook, GitHub, etc.)
-   Creating a user profile edit page
-   Adding email verification
