<?php
include "auth.php";
include "config.php";

$totalStudentsQuery = "SELECT COUNT(*) AS total FROM students";
$totalStudentsResult = mysqli_query($conn, $totalStudentsQuery);
$totalStudents = mysqli_fetch_assoc($totalStudentsResult)["total"];

$totalCoursesQuery = "SELECT COUNT(DISTINCT course) AS total_courses FROM students";
$totalCoursesResult = mysqli_query($conn, $totalCoursesQuery);
$totalCourses = mysqli_fetch_assoc($totalCoursesResult)["total_courses"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Student Management System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome to Student Management System admin dashboard.</p>

    <div class="cards">
        <div class="card">
            <h2><?php echo $totalStudents; ?></h2>
            <p>Total Students</p>
        </div>

        <div class="card">
            <h2><?php echo $totalCourses; ?></h2>
            <p>Total Courses</p>
        </div>
    </div>

    <div class="info-box">
        <h3>Project Modules</h3>
        <ul>
            <li>Admin Login</li>
            <li>Add Student</li>
            <li>View/Search Students</li>
            <li>Edit Student Details</li>
            <li>Delete Student Record</li>
            <li>MySQL Database Connectivity</li>
        </ul>
    </div>
</div>

</body>
</html>
