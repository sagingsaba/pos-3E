<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montagu Slab Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100..700&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <div class="grid-container">
        <!-- Header -->
        <header class="header">
           
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left"> 
            <span class=""></span></div>
<!-- style header -->
<style>
header-left {
	border: 1;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
:root {
	--bg: #e3e4e8;
	--fg: #17181c;
	--input: #ffffff;
	--primary: #255ff4;
	--dur: 1s;
	font-size: calc(17px + (27 - 16)*(100vw - 320px)/(1280 - 320));
}
body, input {
	color: var(--fg);
	font: 1em/1.5 Hind, sans-serif;
}
body {
	background: var(--bg);
	display: flex;
	height: 100vh;
}
form, input, .caret {
	margin: auto;
}
form {
	position: relative;
	width: 100%;
	max-width: 17em;
}
input {
	background: transparent;
	border-radius: 50%;
	box-shadow: 0 0 0 0.25em inset;
	caret-color: var(--primary);
	width: 2em;
	height: 2em;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
input:focus, input:valid {
	background: var(--input);
	border-radius: 0.25em;
	box-shadow: none;
	padding: 0.75em 1em;
	transition-duration: calc(var(--dur) * 0.25);
	transition-delay: calc(var(--dur) * 0.25);
	width: 100%;
	height: 3em;
}
input:focus {
	animation: showCaret var(--dur) steps(1);
	outline: transparent;
}
input:focus + .caret, input:valid + .caret {
	animation: handleToCaret var(--dur) linear;
	background: transparent;
	width: 1px;
	height: 1.5em;
	transform: translate(0,-1em) rotate(-180deg) translate(7.5em,-0.25em);
}
input::-webkit-search-decoration {
	-webkit-appearance: none;
}
label {
	color: #e3e4e8;
	overflow: hidden;
	position: absolute;
	width: 0;
	height: 0;
}
</style>

        <div class="header-right"> 
                <nav class="menu">
                    <a class="nav-item" style="padding: 1rem 1.5rem 1rem .5rem;" href="index.php">
                        <img src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" width="28px" height="28px" />
                    </a>
            
                    </a>
                    <a class="nav-item" href="notification.php">
                        <img src="https://img.icons8.com/fluency-systems-regular/48/000000/appointment-reminders--v1.png" width="28px" height="28px" />
                    </a>
                  
                    </a>
                    <a class="nav-item" style="padding: 1rem .5rem 1rem 1.5rem;" href="logout.php">
                        <img src="https://img.icons8.com/fluency-systems-regular/48/000000/user.png" width="28px" height="28px" />
                    </a>
                    <nav>
                       
                </nav>
              
            </main>
            
 <style>
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");

header-right{
	width: 10%;
	height: 10vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

a {
	text-decoration: none;
	font-family: Roboto, sans-serif;
	font-size: 1em;
	display: flex;
	flex-direction: column;
	justify-content: center;
	transition-duration: 0.2s;
	align-items: center;
	padding: 1rem 1.5rem;
}

img {
	transition-duration: 0.2s;
}

a:hover img {
	animation: left-edge 0.5s linear 1;
	filter: invert(72%) sepia(20%) saturate(747%) hue-rotate(174deg)
		brightness(96%) contrast(97%);
}

img:hover .menu {
	box-shadow: 0px 10px 5px rgb(100, 187, 241, 0.1);
}

.menu {
	display: flex;
	justify-content: space-between;
	align-items: center;
	position: relative;
	width: auto;
	height: 60px;
	padding: 0 15px;
	border-radius: 15px;
}

.dot {
	animation: dot-anim 8s linear infinite;
}

/* Animations */

@keyframes dot-anim {
	0% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.5);
	}
	100% {
		transform: scale(1);
	}
}

@keyframes left-edge {
	0% {
		transform: rotate(0deg);
	}
	35% {
		transform: rotate(-25deg);
	}
	75% {
		transform: rotate(25deg);
	}
	100% {
		transform: rotate(0deg);
	}
}
</style>
</div></header>
           
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">
                    shopping_cart
                    </span> Banana Grocery Store
                </div>
                    <span class="material-icons-outlined" onclick="closeSidebar()">
                close
                </span>
            </div>
        <ul class="sidebar-list">
            <div class="dropdown">
                <button class="sidebar-list-item"><span class="material-icons-outlined"> dashboard</span>Dashboard</span></button>
                   <div class="dropdown-content">
                        <a href="shift_menu.php">Shifts</a>
                        <a href="taxreports.php">Tax Reports</a>
                        <a href="reciepthistory.php">Receipts History</a>
                        <a href="reports.php">Reports</a>
                    </div>  
         </div>
<style>
button.sidebar-list-item {
    background-color:transparent;
}
/* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .button.sidebar-list-item {
    background-color: #3e8e41;
}
</style>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        inventory_2
                        </span> Products
      
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        category
                        </span> Categories
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        groups
                        </span> Customers
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        fact_check
                        </span> Inventory
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        poll 
                        </span> Reports
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">
                        settings
                        </span> Settings
                </li>
            </ul>
        </aside>
 
        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <h2>DASHBOARD</h2>
                </div>

            <div class="main-cards">

                <button class="card">
                    <div class="card-inner">
                        <h3>Total Sales</h3>
                     
                            <span class="material-icons-outlined">
                                bar_chart
                            </span>
            </div>
                    <h1>$12.800.28</h1>
                </button>

                <button class="card">
                    <div class="card-inner">
                        <h3>Total Users</h3>
                        <span class="material-icons-outlined">
                            group
                        </span>

                    </div>
                    <h1>1,350</h1>
                </button>

                <button class="card">
                    <div class="card-inner">
                        <h3>Total Orders</h3>
                        <span class="material-icons-outlined">
                            local_mall
                        </span>
                    </div>
                    <h1>6,754</h1>
                </button>

                <button class="card">
                    <div class="card-inner">
                        <h3>Total Products</h3>
                        <span class="material-icons-outlined">
                            point_of_sales
                            </span>
                    </div>
                    <h1>10,897</h1>
                </button>
                
            </div>
            
            <div class="charts">
            <div class="charts-card">
                <h3 class="chart-title">Banana Grocery Products</h3>
                <div id="bar-chart">

            </div>
            </div>

            <div class="charts-card">
                <h3 class="chart-title">Purchase and Sales Orders</h3>
                <div id="area-chart"></div>
            </div>
            </div>
        </main>
      
        <!-- End Main -->
        
    </div>

    <!-- Scripts -->
    <!-- Apex Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
   
        
</body>
</html>
