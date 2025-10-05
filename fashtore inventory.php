<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion Store Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 20px; }
        header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #6a11cb; color: white; }
        footer {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fashion Store Inventory</h1>
        <nav>
            <a href="index.html">Home</a> | 
            <a href="inventory.php">Inventory</a>
        </nav>
    </header>

    <table>
        <tr>
            <th>Product</th>
            <th>Price ($)</th>
            <th>Bought</th>
            <th>Sold</th>
            <th>Stock</th>
            <th>Revenue ($)</th>
        </tr>
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $stock = $row['bought'] - $row['sold'];
                $revenue = $row['sold'] * $row['price'];
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['bought']}</td>
                        <td>{$row['sold']}</td>
                        <td>{$stock}</td>
                        <td>{$revenue}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
    </table>

    <footer>
        <p>&copy; 2025 Fashion Store. All Rights Reserved.</p>
    </footer>
</body>
</html>
