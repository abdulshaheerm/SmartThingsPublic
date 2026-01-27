// login.js - Client-side mobile access control and UI enhancements

// --------------------------------------------------------------------------------
// MOBILE ACCESS CONTROL: Screen Size Check
// --------------------------------------------------------------------------------
(function() {
    // Check if the viewport width is below a threshold that indicates a mobile/tablet device
    const MAX_MOBILE_WIDTH = 768; // pixels
    
    function checkScreenSize() {
        const viewportWidth = window.innerWidth || document.documentElement.clientWidth;
        
        if (viewportWidth < MAX_MOBILE_WIDTH) {
            // Send an AJAX request to set the session flag
            fetch('set_mobile_block.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'block_access=1'
            }).then(function() {
                // Reload the page to trigger the PHP block
                window.location.reload();
            }).catch(function(error) {
                console.error('Error setting mobile block:', error);
            });
        }
    }
    
    // Run the check immediately on page load
    checkScreenSize();
    
    // Also run the check if the window is resized (e.g., rotating a tablet)
    window.addEventListener('resize', checkScreenSize);
})();


// --------------------------------------------------------------------------------
// PASSWORD VISIBILITY TOGGLE
// --------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('.toggle-password');
    const passwordField = document.getElementById('password-field');
    
    if (togglePassword && passwordField) {
        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Toggle the eye icon
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    }
});


// --------------------------------------------------------------------------------
// ERROR MESSAGE AUTO-HIDE
// --------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const errorBox = document.getElementById('error-message-box');
    
    if (errorBox) {
        // Auto-hide error message after 5 seconds
        setTimeout(function() {
            errorBox.style.transition = 'opacity 0.5s';
            errorBox.style.opacity = '0';
            setTimeout(function() {
                errorBox.style.display = 'none';
            }, 500);
        }, 5000);
    }
});
