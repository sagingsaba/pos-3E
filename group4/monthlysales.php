<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Style for the button */
    .back-button {
      background-color: purple;
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
<a class="back-button" href="reports.php">Back to Reports</a>

</body>
</html>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}
    </style>
<body>
    <div class="container">
        <h1>Monthly Sales Report</h1>
        <table>
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Example data
                $sales_data = array(
                    array("April 2024", 42000),
                    array("March 2024", 38000),
                    // Add more data as needed
                );
                foreach ($sales_data as $data) {
                    echo "<tr>";
                    echo "<td>" . $data[0] . "</td>";
                    echo "<td>$" . number_format($data[1], 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
   
    <html>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
    ['Fresh Meat & Seafoods', 'Mhl'],
  ['Fresh Produce',54.8],
  ['Frozen Goods',48.6],
  ['Bakery',44.4],
  ['Chilled & Daily Items',23.9],
  ['Pantry',14.5]
]);

// Set Options
const options = {
  title:'Daily Sales'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
</div>
</body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([
        ['Fresh Produce', 'Fresh Produce', 'Fresh Produce',
         new Date(2022, 2, 22), new Date(2024, 5, 20), null, 100, null],
        ['Frozen Goods', 'Frozen Goods', 'Frozen Goods',
         new Date(2022, 5, 21), new Date(2024, 8, 20), null, 100, null],
        ['Bakery', 'Bakery', 'Bakery',
         new Date(2022, 8, 21), new Date(2024, 11, 20), null, 100, null],
        ['Bakery', 'Bakery', ' Bakery',
         new Date(2022, 8, 4), new Date(2024, 1, 1), null, 100, null],
        ['Chilled & Dailey Items', 'Chilled & Dailey Items', 'Chilled & Dailey Items',
         new Date(2022, 2, 31), new Date(2024, 9, 20), null, 14, null],
        ['Pantry', 'Pantry', 'Pantry',
         new Date(2022, 9, 8), new Date(2024, 5, 21), null, 89, null]
      ]);

      var options = {
        height: 400,
        gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="chart_div"></div>
</body>
</html>