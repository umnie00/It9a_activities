<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Input Form</title>
    <link rel="stylesheet" href="style_i.css">
</head>
<body>
    <div class="form-container">
        <h1>Transaction Input Form</h1>
        
        <form method="POST" action="process.php" >
            <div class="form-group">
                <label for="item_name" class="required">Item Name:</label>
                <input type="text" id="item_name" name="item_name" required 
                       placeholder="Enter item name">
            </div>
            
            <div class="form-group">
                <label for="price" class="required">Price (₱):</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required 
                       placeholder="Enter price">
            </div>
            
            <div class="form-group">
                <label for="quantity" class="required">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required 
                       placeholder="Enter quantity">
            </div>
            
            <input type="submit" value="Process Transaction">
        </form>
    </div>
</body>
</html>