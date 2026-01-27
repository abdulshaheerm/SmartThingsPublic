#!/bin/bash
# Manual test script for HASIB Digital Card Portal
# This script verifies PHP syntax and file structure

echo "=========================================="
echo "HASIB Digital Card Portal - Test Script"
echo "=========================================="
echo ""

# Change to web-portal directory
cd "$(dirname "$0")"

echo "1. Checking PHP syntax for all PHP files..."
echo "------------------------------------------"
ERROR_COUNT=0
for file in *.php; do
    if [ -f "$file" ]; then
        echo -n "  Checking $file... "
        if php -l "$file" > /dev/null 2>&1; then
            echo "✓ OK"
        else
            echo "✗ FAILED"
            php -l "$file"
            ERROR_COUNT=$((ERROR_COUNT + 1))
        fi
    fi
done
echo ""

echo "2. Checking required files exist..."
echo "------------------------------------------"
REQUIRED_FILES=(
    "login.php"
    "login.css"
    "login.js"
    "check_login.php"
    "set_mobile_block.php"
    "dashboard.php"
    "logout.php"
    "README.md"
    "Hasib white logo.svg"
)

for file in "${REQUIRED_FILES[@]}"; do
    echo -n "  Checking $file... "
    if [ -f "$file" ]; then
        echo "✓ Exists"
    else
        echo "✗ Missing"
        ERROR_COUNT=$((ERROR_COUNT + 1))
    fi
done
echo ""

echo "3. Testing mobile detection function..."
echo "------------------------------------------"
# Create a temporary test PHP script
cat > /tmp/test_mobile_detection.php << 'EOF'
<?php
// Mock the is_mobile function from login.php
function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $mobile_agents = ['Mobi', 'Android', 'iPhone', 'iPad', 'BlackBerry', 'Windows Phone', 'Tablet', 'Silk'];
    foreach ($mobile_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            return true;
        }
    }
    return false;
}

// Test cases
$test_cases = [
    'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X)' => true,
    'Mozilla/5.0 (Linux; Android 10; SM-G975F)' => true,
    'Mozilla/5.0 (iPad; CPU OS 14_6 like Mac OS X)' => true,
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36' => false,
    'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)' => false,
];

$passed = 0;
$failed = 0;

foreach ($test_cases as $user_agent => $expected) {
    $_SERVER['HTTP_USER_AGENT'] = $user_agent;
    $result = is_mobile();
    $status = ($result === $expected) ? '✓ PASS' : '✗ FAIL';
    
    if ($result === $expected) {
        $passed++;
    } else {
        $failed++;
        echo "  $status: Expected " . ($expected ? 'true' : 'false') . 
             ", got " . ($result ? 'true' : 'false') . "\n";
        echo "    User Agent: $user_agent\n";
    }
}

echo "  Passed: $passed/$" . count($test_cases) . "\n";
if ($failed > 0) {
    echo "  Failed: $failed\n";
    exit(1);
}
EOF

php /tmp/test_mobile_detection.php
if [ $? -eq 0 ]; then
    echo "  ✓ All mobile detection tests passed"
else
    echo "  ✗ Some mobile detection tests failed"
    ERROR_COUNT=$((ERROR_COUNT + 1))
fi
rm /tmp/test_mobile_detection.php
echo ""

echo "=========================================="
echo "Test Summary"
echo "=========================================="
if [ $ERROR_COUNT -eq 0 ]; then
    echo "✓ All tests passed!"
    exit 0
else
    echo "✗ $ERROR_COUNT error(s) found"
    exit 1
fi
