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
        <h1><a href="documentstutor.php">Έγγραφα μαθήματος</a></h1>
    </header>
    <div class="site-content">
        <nav class="nav-container">
            <button class="btn"><a href="indextutor.php">Αρχική σελίδα</a></button>
            <button class="btn"><a href="announcementtutor.php">Ανακοινώσεις</a></button>
            <button class="btn"><a href="communicationtutor.php">Επικοινωνία</a></button>
            <button class="btn"><a href="documentstutor.php">Έγγραφα μαθήματος</a></button>
            <button class="btn"><a href="homeworktutor.php">Εργασίες</a></button>
            <button class="btn"><a href="users.php">Χρήστες</a></button>
            <button class="logout"><a href="register.php">Logout</a></button>
        </nav>
        <div class="main-container">
            <h3><a style="margin-left: 10px;" href="adddocument.php">Προσθήκη νέου εγγράφου</a></h3>

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
            <?php $id = $row['id'];?>
            <a style="margin-left: 10px;" href="editdocument.php?updateid=<?php echo $id?>">Επεξεργασία</a>
            <a style="margin-left: 10px;" href="deletedocument.php?deleteid=<?php echo $id?>">Διαγραφή</a>
            <div class="documents-container">
                <p><i>Περιγραφή: </i><?php echo $row['description'];?></p>
                <a href="<?php echo $row['location'];?>">Download</a>
            </div>
            <?php endwhile ?>
            <button class="top"><a href="documentstutor.php">&lt;top&gt;</a></button>
        </div>
    </div>
</body>
</html>