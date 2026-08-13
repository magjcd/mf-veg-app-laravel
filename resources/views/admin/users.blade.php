@extends('template.layout')

@section('title', 'Admin Users')

@section('sidebar')
    @parent
@endsection

@section('content')
    <!-- Table Section Main Heading Heading -->
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

        <!-- Full Width Responsive jQuery Table Card Area -->
        <div class="single-table-container">
            <div class="table-card full-width-card">
                <div class="table-header header-purple">
                    <h4>Global Employees Registry</h4>
                    <p>Manage and filter corporate staff logs natively</p>
                </div>

                <div class="table-responsive">
                    <table id="dashboardTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Salary</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Dakota Rice</td>
                                <td>Software Engineer</td>
                                <td>Silicon Valley</td>
                                <td>$136,738</td>
                                <td><span class="badge badge-done">Active</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Minerva Hooper</td>
                                <td>UI/UX Designer</td>
                                <td>London</td>
                                <td>$93,789</td>
                                <td><span class="badge badge-pending">On Leave</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sage Rodriguez</td>
                                <td>Product Manager</td>
                                <td>New York</td>
                                <td>$156,142</td>
                                <td><span class="badge badge-done">Active</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Philip Chaney</td>
                                <td>Data Analyst</td>
                                <td>Tokyo</td>
                                <td>$84,200</td>
                                <td><span class="badge badge-pending">On Leave</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Gretchen Stark</td>
                                <td>DevOps Engineer</td>
                                <td>Berlin</td>
                                <td>$112,500</td>
                                <td><span class="badge badge-done">Active</span></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Amelia Vance</td>
                                <td>HR Specialist</td>
                                <td>Paris</td>
                                <td>$78,900</td>
                                <td><span class="badge badge-done">Active</span></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Marcus Stone</td>
                                <td>QA Engineer</td>
                                <td>Toronto</td>
                                <td>$91,400</td>
                                <td><span class="badge badge-pending">On Leave</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery and DataTables Dependencies -->
    <script src="https://jquery.com"></script>
    <link rel="stylesheet" href="https://datatables.net">
    <script src="https://datatables.net"></script>

    <!-- Initialize DataTable with Full Page Controls Enabled -->
    <script>
        $(document).ready(function() {
            $('#dashboardTable').DataTable({
                responsive: true,
                paging: true,
                /* Ensures page number controllers are enabled */
                pagingType: "full_numbers",
                /* Shows First, Previous, Numbers, Next, and Last controllers */
                pageLength: 5,
                /* Displays 5 rows per index slice by default */
                lengthMenu: ,
                /* Entries dropdown array list */
                searching: true,
                /* Active filter input */
                info: true,
                /* Shows "Showing 1 to X of Y entries" text label */
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Filter records...",
                    paginate: {
                        first: "«",
                        last: "»",
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>

@endsection
