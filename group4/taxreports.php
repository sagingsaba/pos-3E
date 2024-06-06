<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tax Reports</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      align-items: center;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      text-align: center;
    }
    .con {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }
    .contain {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      text-align: center;
    }
    h1 {
      margin-top: 0;
      color: #333;
    }
    p {
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
   <style>
    /* Style for the button */
    .back-button {
      background-color: #ccc921; /* Green */
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
<!-- Link styled as a button -->
<a class="back-button" href="index.php">Back to Dashboard</a>
<body>
  <div class="con">
  <div class="contain">
    <!--<p>&emsp; Taxable Sales &emsp; &emsp; &emsp; &emsp; &emsp; Non-Taxable Sales &emsp; &emsp; &emsp; &emsp; &emsp; Total Net Sales</p>-->
    
    <table> 
      <tbody> 
        <thead> 
          <tr>
            <th> </th>
            <th> Taxable Sales </th>
            <th> &emsp; &emsp; Non-Taxable Sales </th>
            <th> Total Net Sales </th>
          </tr>
        </thead>
        <tr>
          <td> </td>
          <td> $500.00 </td>
          <td> &emsp; &emsp; $250.25 </td>
          <td> $750.25 </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="container">
    <h1>Tax Reports</h1>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Tax Name</th>
          <th>Tax Rate</th>
          <th>Taxable Sales</th>
          <th>Tax Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>April 1, 2024</td>
          <td> VAT </td>
          <td> 10% </td>
          <td> $500.00 </td>
          <td> $50.00 </td>
        </tr>
        <thead>
        <tr>
          <th>Total</th>
          <th> </th>
          <th> </th>
          <th> </th>
          <th> $50.00  </th>
        </tr>
      </thead>
        <tr>
          <td>April 2, 2024</td>
          <td> VAT </td>
          <td> 10% </td>
          <td> $700.00 </td>
          <td> $70.00 </td>
        </tr>
        <thead>
        <tr>
          <th>Total</th>
          <th> </th>
          <th> </th>
          <th> </th>
          <th> $70.00 </th>
        </tr>
      </thead>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:900px"></div>
  </div>

<script>
const xArray = [50,00,6,000,70,80,90,100,110,120,130,140,150];
const yArray = [7,8,8,9,9,9,10,11,14,14,15];

// Define Data
const data = [{
  x: xArray,
  y: yArray,
  mode:"lines"
}];

// Define Layout
const layout = {
  xaxis: {range: [40, 160], title: "Square Meters"},
  yaxis: {range: [5, 16], title: "Percentage of sales"},  
  title: "Monthly Sales"
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2020',  1000,      400],
          ['2022',  1170,      460],
          ['2023',  660,       1120],
          ['2024',  1030,      540]
        ]);

        var options = {
          title: 'Montly Sales Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    
</body>
</html>