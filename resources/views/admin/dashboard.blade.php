@extends('template.layout')

@section('title', 'Home Page')

@section('sidebar')
    @parent
@endsection

@section('content')
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
                            <div class="chart-bar" style="height: 40%;"></div><span class="chart-label">Week 1</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 50%;"></div><span class="chart-label">Week 2</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 35%;"></div><span class="chart-label">Week 3</span>
                        </div>
                        <div class="chart-bar-group">
                            <div class="chart-bar" style="height: 70%;"></div><span class="chart-label">Week 4</span>
                        </div>
                    </div>
                    <div class="chart-details">
                        <h4>Weekly Sales</h4>
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
                        <h4>Monthly Sales</h4>
                        <p>Last Campaign Performance</p>
                    </div>
                    <div class="chart-footer">🕒 campaign sent 2 days ago</div>
                </div>

            </div>





            <!-- Three Inline Responsive Tables Block -->
            <div class="tables-grid">

                <!-- Table 1: Tasks -->
                <div class="table-card">
                    <div class="table-header header-purple">
                        <h4>Tasks Overview</h4>
                        <p>Current internal system logs</p>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Update Core APIs</td>
                                    <td><span class="badge badge-done">Done</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Fix Github Sync</td>
                                    <td><span class="badge badge-pending">Progress</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Database Backup</td>
                                    <td><span class="badge badge-done">Done</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 2: Employee Stats -->
                <div class="table-card">
                    <div class="table-header header-orange">
                        <h4>Employee Stats</h4>
                        <p>New employees on 15th Sept</p>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 3: Regional Sales -->
                <div class="table-card">
                    <div class="table-header header-blue">
                        <h4>Regional Sales</h4>
                        <p>Top performant countries</p>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>USA</td>
                                    <td>2,400</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Germany</td>
                                    <td>1,950</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>UK</td>
                                    <td>1,200</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </main>
    </div>
@endsection
