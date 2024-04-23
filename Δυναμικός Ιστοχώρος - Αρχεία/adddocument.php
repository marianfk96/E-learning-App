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
    <title>Προσθήκη εγγράφου</title>
    <link rel="stylesheet" href="assignments.css">
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="main-container">

    <?php
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $location = $_POST["location"];

            if (empty($title) OR empty($description) OR empty($location)) {
                echo "<div style='color: red;'>Παρακαλώ συμπληρώστε όλα τα πεδία</div>";
            }
            else {
                echo "<div style='color: green;'>Επιτυχής προσθήκη</div>";
                $sql = "INSERT INTO documents (title, description, location) VALUES ( ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestatement = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestatement) {
                    mysqli_stmt_bind_param($stmt, "sss", $title, $description, $location);
                    mysqli_stmt_execute($stmt);
                }
                else {
                    die("Κάτι πήγε στραβά");
                }
            }
        }
        ?>

        <h2>Συμπληρώστε τα πεδία για ανάρτηση του εγγράφου</h2>

        

        <form action="adddocument.php" method="post">
            <div class="form-field">
                <label for="title"">Τίτλος Εγγράφου:</label>
                <input type="text" name="title">
            </div>
            <div class="form-field">
                <label for="description">Περιγραφή αρχείου</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-field">
                <label for="location">Θέση αρχείου</label>
                <input type="text" name="location">
            </div>
            <input type="submit" value="Προσθήκη" name="submit" style="margin-top: 10px;"">
        </form>
        <button><a href="documentstutor.php">Πίσω στα Έγγραφα μαθήματος</a></button>
    </div>
</body>
</html>