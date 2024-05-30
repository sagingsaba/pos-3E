<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Time Tracker</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        text-align: center;
    }
    button {
        padding: 10px 20px;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
    }
    #clock {
        font-size: 24px;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Time Tracker</h1>
    <div id="clock">Clock Display</div>
    <button id="clockInBtn">Clock In</button>
    <button id="clockOutBtn">Clock Out</button>
    <button id="logoutBtn">Log Out</button>
</div>
<script>
    // JavaScript for clock in and clock out functionality
    const clockInBtn = document.getElementById('clockInBtn');
    const clockOutBtn = document.getElementById('clockOutBtn');
    const clockDisplay = document.getElementById('clock');
    const logoutBtn = document.getElementById('logoutBtn');

    let clockedIn = false;
    let startTime, endTime;

    clockInBtn.addEventListener('click', () => {
        if (!clockedIn) {
            startTime = new Date();
            clockedIn = true;
            clockDisplay.textContent = 'Clocked In at ' + formatTime(startTime);
        }
    });

    clockOutBtn.addEventListener('click', () => {
        if (clockedIn) {
            endTime = new Date();
            clockedIn = false;
            clockDisplay.textContent = 'Clocked Out at ' + formatTime(endTime);
        }
    });

    function formatTime(time) {
        return time.toLocaleTimeString('en-US', { hour12: false });
    }

    // Dummy logout functionality
    logoutBtn.addEventListener('click', () => {
        alert('Logged Out');
        // You can redirect to a logout page or clear session data here
    });
</script>
</body>
</html>
