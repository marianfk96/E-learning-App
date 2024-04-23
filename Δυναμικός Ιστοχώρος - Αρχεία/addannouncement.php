<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Προσθήκη ανακοίνωσης</title>
    <link rel="stylesheet" href="frontpageskeleton.css">
    <link rel="stylesheet" href="assignments.css">
</head>
<body>
    <div class="main-container">
        <?php  
        if (isset($_POST["submit"])) {
            $date = $_POST["date"];
            $theme = $_POST["theme"];
            $maintext = $_POST["maintext"];

            if (empty($date) OR empty($theme) OR empty($maintext)) {
                echo "<div style='color: red;'>Παρακαλώ συμπληρώστε όλα τα πεδία</div>";
            }
            else {
                echo "<div style='color: green;'>Επιτυχής προσθήκη</div>";
                require_once "database.php";
                $sql = "INSERT INTO announcements (date, theme, maintext) VALUES ( ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestatement = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestatement) {
                    mysqli_stmt_bind_param($stmt, "sss", $date, $theme, $maintext);
                    mysqli_stmt_execute($stmt);
                }
                else {
                    die("Κάτι πήγε στραβά");
                }
            }    
        }
        ?>
        <h2>Προσθήκη ανακοίνωσης</h2>
        <form action="addannouncement.php" method="post">
            <div class="form-field">
                <input type="date" name="date" id="">
            </div>
            <div class="form-field">
                <label for="theme">Θέμα</label>
                <textarea name="theme" id="" cols="100" rows="2"></textarea>
            </div>
            <div class="form-field">
                <label for="maintext">Κείμενο</label>
                <textarea name="maintext" id="" cols="100" rows="20"></textarea>
            </div>
            <div class="form-field">
                <input type="submit" value="Προσθήκη" name="submit">
            </div>
        </form>
        <button><a href="announcementtutor.php">Πίσω στις Ανακοινώσεις</a></button>
    </div>
    
</body>
</html>