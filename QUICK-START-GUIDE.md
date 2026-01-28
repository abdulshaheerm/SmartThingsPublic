# Digital Card Generator - Quick Start Guide

## Overview
The Digital Card Generator is a standalone web application that creates professional digital business cards with downloadable vCard files.

## Quick Start

### Step 1: Open the Application
Simply open `digital-card-generator.html` in your web browser:
- Double-click the file, or
- Right-click and select "Open with" → Your preferred browser

### Step 2: Fill in Your Information

**Required Fields (marked with *):**
- **Employee Name**: Your full name (e.g., "Ahmed Al-Hasib")
- **Job Title**: Your position (e.g., "Senior Business Development Manager")
- **Phone Number**: Your contact number (e.g., "+966 50 123 4567")
- **Email Address**: Your email (e.g., "ahmed@hasib.com.sa")

**Optional Fields:**
- **Photo**: Click the upload area to add a profile picture (max 5MB)
- **WhatsApp Number**: Your WhatsApp contact (e.g., "+966 50 123 4567")

### Step 3: Preview Your Card
As you type, the right panel updates in real-time showing your digital business card with:
- Your photo (if uploaded)
- Name and job title
- Contact information
- Interactive action buttons

### Step 4: Use the Interactive Features

**Action Buttons:**
1. **📞 Call**: Initiates a phone call to the phone number
2. **✉️ Email**: Opens your email client to send an email
3. **💬 WhatsApp**: Opens WhatsApp to start a chat
4. **🌐 Website**: Opens www.hasib.com.sa in a new tab

### Step 5: Download vCard
Click the green "Download vCard" button to save your contact information as a .vcf file that can be:
- Imported to iPhone/iPad contacts
- Imported to Android contacts
- Opened in Outlook, Gmail, or other email clients
- Shared via email, messaging, or cloud storage

## Example Usage

### Creating a Sales Team Card
```
Name: John Smith
Job Title: Sales Executive
Phone: +1 555 123 4567
WhatsApp: +1 555 123 4567
Email: john.smith@company.com
Photo: [Upload headshot photo]
```

### Creating a Business Owner Card
```
Name: Sarah Johnson
Job Title: CEO & Founder
Phone: +44 20 1234 5678
WhatsApp: +44 7911 123456
Email: sarah@business.com
Photo: [Upload professional photo]
```

## Tips & Best Practices

### Photo Guidelines
- Use a professional, high-quality photo
- Recommended size: 300x300 pixels or larger
- Accepted formats: JPG, PNG, GIF, WebP
- Maximum file size: 5MB
- Square aspect ratio works best

### Contact Information
- Use international format for phone numbers (e.g., +966)
- Ensure email address is valid
- WhatsApp number should include country code
- Test all buttons before sharing

### Sharing Your vCard
1. Generate and download your vCard
2. Share via:
   - Email attachment
   - Messaging apps
   - Cloud storage (Dropbox, Google Drive)
   - QR code generators (upload vCard to generate QR)
   - Company website download link

## Troubleshooting

### Photo Won't Upload
- Check file size (must be under 5MB)
- Ensure it's an image file (JPG, PNG, GIF, WebP)
- Try a different browser
- Compress large images before uploading

### vCard Won't Download
- Ensure all required fields are filled (Name, Phone, Email)
- Check browser's download settings
- Try a different browser
- Disable pop-up blockers if necessary

### Preview Not Updating
- Refresh the page and try again
- Ensure JavaScript is enabled in your browser
- Try a different browser (Chrome, Firefox, Edge, Safari)

### Buttons Not Working
- Ensure you've filled in the corresponding field
- For Call/Email: Your device must support tel:/mailto: protocols
- For WhatsApp: WhatsApp must be installed or accessible via web
- For Website: Check your internet connection

## Browser Compatibility

**Fully Supported:**
- Google Chrome 80+
- Mozilla Firefox 75+
- Microsoft Edge 80+
- Safari 13+
- Opera 70+

**Mobile Browsers:**
- Chrome for Android
- Safari for iOS
- Samsung Internet
- Firefox Mobile

## Privacy & Security

- **All processing is done locally in your browser**
- No data is sent to any server
- No tracking or analytics
- No cookies stored
- Your information stays private
- Safe to use offline

## Customization

To customize for your organization:
1. Open `digital-card-generator.html` in a text editor
2. Find the `handleWebsite()` function (around line 520)
3. Change `'https://www.hasib.com.sa'` to your company URL
4. Optionally customize colors in the CSS section (lines 10-250)
5. Save the file and refresh in your browser

## Support

For issues or questions:
1. Check this guide first
2. Verify browser compatibility
3. Try clearing browser cache
4. Test in a different browser
5. Refer to DIGITAL-CARD-GENERATOR-README.md for technical details

## Advanced Features

### Keyboard Shortcuts
- **Tab**: Navigate between form fields
- **Enter/Space**: Activate photo upload button (when focused)

### vCard Compatibility
The generated vCard files are compatible with:
- iOS Contacts app
- Android Contacts app
- Microsoft Outlook
- Gmail Contacts
- Apple Mail
- Thunderbird
- Windows Contacts
- macOS Contacts

### Data Included in vCard
- Full name (FN and N fields)
- Job title (TITLE field)
- Phone number (TEL field - work)
- WhatsApp number (TEL field - mobile)
- Email address (EMAIL field)
- Website URL (URL field)
- Photo (base64-encoded PHOTO field)

## Examples of Use Cases

1. **Business Networking**: Share at conferences and events
2. **Sales Team**: Provide to clients for easy contact
3. **Customer Service**: Include in email signatures
4. **Reception Desk**: Display on tablets for visitor contact capture
5. **Trade Shows**: Generate QR codes from vCards for booth visitors
6. **Email Signatures**: Link to vCard download in signatures
7. **Company Directory**: Generate cards for all employees

---

**Version**: 1.0  
**Last Updated**: January 2026  
**License**: Use freely within your organization
