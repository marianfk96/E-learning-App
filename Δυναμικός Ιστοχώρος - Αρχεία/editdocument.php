<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<?php
    include 'database.php';
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM documents WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $description = $row['description'];
    $location = $row['location'];
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $location = $_POST['location'];

        $sql = "UPDATE documents SET title='$title', description='$description', location='$location' WHERE id=$id";
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
    <title>Επεξεργασία εγγράφου</title>
    <link rel="stylesheet" href="assignments.css">
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="main-container">
        <h2>Επεξεργασία εγγράφου</h2>
        <form action="" method="post">
            <div class="form-field">
                <label for="title"">Τίτλος Εγγράφου:</label>
                <input type="text" name="title" value="<?php echo $row['title'];?>">
            </div>
            <div class="form-field">
                <label for="description">Περιγραφή αρχείου</label>
                <textarea name="description" id="" cols="30" rows="10"><?php echo $row['description'];?></textarea>
            </div>
            <div class="form-field">
                <label for="location">Θέση αρχείου</label>
                <input type="text" name="location" value="<?php echo $row['location'];?>">
            </div>
            <input type="submit" value="Επεξεργασία" name="submit" style="margin-top: 10px;"">
            </form>
        <button><a href="documentstutor.php">Πίσω στα Έγγραφα μαθήματος</a></button>
    </div>
</body>
</html>