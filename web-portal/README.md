# HASIB Digital Card Portal - Web Portal

This directory contains the web portal for the HASIB Digital Card Management System.

## Features

### Mobile Access Control
The portal implements a two-layer mobile access control system:

1. **User Agent Detection** - Checks the browser's user agent string for mobile/tablet keywords
2. **Screen Size Detection** - JavaScript-based viewport width detection that prevents desktop view spoofing

Users attempting to access the portal from mobile devices or small screens will be blocked with an informative message.

### Authentication System
- Secure login with username/email and password
- "Remember Me" functionality using secure cookies
- Session management with security features
- Abstract error messages for security

### Security Features
- Session regeneration on login to prevent session fixation
- HttpOnly and Secure cookie flags
- Content Security Policy headers
- X-Frame-Options and X-Content-Type-Options headers
- Password field restrictions (no copy/paste)
- Input validation and sanitization

## Files

- `login.php` - Main login page with mobile access control
- `login.css` - Styling for the login page
- `login.js` - Client-side JavaScript for screen size detection and UI enhancements
- `set_mobile_block.php` - API endpoint for setting mobile block session flag
- `check_login.php` - Authentication handler
- `dashboard.php` - Main dashboard for authenticated users
- `logout.php` - Logout handler
- `Hasib white logo.svg` - Logo SVG file

## Setup

1. Ensure PHP 7.4+ is installed on your web server
2. Configure your web server to serve PHP files from this directory
3. Update the authentication logic in `check_login.php` to connect to your user database
4. Replace placeholder logos with actual brand assets
5. Configure HTTPS for production use (required for secure cookies)

## Default Credentials (Demo Only)

**Admin User:**
- Username: `admin`
- Password: `admin123`

**Regular User:**
- Any email address (e.g., `user@example.com`)
- Password: `user123`

**IMPORTANT:** Replace the hardcoded authentication in `check_login.php` with proper database authentication before deploying to production.

## Mobile Access Control

The mobile access control system works in two stages:

### Priority 1: Screen Size Block
JavaScript in `login.js` checks the viewport width. If it's less than 768 pixels, it:
1. Sends a POST request to `set_mobile_block.php`
2. Sets a session flag `access_blocked_by_screen_size`
3. Reloads the page
4. PHP detects the flag and displays the access restriction message

This defeats users who enable "Desktop View" on their mobile browsers, as it checks the actual viewport size, not just the user agent.

### Priority 2: User Agent Block
If the JavaScript check doesn't trigger (e.g., JavaScript is disabled), the PHP code falls back to checking the user agent string for common mobile/tablet keywords.

## Customization

### Changing the Mobile Width Threshold
Edit the `MAX_MOBILE_WIDTH` constant in `login.js`:
```javascript
const MAX_MOBILE_WIDTH = 768; // Change to your desired width in pixels
```

### Styling
All styles are in `login.css`. The primary color scheme uses `#49499d` (purple/blue).

### Branding
Replace the following with your actual brand assets:
- `../hasib logo.png` - Top header logo
- `Hasib white logo.svg` - Left panel logo

## Security Considerations

1. Always use HTTPS in production
2. Implement proper database authentication
3. Add rate limiting for login attempts
4. Enable secure session configuration in `php.ini`
5. Regularly update PHP and dependencies
6. Implement CSRF protection for forms
7. Add logging for security events

## License

© 2025 Applied Computer Services Company
