<?php
session_start();
include_once 'database.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Έγγραφα μαθήματος</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="documents-styles.css">
</head>
<body>
    <header>
        <h1><a href="documents.php">Έγγραφα μαθήματος</a></h1>
    </header>
    <div class="site-content">
        <nav class="nav-container">
            <button class="btn"><a href="index.php">Αρχική σελίδα</a></button>
            <button class="btn"><a href="announcement.php">Ανακοινώσεις</a></button>
            <button class="btn"><a href="communication.php">Επικοινωνία</a></button>
            <button class="btn"><a href="documents.php">Έγγραφα μαθήματος</a></button>
            <button class="btn"><a href="homework.php">Εργασίες</a></button>
            <button class="logout"><a href="register.php">Logout</a></button>
        </nav>
        <div class="main-container">
            <?php
            $sql = "SELECT * FROM documents;";
            $result = mysqli_query($conn, $sql);
            /* checking if we have anything saved in the database. if not i will get an error when trying to display the data*/
            $resultsCheck = mysqli_num_rows($result);
            if ($resultsCheck==null) {
                echo "Δεν υπάρχουν έγγραφα";
            }
            ?>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <h2><?php echo $row['title'];?></h2>
            <div class="documents-container">
                <p><i>Περιγραφή: </i><?php echo $row['description'];?></p>
                <a href="<?php echo $row['location'];?>">Download</a>
            </div>
            <?php endwhile ?>
            <button class="top"><a href="documents.php">&lt;top&gt;</a></button>
        </div>
    </div>
</body>
</html>