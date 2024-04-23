<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<?php
include 'database.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM announcements WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Επιτυχής διαγραφή";
    }
    else {
        echo "κατι πηγε στραβα";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαγραφή ανακοίνωσης</title>
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="btn-container">
        <button><a href="announcementtutor.php">Πίσω στις Ανακοινώσεις</a></button>
    </div>
</body>
</html>

