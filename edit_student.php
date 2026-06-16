<?php
include "auth.php";
include "config.php";

if (!isset($_GET["id"])) {
    header("Location: students.php");
    exit();
}

$id = $_GET["id"];
$message = "";

$sql = "SELECT * FROM students WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);

if (!$student) {
    header("Location: students.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $roll_no = trim($_POST["roll_no"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $batch = trim($_POST["batch"]);
    $address = trim($_POST["address"]);
    $admission_date = trim($_POST["admission_date"]);

    $updateSql = "UPDATE students SET name=?, roll_no=?, email=?, phone=?, course=?, batch=?, address=?, admission_date=? WHERE id=?";
    $updateStmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ssssssssi", $name, $roll_no, $email, $phone, $course, $batch, $address, $admission_date, $id);

    if (mysqli_stmt_execute($updateStmt)) {
        $message = "Student updated successfully!";

        $student["name"] = $name;
        $student["roll_no"] = $roll_no;
        $student["email"] = $email;
        $student["phone"] = $phone;
        $student["course"] = $course;
        $student["batch"] = $batch;
        $student["address"] = $address;
        $student["admission_date"] = $admission_date;
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Edit Student</h1>

    <?php if ($message != "") { ?>
        <p class="success"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" class="form-box-main" onsubmit="return validateStudentForm()">
        <label>Student Name</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($student['name']); ?>">

        <label>Roll Number</label>
        <input type="text" name="roll_no" id="roll_no" value="<?php echo htmlspecialchars($student['roll_no']); ?>">

        <label>Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($student['email']); ?>">

        <label>Phone</label>
        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($student['phone']); ?>">

        <label>Course</label>
        <input type="text" name="course" id="course" value="<?php echo htmlspecialchars($student['course']); ?>">

        <label>Batch</label>
        <input type="text" name="batch" id="batch" value="<?php echo htmlspecialchars($student['batch']); ?>">

        <label>Address</label>
        <textarea name="address" id="address"><?php echo htmlspecialchars($student['address']); ?></textarea>

        <label>Admission Date</label>
        <input type="date" name="admission_date" id="admission_date" value="<?php echo htmlspecialchars($student['admission_date']); ?>">

        <button type="submit">Update Student</button>
        <p id="formMessage"></p>
    </form>
</div>

<script src="assets/script.js"></script>
</body>
</html>
