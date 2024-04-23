<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<?php 
include 'database.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $loginame = $row['loginame'];
    $role = $row['role'];
    if (isset($_POST['submit'])) {
        $firstname = $_POST['fn'];
        $lastname = $_POST['ln'];
        $loginame = $_POST['email'];
        $role = $_POST['role'];

        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', loginame='$loginame', role='$role'  WHERE id=$id";
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
    <title>Επεξεργασία χρήστη</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <h2>Επεξεργασία χρήστη</h2>
    <form action="" method="post">
            <div class="form-field">
                <label for="fn">Όνομα</label>
                <input type="text" name="fn" value="<?php echo $firstname;?>">
            </div>
            <div class="form-field">
                <label for="ln">Επώνυμο</label>
                <input type="text" name="ln" value="<?php echo $lastname;?>">
            </div>
            <div class="form-field">
                <label for="email">Loginame</label>
                <input type="email" name="email" value="<?php echo $loginame;?>">
            </div>
            <div class="form-field">
                <label for="role">Ρόλος</label>
                <select name="role" id="role">
                    <option value="tutor">Tutor</option>
                    <option value="student">Student</option>
                </select>
            </div> 
            <div class="form-field">
                <input type="submit" value="Επεξεργασία" name="submit">
            </div>
        </form>
        <h3><a href="users.php">Πίσω</a></h3>
</body>
</html>