<?php
    session_start();
    include 'database.php';
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Προσθήκη εργασίας</title>
    <link rel="stylesheet" href="assignments.css">
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="main-container">

    <?php
        if (isset($_POST["submit"])) {
            $goals = $_POST["goals"];
            $location = $_POST["location"];
            $deliverables = $_POST["deliverables"];
            $due = $_POST["due"];

            if (empty($goals) OR empty($location) OR empty($deliverables) OR empty($due)) {
                echo "<div style='color: red;'>Παρακαλώ συμπληρώστε όλα τα πεδία</div>";
            }
            else {
                echo "<div style='color: green;'>Επιτυχής προσθήκη</div>";
                $sql = "INSERT INTO projects (goals, location, deliverables, due) VALUES ( ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestatement = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestatement) {
                    mysqli_stmt_bind_param($stmt, "ssss", $goals, $location, $deliverables, $due);
                    mysqli_stmt_execute($stmt);
                }
                else {
                    die("Κάτι πήγε στραβά");
                }
            }
        }
        ?>

        <h2>Συμπληρώστε τα πεδία για ανάρτηση εργασίας</h2>

        

        <form action="addassignment.php" method="post">
            <div class="form-field">
                <label for="goals"">Στόχοι της εργασίας:</label>
                <textarea name="goals" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-field">
                <label for="location">Θέση αρχείου</label>
                <input type="text" name="location">
            </div>
            <div class="form-field">
                <label for="deliverables">Παραδοτέα</label>
                <textarea name="deliverables" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-fiedl">
                <label for="due">Παράδοση εως </label>
                <input type="date" name="due" id="">
            </div>
            <input type="submit" value="Προσθήκη" name="submit" margin-top: 10px;">
        </form>
        <button><a href="homeworktutor.php">Πίσω στις εργασίες</a></button>
    </div>
</body>
</html>