# Google OAuth Login - Setup Guide

## What We've Built

A Laravel application with Google OAuth authentication that includes:

-   Login page with "Sign in with Google" button
-   Dashboard displaying user information after login
-   Secure authentication flow using Laravel Socialite

## Setup Instructions

### 1. Enable SQLite (Required)

**Run PowerShell as Administrator** and execute:

```powershell
$phpIni = "C:\Program Files\PHP\php.ini"
$content = Get-Content $phpIni -Raw
$content = $content -replace ';extension=pdo_sqlite', 'extension=pdo_sqlite'
$content = $content -replace ';extension=sqlite3', 'extension=sqlite3'
Set-Content -Path $phpIni -Value $content$phpIni = "C:\Program Files\PHP\php.ini"
$content = Get-Content $phpIni -Raw
$content = $content -replace ';extension=pdo_sqlite', 'extension=pdo_sqlite'
$content = $content -replace ';extension=sqlite3', 'extension=sqlite3'
Set-Content -Path $phpIni -Value $cont
```

### 2. Run Database Migrations

```powershell
php artisan migrate
```

### 3. Configure Google OAuth

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the Google+ API
4. Go to "Credentials" → "Create Credentials" → "OAuth 2.0 Client ID"
5. Configure OAuth consent screen if prompted
6. For "Authorized redirect URIs", add:
    ```
    http://localhost:8000/auth/google/callback
    ```
7. Copy your **Client ID** and **Client Secret**

### 4. Update .env File

Open `.env` and add your Google OAuth credentials:

```env
GOOGLE_CLIENT_ID=your-client-id-here
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
```

### 5. Start the Application

```powershell
php artisan serve
```

### 6. Test the Application

1. Open your browser and go to: `http://localhost:8000`
2. Click "Sign in with Google"
3. Authorize with your Google account
4. You'll be redirected to the dashboard showing your information

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

-   Make sure SQLite extensions are enabled in php.ini
-   Restart your terminal after enabling extensions

### Google OAuth errors

-   Verify your redirect URI matches exactly in Google Console
-   Check that Client ID and Secret are correct in .env
-   Make sure your Google Cloud project has the Google+ API enabled

### Session errors

-   Run `php artisan key:generate` if APP_KEY is not set
-   Clear cache with `php artisan cache:clear`

## Next Steps

You can enhance this application by:

-   Adding more user profile fields
-   Implementing role-based access control
-   Adding other OAuth providers (Facebook, GitHub, etc.)
-   Creating a user profile edit page
-   Adding email verification
