{{-- <p>Welcome to the admin dashboard! {!! auth()->user()->name !!}</p> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Admin Dashboard</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}

    <style>
        :root {
            --bg-main: #eee;
            --card-bg: #ffffff;
            --text-main: #3c4858;
            --text-muted: #999999;

            /* Brand Accent Colors */
            --purple: #9c27b0;
            --orange: #ff9800;
            --green: #4caf50;
            --red: #f44336;
            --blue: #00bcd4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
            width: 100%;
            overflow-x: hidden;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background-color: #fff;
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 100;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 1.1rem;
            font-weight: bold;
            border-bottom: 1px solid #eee;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--text-main);
            text-decoration: none;
            font-size: 0.9rem;
            border-radius: 3px;
            transition: all 0.2s;
        }

        .sidebar-menu li.active a {
            background-color: var(--purple);
            color: #fff;
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
        }

        .sidebar-menu li a:hover:not(.active) {
            background-color: rgba(200, 200, 200, 0.2);
        }

        /* --- MAIN CONTENT AREA (Forced to fill 100% remaining width) --- */
        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            width: calc(100% - 260px);
            min-width: 0;
            transition: margin-left 0.3s, width 0.3s;
        }

        /* --- NAVBAR --- */
        .navbar {
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            width: 100%;
        }

        .navbar-brand-title {
            font-size: 1.2rem;
            color: #555;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper input {
            padding: 6px 12px;
            border: none;
            border-bottom: 1px solid #aaa;
            background: transparent;
            outline: none;
            font-size: 0.9rem;
        }

        .hamburger {
            display: none;
            background: #fff;
            border: none;
            font-size: 1.4rem;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 50%;
            box-shadow: 0 4px 18px 0px rgba(0, 0, 0, 0.12);
        }

        /* --- MAIN DASHBOARD BODY (Forced to stretch edge-to-edge) --- */
        .dashboard-body {
            padding: 20px 30px 30px 30px;
            display: flex;
            flex-direction: column;
            gap: 40px;
            width: 100%;
            align-items: stretch;
            /* Forces all child elements to expand to 100% width */
        }

        /* --- UPPER METRIC CARDS --- */
        .metrics-grid {
            display: flex;
            flex-direction: row;
            gap: 25px;
            width: 100%;
        }

        .metric-card {
            background-color: var(--card-bg);
            border-radius: 6px;
            padding: 15px 20px;
            position: relative;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
            flex: 1;
            /* Divides the full width perfectly between cards */
            min-width: 0;
        }

        .metric-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 10px;
        }

        .metric-icon {
            width: 55px;
            height: 55px;
            border-radius: 3px;
            margin-top: -30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14);
        }

        .bg-orange {
            background: var(--orange);
            box-shadow: 0 4px 20px 0 rgba(255, 152, 0, 0.4);
        }

        .bg-green {
            background: var(--green);
            box-shadow: 0 4px 20px 0 rgba(76, 175, 80, 0.4);
        }

        .bg-red {
            background: var(--red);
            box-shadow: 0 4px 20px 0 rgba(244, 67, 54, 0.4);
        }

        .bg-blue {
            background: var(--blue);
            box-shadow: 0 4px 20px 0 rgba(0, 188, 212, 0.4);
        }

        .metric-info {
            text-align: right;
        }

        .metric-info p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .metric-info h3 {
            font-size: 1.4rem;
            font-weight: 300;
            margin-top: 5px;
        }

        .metric-footer {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* --- CHARTS GRID SECTION --- */
        .charts-grid {
            display: flex;
            flex-direction: row;
            gap: 25px;
            width: 100%;
        }

        .chart-card {
            background-color: var(--card-bg);
            border-radius: 6px;
            padding: 15px 20px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
            flex: 1;
            /* Splits the remaining horizontal layout space evenly */
            min-width: 0;
        }

        .chart-visual {
            height: 160px;
            border-radius: 4px;
            margin-top: -35px;
            margin-bottom: 15px;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            padding: 15px;
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14);
            width: 100%;
        }

        .chart-visual.green-chart {
            background: linear-gradient(60deg, #66bb6a, #43a047);
            box-shadow: 0 4px 20px 0 rgba(76, 175, 80, 0.4);
        }

        .chart-visual.orange-chart {
            background: linear-gradient(60deg, #ffa726, #fb8c00);
            box-shadow: 0 4px 20px 0 rgba(255, 152, 0, 0.4);
        }

        .chart-visual.red-chart {
            background: linear-gradient(60deg, #ef5350, #e53935);
            box-shadow: 0 4px 20px 0 rgba(244, 67, 54, 0.4);
        }

        .chart-bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            justify-content: flex-end;
            flex: 1;
        }

        .chart-bar {
            width: 6px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 3px;
        }

        .chart-label {
            font-size: 0.65rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 5px;
        }

        .chart-details h4 {
            font-size: 1rem;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .chart-details p {
            font-size: 0.85rem;
            color: var(--text-muted);
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 10px;
        }

        .chart-footer {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* --- MOBILE RESPONSIVE MEDIA QUERIES --- */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .hamburger {
                display: block;
            }

            .metrics-grid,
            .charts-grid {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar Navigation Menu -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">Creative Tim</div>
        <ul class="sidebar-menu">
            <li class="active"><a href="#">📊 Dashboard</a></li>
            <li><a href="#">👤 User Profile</a></li>
            <li><a href="#">📋 Table List</a></li>
            <li><a href="#">✏️ Typography</a></li>
            <li><a href="#">🎨 Icons</a></li>
            <li><a href="#">📍 Maps</a></li>
            <li><a href="#">🔔 Notifications</a></li>
        </ul>
    </aside>

    <!-- Main Application Wrapper -->
    <div class="main-content">

        <!-- Top Header Navigation -->
        <header class="navbar">
            <div style="display: flex; align-items: center; gap: 15px;">
                <button class="hamburger" id="hamburger-btn">☰</button>
                <h1 class="navbar-brand-title">Material Dashboard</h1>
            </div>
            <div class="navbar-right">
                <div class="search-wrapper">
                    <input type="text" placeholder="Search...">
                </div>
                <div style="cursor: pointer; font-size: 1.2rem;">🔔</div>
                <div style="cursor: pointer; font-size: 1.2rem;">👤</div>
            </div>
        </header>

        <!-- Main Section Body -->
        <main class="dashboard-body">

            <!-- Top Layer Info Status Cards -->
            <div class="metrics-grid">

                <!-- Box 1 -->
                <div class="metric-card">
                    <div class="metric-header">
                        <div class="metric-icon bg-orange">🗄️</div>
                        <div class="metric-info">
                            <p>Used Space</p>
                            <h3>49/50 <span style="font-size:0.8rem">GB</span></h3>
                        </div>
                    </div>
                    <div class="metric-footer">
                        <span style="color:var(--red)">⚠️</span> Get More Space...
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="metric-card">
                    <div class="metric-header">
                        <div class="metric-icon bg-green">💵</div>
                        <div class="metric-info">
                            <p>Revenue</p>
                            <h3>$34,245</h3>
                        </div>
                    </div>
                    <div class="metric-footer">
                        📅 Last 24 Hours
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="metric-card">
                    <div class="metric-header">
                        <div class="metric-icon bg-red">ℹ️</div>
                        <div class="metric-info">
                            <p>Fixed Issues</p>
                            <h3>75</h3>
                        </div>
                    </div>
                    <div class="metric-footer">
                        🛠️ Tracked from Github
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="metric-card">
                    <div class="metric-header">
                        <div class="metric-icon bg-blue">🐦</div>
                        <div class="metric-info">
                            <p>Followers</p>
                            <h3>+245</h3>
                        </div>
                    </div>
                    <div class="metric-footer">
                        🔄 Just Updated
                    </div>
                </div>

            </div>

            <!-- Graph and Analytics Cards Section -->
            <div class="charts-grid">

                <!-- Graph Column 1 -->
                <div class="chart-card">
                    <div class="chart-visual green-chart">
                        <!-- Pure CSS Simulated Analytics Bars -->
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 45%;"></div><span class="chart-label">M</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 30%;"></div><span class="chart-label">T</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 55%;"></div><span class="chart-label">W</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 40%;"></div><span class="chart-label">T</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 75%;"></div><span class="chart-label">F</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 60%;"></div><span class="chart-label">S</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 90%;"></div><span class="chart-label">S</span>
                        </div>
                    </div>
                    <div class="chart-details">
                        <h4>Daily Sales</h4>
                        <p><span style="color:var(--green); font-weight:bold;">↑ 55%</span> increase in today sales.</p>
                    </div>
                    <div class="chart-footer">🕒 updated 4 minutes ago</div>
                </div>

                <!-- Graph Column 2 -->
                <div class="chart-card">
                    <div class="chart-visual orange-chart">
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 40%;"></div><span class="chart-label">J</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 50%;"></div><span class="chart-label">F</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 35%;"></div><span class="chart-label">M</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 70%;"></div><span class="chart-label">A</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 60%;"></div><span class="chart-label">M</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 85%;"></div><span class="chart-label">J</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 45%;"></div><span class="chart-label">J</span>
                        </div>
                    </div>
                    <div class="chart-details">
                        <h4>Email Subscriptions</h4>
                        <p>Last Campaign Performance</p>
                    </div>
                    <div class="chart-footer">🕒 campaign sent 2 days ago</div>
                </div>

                <!-- Graph Column 3 -->
                <div class="chart-card">
                    <div class="chart-visual red-chart">
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 80%;"></div><span class="chart-label">12a</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 50%;"></div><span class="chart-label">3p</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 40%;"></div><span class="chart-label">6p</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 35%;"></div><span class="chart-label">9p</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 35%;"></div><span class="chart-label">12p</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 30%;"></div><span class="chart-label">3a</span>
                        </div>
                    </div>
                    <div class="chart-details">
                        <h4>Completed Tasks</h4>
                        <p>Last Campaign Performance</p>
                    </div>
                    <div class="chart-footer">🕒 campaign sent 2 days ago</div>
                </div>

            </div>
        </main>
    </div>

    <!-- 3. Sidebar Responsive Menu Script Trigger -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const sidebar = document.getElementById('sidebar');

        hamburgerBtn.addEventListener('click', (e) => {
            sidebar.classList.toggle('active');
            e.stopPropagation();
        });

        // Close menu when clicking outside on mobile devices
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>

</html>
