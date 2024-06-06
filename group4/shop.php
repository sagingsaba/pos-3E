<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banana Apparel Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Style for the button */
    .back-button {
      background-color: #20308a; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    /* Hover effect */
    .back-button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<!-- Link styled as a button -->
<a class="back-button" href="home.php">Back</a>

</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.product {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #fff;
}

.product img {
    max-width: 100%;
    height: auto;
}

.product h3 {
    margin-top: 0;
}

.product p {
    margin-bottom: 0;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="container">
        <h1>Welcome to Banana Apparel Shop</h1>
        <div class="product">
            <img src="img/2.jpg" alt="Product 1">
            <h3>Stylish Shirt</h3>
            <p>Price: $25.99</p>
            <button>Add to Cart</button>
        </div>
        <div class="product">
            <img src="img/3.jpg" alt="Product 2">
            <h3>Elegant Dress</h3>
            <p>Price: $49.99</p>
            <button>Add to Cart</button>
        </div>
        <!-- Add more products as needed -->
    </div>
</body>
</html>