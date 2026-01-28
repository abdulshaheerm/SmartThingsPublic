# Digital Card Generator

A professional digital business card generator with a modern, user-friendly interface.

## Features

### Left Panel - Data Input Form
- **Photo Upload**: Click to upload a profile photo (supports all common image formats)
- **Employee Name**: Enter the full name of the card holder
- **Job Title**: Enter the job position or title
- **Phone Number**: Enter the primary contact phone number
- **WhatsApp Number**: Enter WhatsApp contact number (optional)
- **Email Address**: Enter the email address

### Right Panel - Live Preview & Actions

#### Preview Card
The right panel shows a live preview of the digital card with:
- Profile photo display
- Name and job title
- Contact information (phone, WhatsApp, email)

#### Interactive Buttons
1. **Call Button** (📞): Click to initiate a phone call using the phone number
2. **Email Button** (✉️): Click to open default email client with the email address
3. **WhatsApp Button** (💬): Click to open WhatsApp chat with the WhatsApp number
4. **Website Button** (🌐): Click to visit www.hasib.com.sa

#### Download vCard
- Click the "Download vCard" button to save the contact information as a .vcf file
- The vCard can be imported into contacts on mobile devices and computers
- Includes all entered information: photo, name, title, phone, WhatsApp, email, and website

## How to Use

1. Open `digital-card-generator.html` in any modern web browser
2. Fill in the form fields on the left panel
3. Upload a photo (optional)
4. Watch the preview update in real-time on the right panel
5. Click any action button to test the functionality
6. Click "Download vCard" to save the contact as a vCard file

## Technical Details

- **Technology**: Pure HTML, CSS, and JavaScript (no dependencies)
- **Responsive**: Works on desktop, tablet, and mobile devices
- **vCard Format**: Version 3.0 with base64-encoded photo support
- **Browser Compatibility**: Works in all modern browsers (Chrome, Firefox, Safari, Edge)

## File Location

- Main file: `/digital-card-generator.html`
- No additional files or dependencies required

## Customization

The application can be easily customized by modifying the HTML file:
- Change colors by updating the CSS gradient values
- Modify the website URL in the `handleWebsite()` function
- Adjust styling in the `<style>` section
- Add additional fields by following the existing pattern

## Notes

- Required fields are marked with an asterisk (*)
- All data is processed locally in the browser (no server required)
- Photos are embedded in the vCard as base64-encoded data
- The vCard file is compatible with iOS, Android, Windows, and macOS contact applications
