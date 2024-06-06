<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Reports - Clothing Line</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #ccc921;
    color: black;
    padding: 20px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
    cursor: pointer;
}

footer {
    background-color: #ccc921;
    color: black;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}
.button {
      background: indigo; /* Green */
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
    .button:hover {
      background-color: #45a049;
    }

    </style>
<body>
  

    <header>
        <h1>Sales Reports</h1>
    </header>
    <style>
    /* Style for the button */
    .back-button {
      background-color: #4CAF50; /* Green */
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
    .id.myChart {
    justify-content: center;
    text-align: center;
}
  </style>
</head>
<body>

<!-- Link styled as a button -->
<a class="back-button" href="index.php">Back to Dashboard</a>

</body>
</html>
    
    <nav>
        <ul>
            <li><a class="button" href ="dailysales.php">Daily Sales</a></li>
            <li><a class="button" href="weeklysales.php">Weekly Sales</a></li>
            <li><a class="button" href="monthlysales.php">Monthly Sales</a></li>
        </ul>
    </nav>
    
    <section id="daily-sales">

<html>
<body>
<div id="myChart" style="width:600%; max-width:600px; height:500px; justify-content:center;"></div>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Monthly Sales', 'Mhl'],
  ['Daily Sales',55],
  ['Weekly Sales',49],
  ['Monthly Sales',5]
  
]);

// Set Options
const options = {
  title:'Percentage of sales every year'
};

// Draw
const chart = new google.visualization.BarChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2020', 1000, 400, 200],
          ['2022', 1170, 460, 250],
          ['2023', 660, 1120, 300],
          ['2024', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Sales Performance',
            subtitle: 'Sales, Expenses, and Profit: 2020-2024',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

</body>
</html>
    </section>
    
    <section id="weekly-sales">
   
    </section>
    
    <section id="monthly-sales">
  
    </section>
    
    <footer>
        <p>&copy; 2024 Sales Banana Grocery Products</p>
    </footer>
</body>
</html>