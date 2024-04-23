<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<?php
    include 'database.php';
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM announcements WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $date = $row['date'];
    $theme = $row['theme'];
    $maintext = $row['maintext'];
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $theme = $_POST['theme'];
        $maintext = $_POST['maintext'];

        $sql = "UPDATE announcements SET date='$date', theme='$theme', maintext='$maintext' WHERE id=$id";
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
    <title>Επεξεργασία ανακοίνωσης</title>
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="main-container">
    <h2>Επεξεργασία ανακοίνωσης</h2>
        <form action="" method="post">
            <div class="form-field">
                <input type="date" name="date" id="" value="<?php echo $date;?>">
            </div>
            <div class="form-field">
                <textarea name="theme" id="" cols="100" rows="2" ><?php echo $theme;?></textarea>
            </div>
            <div class="form-field">
                <textarea name="maintext" id="" cols="100" rows="20"><?php echo $maintext;?></textarea>
            </div>
            <div class="form-field">
                <input type="submit" value="Επεξεργασία" name="submit" style="margin-top: 10px;">
            </div>
        </form>
        <button><a href="announcementtutor.php">Πίσω στις Ανακοινώσεις</a></button>
    </div>
</body>
</html>