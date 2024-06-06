<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banana Grocery Store!</title>
  
  <style>
 
    /* CSS styles can be added here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url(img/1.jpg) no-repeat;
      background-size: cover;
      background-position: center;
      min-height: 100vh ;
      display:flex;
      flex-direction: column;
    }
    header {
      background-color: #ccc921;
      padding: 20px;
      text-align: center;
    }
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    nav ul li {
      display: inline;
      margin-right: 20px;
    }
    nav ul li a {
      text-decoration: none;
      color: #ffffff;
      font-weight: bold;
    }
    main {
      padding: 20px;
      text-align: center;
    }
    .intro {
      margin-bottom: 50px;
    }
    .getstarted-btn {
      background-color: #fff;
      border: none;
      color: black;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 20px;
      cursor: pointer;
      border-radius: 5px;
    }
     .getstarted-btn:hover {
  background-color: #ccc921;
  
    }
    footer {
    background-color: #ccc921;
    color: #2c2a2a;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}
  

  </style>
</head>
<body>
  <header>
    <h1>Welcome to Banana Grocery Store!</h1>
   
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="analytics.php">Analytics</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="intro">
      <h1>About Us</h1>
      <h3>Welcome to Banana Grocery Store! We provide different products while leveraging data analytics to optimize sales.</h3>
    </section>
    
    <section>
      <button class="getstarted-btn" onclick="location.href='signup.php'">Get Started</button>
    </section>
  </main>
  
 
  <footer>
    <p>&copy; 2024 Banana Grocery Store </p>
</footer>

</body>
</html>