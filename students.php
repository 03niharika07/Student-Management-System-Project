<?php
include "auth.php";
include "config.php";

$search = "";
if (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
    $sql = "SELECT * FROM students 
            WHERE name LIKE ? OR roll_no LIKE ? OR phone LIKE ? OR course LIKE ?
            ORDER BY id DESC";
    $stmt = mysqli_prepare($conn, $sql);
    $likeSearch = "%" . $search . "%";
    mysqli_stmt_bind_param($stmt, "ssss", $likeSearch, $likeSearch, $likeSearch, $likeSearch);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Student Records</h1>

    <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search by name, roll no, phone, course" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <a href="students.php" class="clear-btn">Clear</a>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll No</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Admission Date</th>
            <th>Action</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["roll_no"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["course"]); ?></td>
                    <td><?php echo htmlspecialchars($row["batch"]); ?></td>
                    <td><?php echo htmlspecialchars($row["admission_date"]); ?></td>
                    <td>
                        <a class="edit-btn" href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="delete-btn" href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="9">No records found.</td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
