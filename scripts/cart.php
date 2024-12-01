<?php

/*
Develop a shopping cart system where products can be added and removed using PHP sessions.
a) Display the total cost dynamically as users add or remove items.
b) Ensure that the cart's state persists between refreshes using session variables.
*/

// Start the session to store cart information
session_start();

// Check if the cart is not initialized, then initialize it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Define some sample products (could be retrieved from a database)
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 10],
    ['id' => 2, 'name' => 'Product 2', 'price' => 20],
    ['id' => 3, 'name' => 'Product 3', 'price' => 30],
];

// Handle adding items to the cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Add new product to the cart
        foreach ($products as $product) {
            if ($product['id'] == $productId) {
                $_SESSION['cart'][$productId] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity
                ];
                break;
            }
        }
    }
}

// Handle removing items from the cart
if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    unset($_SESSION['cart'][$productId]);
}

// Calculate the total cost
$totalCost = 0;
foreach ($_SESSION['cart'] as $productId => $item) {
    $totalCost += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>

<body>

    <h1>Shopping Cart</h1>

    <!-- Display the products -->
    <h2>Available Products</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td>$<?= number_format($product['price'], 2) ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            Quantity: <input type="number" name="quantity" value="1" min="1" required>
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <!-- Display the cart -->
    <h2>Your Cart</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $productId => $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td><a href="?remove=<?= $productId ?>">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total Cost: $<?= number_format($totalCost, 2) ?></h3>
    <?php endif; ?>

</body>

</html>