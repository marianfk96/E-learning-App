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
    <title>Αρχική σελίδα</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><a href="indextutor.php">Αρχική σελίδα</a></h1>
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
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente officia aliquid numquam tempore animi natus ab ut quaerat, nostrum placeat sit mollitia? Nostrum esse facere, architecto voluptatibus, modi corporis rem officiis soluta quos, nemo at. Modi quia iure voluptatem neque quos quidem aperiam voluptate dolorem vero officia explicabo incidunt maxime quasi nobis adipisci harum at odio quibusdam in, reprehenderit eaque sapiente sequi aut impedit? Perspiciatis blanditiis voluptates laborum nemo fugiat iure, accusantium quidem dignissimos fugit sed voluptatum ipsum. Nisi animi sit ad nemo voluptate molestias asperiores rerum, iste earum, deleniti qui fuga eius blanditiis sunt, sed enim est ut ipsa.</p>
            <div class="image-container">
                <img src="labrador.jpg" alt="yellow lab in nature">
            </div>
        </div>
    </div>
</body>
</html>