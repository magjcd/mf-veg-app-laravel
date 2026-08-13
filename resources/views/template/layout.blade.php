<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My App - @yield('title')</title>

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

            .navbar-brand-title {
                display: none;
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






        /* --- TABLES GRID CONTAINER --- */
        .tables-grid {
            display: flex;
            flex-direction: row;
            gap: 25px;
            width: 100%;
        }

        /* Individual Table Card Structure */
        .table-card {
            background-color: var(--card-bg, #ffffff);
            border-radius: 6px;
            padding: 15px 20px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        /* Floating Header Component */
        .table-header {
            border-radius: 4px;
            margin-top: -35px;
            margin-bottom: 15px;
            padding: 15px;
            color: #ffffff;
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14);
        }

        .table-header h4 {
            font-size: 1rem;
            font-weight: 400;
        }

        .table-header p {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Color Accents (Using custom properties fallback values) */
        .header-purple {
            background: linear-gradient(60deg, #ab47bc, #8e24aa);
            box-shadow: 0 4px 20px 0 rgba(156, 39, 176, 0.4);
        }

        .header-orange {
            background: linear-gradient(60deg, #ffa726, #fb8c00);
            box-shadow: 0 4px 20px 0 rgba(255, 152, 0, 0.4);
        }

        .header-blue {
            background: linear-gradient(60deg, #26c6da, #00acc1);
            box-shadow: 0 4px 20px 0 rgba(0, 188, 212, 0.4);
        }

        /* Table Element Responsive Wrapping Rules */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table th {
            color: var(--purple, #9c27b0);
            font-size: 0.9rem;
            font-weight: 400;
            padding: 12px 8px;
            border-bottom: 1px solid #ddd;
        }

        table td {
            padding: 12px 8px;
            font-size: 0.85rem;
            border-bottom: 1px solid #eee;
        }

        table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Table Text Badges */
        .badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            color: #ffffff;
            display: inline-block;
        }

        .badge-done {
            background-color: var(--green, #4caf50);
        }

        .badge-pending {
            background-color: var(--orange, #ff9800);
        }

        /* --- RESPONSIVE INLINE WRAPPING BEHAVIOR --- */
        @media (max-width: 991px) {
            .tables-grid {
                flex-direction: column;
                /* Collapses inline items into vertical blocks */
                gap: 45px;
                /* Adds spacing accommodation for overlapping negative margin values */
            }
        }





        /* jQuery Responsive Table */

        /* --- SECTION HEADING ABOVE TABLE --- */
        .section-title-wrapper {
            width: 100%;
            margin-top: 15px;
            margin-bottom: -15px;
            /* Adjusts layout gap spacing before the card floating header */
        }

        .section-main-heading {
            font-size: 1.4rem;
            font-weight: 300;
            color: var(--text-main, #3c4858);
            margin-bottom: 5px;
        }

        .section-sub-heading {
            font-size: 0.85rem;
            color: var(--text-muted, #999999);
        }

        /* --- FULL WIDTH JQUERY TABLE CARD WORKSPACE --- */
        .single-table-container {
            width: 100%;
            margin-top: 20px;
        }

        .full-width-card {
            background-color: var(--card-bg, #ffffff);
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Floating Component Accent */
        .header-purple {
            background: linear-gradient(60deg, #ab47bc, #8e24aa);
            box-shadow: 0 4px 20px 0 rgba(156, 39, 176, 0.4);
        }

        /* DataTables Internal Layout Control Elements Styling */
        .dataTables_wrapper {
            padding-top: 10px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: none !important;
            border-bottom: 1px solid #aaa !important;
            background: transparent !important;
            padding: 5px 10px !important;
            outline: none !important;
            margin-left: 10px !important;
            font-size: 0.85rem;
            color: var(--text-main, #3c4858);
        }

        .dataTables_wrapper .dataTables_length select {
            border: none !important;
            border-bottom: 1px solid #aaa !important;
            background: transparent !important;
            outline: none !important;
            padding: 3px !important;
            font-size: 0.85rem;
            color: var(--text-main, #3c4858);
        }

        /* Core Table Element Alignment overrides */
        table.dataTable {
            width: 100% !important;
            margin-top: 20px !important;
            margin-bottom: 20px !important;
            border-collapse: collapse !important;
        }

        table.dataTable thead th {
            color: var(--purple, #9c27b0) !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            border-bottom: 1px solid #ddd !important;
            padding: 12px 10px !important;
        }

        table.dataTable tbody td {
            padding: 12px 10px !important;
            font-size: 0.85rem !important;
            border-bottom: 1px solid #eee !important;
        }

        table.dataTable tbody tr:hover {
            background-color: #f9f9f9 !important;
        }

        /* --- THEMED JQUERY PAGE NUMBER CONTROLLERS (PAGINATION) --- */
        .dataTables_wrapper .dataTables_paginate {
            padding-top: 15px !important;
            display: flex !important;
            gap: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: 1px solid #ddd !important;
            border-radius: 4px !important;
            padding: 5px 10px !important;
            background: #ffffff !important;
            color: var(--text-main, #3c4858) !important;
            font-size: 0.8rem !important;
            transition: all 0.2s ease;
        }

        /* Active Page Number Controller state */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--purple, #9c27b0) !important;
            color: #ffffff !important;
            border: 1px solid var(--purple, #9c27b0) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled) {
            background: #eeeeee !important;
            color: #000000 !important;
            border: 1px solid #ccc !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: #bbb !important;
            border: 1px solid #eee !important;
            cursor: not-allowed !important;
        }

        .dataTables_wrapper .dataTables_info {
            font-size: 0.8rem !important;
            color: var(--text-muted, #999999) !important;
            padding-top: 20px !important;
        }
    </style>
</head>

<body class="main-content">
    <aside>
        @section('sidebar')
            <!-- Sidebar Navigation Menu -->
            <aside class="sidebar" id="sidebar">
                <div class="sidebar-brand">Creative Tim</div>
                <ul class="sidebar-menu">
                    <li class="active"><a href="{{ route('dashboard') }}">📊 Dashboard</a></li>
                    <li><a href="{{ route('users') }}">👤 User Profile</a></li>
                    <li><a href="#">📋 Table List</a></li>
                    <li><a href="#">✏️ Typography</a></li>
                    <li><a href="#">🎨 Icons</a></li>
                    <li><a href="#">📍 Maps</a></li>
                    <li><a href="#">🔔 Notifications</a></li>
                    <li><a href="{{ route('logout') }}">🔔 Logout</a></li>
                </ul>
            </aside>
        @show
    </aside>

    <div>
        <div>
            @yield('content')
        </div>
    </div>

    <footer style="padding: 20px; text-align: center; background-color: #f5f5f5; color: var(--text-muted, #999999);">
        <p>© 2026 My App</p>
    </footer>


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
