<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<?php
    include 'database.php';
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM projects WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $goals = $row['goals'];
    $location = $row['location'];
    $deliverables = $row['deliverables'];
    $due = $row['due'];
    if (isset($_POST['submit'])) {
        $goals = $_POST['goals'];
        $location = $_POST['location'];
        $deliverables = $_POST['deliverables'];
        $due = $_POST['due'];

        $sql = "UPDATE projects SET goals='$goals', location='$location', deliverables='$deliverables', due='$due' WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            echo "Επιτυχής επεξεργασία";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία εργασίας</title>
    <link rel="stylesheet" href="frontpageskeleton.css">
    <link rel="stylesheet" href="assignments.css">
</head>
<body>
    <div class="main-container">
        <h2>Επεξεργασία εργασίας</h2>
        <form action="" method="post">
            <div class="form-field">
                <label for="goals"">Στόχοι της εργασίας:</label>
                <textarea name="goals" id="" cols="30" rows="10"><?php echo $goals;?></textarea>
            </div>
            <div class="form-field">
                <label for="location">Θέση αρχείου</label>
                <input type="text" name="location" value="<?php echo $location;?>">
            </div>
            <div class="form-field">
                <label for="deliverables">Παραδοτέα</label>
                <textarea name="deliverables" id="" cols="30" rows="10"><?php echo $deliverables;?></textarea>
            </div>
            <div class="form-fiedl">
                <label for="due">Παράδοση εως </label>
                <input type="date" name="due" value="<?php echo $due;?>">
            </div>
            <input type="submit" value="Επεξεργασία" name="submit" style="margin-top: 10px;"">
        </form>
        <button><a href="homeworktutor.php">Πίσω στις εργασίες</a></button>
    </div>
</body>
</html>