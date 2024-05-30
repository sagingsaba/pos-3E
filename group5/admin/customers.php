<?php 
include '../include/customerSession.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminHub</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../admincss/customers.css">
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="Picsart_24-03-29_12-28-55-400.png" alt="Logo">
            <span class="text">Banana</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="customers.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Customers</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- END SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <a href="#" class="profile">
                <img src="../image/default_profile.png" alt="Profile Image">
            </a>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Customers</h3>
                        <a href="../crud/addCustomer.php">Add Customer</a>
                        <nav>
                        <form action="customers.php" method="GET">
                            <div class="form-input">
                                <input type="search" name="search_query" id="search_query" placeholder="Search...">
                                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                            </div>
                        </form>
                        </nav>
                    </div>
                    <div id="customer_table">
                        <!-- Customer table  -->
                        <?php
                            echo '<table>';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th>Profile Picture</th>';
                                        echo '<th>Name</th>';
                                        echo '<th>Email</th>';
                                        echo '<th>Address</th>';
                                        echo '<th>Contact</th>';
                                        echo '<th>Total Visits</th>';
                                        echo '<th>Points balance</th>';
                                        echo '<th>Purchase Total</th>';
                                        echo '<th>Notes</th>';
                                        echo '<th>Actions</th>';
                                    echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                foreach ($customers as $row) {
                                    extract($row);
                                    echo '<tr>';
                                        echo '<td>';
                                        if ($profpic == '') {
                                            echo '<a href="customer_profile.php?id='.$id.'"><img src="../image/default_profile.png" class="profile"></a>';
                                        } else {
                                            echo '<a href="customer_profile.php?id='.$id.'"><img src="../uploaded_image/'.$profpic.'" class="profile"></a>';
                                        }
                                        echo '</td>';
                                        echo '<td>'.$FullName.'</td>';
                                        echo '<td>'.$Email.'</td>';
                                        echo '<td>'.$Address.'</td>';
                                        echo '<td>'.$Contact.'</td>';
                                        echo '<td>'.$TotalVisits.'</td>';
                                        echo '<td>'.$LoyaltyPoints.'</td>';
                                        echo '<td>'.$TotalPurchase.'</td>';
                                        echo '<td>'.$Notes.'</td>';
                                        echo "<td><a href='../crud/updatecustomer.php?id=$id' class='btn'>Update</a> <a href='../crud/deletecustomer.php?id=$id' class='btn'>Delete</a></td>";
                                    echo '</tr>';
                                }
                                echo '</tbody>';
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </main>
        <!-- END MAIN -->
    </section>
    <!-- END CONTENT -->

    <!-- External JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search_query').on('input', function(){
                var search_query = $(this).val();
                $.ajax({
                    url: 'search_customers.php',
                    method: 'GET',
                    data: {search_query: search_query},
                    success: function(response){
                        var customers = JSON.parse(response);
                        var html = '<table><thead><tr><th>Profile Picture</th><th>Name</th><th>Email</th><th>Address</th><th>Contact</th><th>Total Visits</th><th>Points balance</th><th>Purchase Total</th><th>Notes</th><th>Actions</th></tr></thead><tbody>';
                        customers.forEach(function(customer){
                            html += '<tr>';
                            html += '<td>';
                            if (customer.profpic == '') {
                                html += '<a href="customer_profile.php?id=' + customer.id + '"><img src="../image/default_profile.png" class="profile"></a>';
                            } else {
                                html += '<a href="customer_profile.php?id=' + customer.id + '"><img src="../uploaded_image/' + customer.profpic + '" class="profile"></a>';
                            }
                            html += '</td>';
                            html += '<td>' + customer.FullName + '</td>';
                            html += '<td>' + customer.Email + '</td>';
                            html += '<td>' + customer.Address + '</td>';
                            html += '<td>' + customer.Contact + '</td>';
                            html += '<td>' + customer.TotalVisits + '</td>';
                            html += '<td>' + customer.LoyaltyPoints + '</td>';
                            html += '<td>' + customer.TotalPurchase + '</td>';
                            html += '<td>' + customer.Notes + '</td>';
                            html += '<td><a href="../crud/updatecustomer.php?id=' + customer.id + '" class="btn">Update</a> <a href="../crud/deletecustomer.php?id=' + customer.id + '" class="btn">Delete</a></td>';
                            html += '</tr>';
                        });
                        html += '</tbody></table>';
                        $('#customer_table').html(html);
                    }
                });
            });
        });
    </script>

    <script src="script.js"></script>
</body>
</html>
