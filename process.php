<?php
// =============================================
// LOGIC FIRST - ALL PHP PROCESSING HERE
// =============================================

// Initialize variables with default values
$error = '';
$item_name_upper = '';
$name_length = 0;
$price_rounded = 0;
$quantity = 0;
$subtotal = 0;
$discount = 0;
$discount_rate = '';
$tax = 0;
$final_amount = 0;

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Retrieve form data
    $item_name = $_POST['item_name'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
        // =============================================
        // USER-DEFINED FUNCTIONS (5 functions)
        // =============================================
        
        // Function 1: Calculate subtotal
        function calculateSubtotal($price, $quantity) {
            return $price * $quantity;
        }
        
        // Function 2: Calculate discount based on subtotal
        function calculateDiscount($subtotal) {
            if ($subtotal > 1000) {
                return $subtotal * 0.10; // 10% discount for purchases over ₱1000
            } else {
                return $subtotal * 0.05; // 5% discount for smaller purchases
            }
        }
        
        // Function 3: Calculate tax (12% VAT)
        function calculateTax($subtotal) {
            return $subtotal * 0.12; // 12% tax rate
        }
        
        // Function 4: Calculate final amount
        function calculateFinalAmount($subtotal, $discount, $tax) {
            return $subtotal - $discount + $tax;
        }
        
        // Function 5: Format currency (using built-in functions)
        function formatCurrency($amount) {
            return "₱ " . number_format($amount, 2);
        }
        
        // =============================================
        // BUILT-IN PHP FUNCTIONS (3 functions)
        // =============================================
        
        // Built-in Function 1: strtoupper() - Convert item name to uppercase
        $item_name_upper = strtoupper($item_name);
        
        // Built-in Function 2: strlen() - Count characters in item name
        $name_length = strlen($item_name);
        
        // Built-in Function 3: round() - Round price to 2 decimal places
        $price_rounded = round($price, 2);
        
        // Perform calculations using our user-defined functions
        $subtotal = calculateSubtotal($price, $quantity);
        $discount = calculateDiscount($subtotal);
        
        // Set discount rate for display
        if ($subtotal > 1000) {
            $discount_rate = '10%';
        } else {
            $discount_rate = '5%';
        }
        
        $tax = calculateTax($subtotal);
        $final_amount = calculateFinalAmount($subtotal, $discount, $tax);
    } else {
    $error = "No transaction data received.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Summary</title>
    <link rel="stylesheet" href="style_p.css">
</head>
<body>
    <div class="result-container">
        
        <?php if (!empty($error)): ?>
            <!-- ERROR DISPLAY - Shows when there's an error -->
            <div class='warning'>Error: <?php echo $error; ?></div>
            <a href='index.php' class='back-link'>← Go to Transaction Form</a>
            
        <?php else: ?>
            <!-- SUCCESS DISPLAY - Shows transaction details -->
            <h1>Transaction Summary</h1>
            
            <div class="transaction-detail">
                <span class="label">Item Name:</span>
                <span class="value"><?php echo $item_name_upper; ?></span>
                <small>(<?php echo $name_length; ?> characters)</small>
            </div>
            
            <div class="transaction-detail">
                <span class="label">Price per unit:</span>
                <span class="value"><?php echo formatCurrency($price_rounded); ?></span>
            </div>
            
            <div class="transaction-detail">
                <span class="label">Quantity:</span>
                <span class="value"><?php echo $quantity; ?></span>
            </div>
            
            <div class="transaction-detail">
                <span class="label">Subtotal:</span>
                <span class="value"><?php echo formatCurrency($subtotal); ?></span>
            </div>
            
            <div class="transaction-detail">
                <span class="label">Discount:</span>
                <span class="value">- <?php echo formatCurrency($discount); ?></span>
                <small>(<?php echo $discount_rate; ?> discount)</small>
            </div>
            
            <div class="transaction-detail">
                <span class="label">Tax (12%):</span>
                <span class="value">+ <?php echo formatCurrency($tax); ?></span>
            </div>
            
            <div class="total">
                <span class="label">Final Amount to Pay:</span>
                <span class="value"><strong><?php echo formatCurrency($final_amount); ?></strong></span>
            </div>
            
            <div class="processing-details">
                <p><strong>Processing Details:</strong><br>
                - Item name converted to uppercase using strtoupper()<br>
                - Character count: <?php echo $name_length; ?> (using strlen())<br>
                - Price rounded: <?php echo $price_rounded; ?> (using round())<br>
                - All currency formatted using number_format()</p>
            </div>
            
            <a href="index.php" class="back-link">← Process Another Transaction</a>
        <?php endif; ?>

    </div>
</body>
</html>