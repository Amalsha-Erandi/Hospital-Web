<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospitals - Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />  
</head>
<body>
    <nav class="top-nav">
        <div class="logo">
            <h1>Care Compass</h1>
        </div>
        <div class="user-profile">
            <span>Admin</span>
        </div>
    </nav>

   <div class="container">
    <nav class="side-nav">
        <ul class="nav-items">
            <li class="nav-item"><a href="admin.php">Dashboard</a></li>
            <li class="nav-item"><a href="manage_staff.php">Manage Staff </a></li>
            <li class="nav-item"><a href="manage_doctors.php">Manage Doctors </a></li>
            <li class="nav-item"><a href="AppoinmentManage.php">Appointments</a></li>
            <li class="nav-item"><a href="admin_feedback_queries.php">Feedback & Queries</a></li>
            
        </ul>
    </nav>

        <main class="main-content">
            <div class="dashboard-grid">
                <div class="stat-card">
                    <h3>Total Patients</h3>
                    <div class="stat-value">1,234</div>
                </div>
                <div class="stat-card">
                    <h3>Today's Appointments</h3>
                    <div class="stat-value">45</div>
                </div>
            </div>
            <section>
                <h2>Recent Registrations</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>Nimal</td>
                            <td>General Checkup</td>
                            <td>2025-02-19</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
