<?php
include "auth.php";
include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $roll_no = trim($_POST["roll_no"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $batch = trim($_POST["batch"]);
    $address = trim($_POST["address"]);
    $admission_date = trim($_POST["admission_date"]);

    $sql = "INSERT INTO students (name, roll_no, email, phone, course, batch, address, admission_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $roll_no, $email, $phone, $course, $batch, $address, $admission_date);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Student added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Add Student</h1>

    <?php if ($message != "") { ?>
        <p class="success"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" class="form-box-main" onsubmit="return validateStudentForm()">
        <label>Student Name</label>
        <input type="text" name="name" id="name" placeholder="Enter student name">

        <label>Roll Number</label>
        <input type="text" name="roll_no" id="roll_no" placeholder="Enter roll number">

        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email">

        <label>Phone</label>
        <input type="text" name="phone" id="phone" placeholder="Enter 10 digit phone number">

        <label>Course</label>
        <input type="text" name="course" id="course" placeholder="Enter course">

        <label>Batch</label>
        <input type="text" name="batch" id="batch" placeholder="Enter batch">

        <label>Address</label>
        <textarea name="address" id="address" placeholder="Enter address"></textarea>

        <label>Admission Date</label>
        <input type="date" name="admission_date" id="admission_date">

        <button type="submit">Add Student</button>
        <p id="formMessage"></p>
    </form>
</div>

<script src="assets/script.js"></script>
</body>
</html>
