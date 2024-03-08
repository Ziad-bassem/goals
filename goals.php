<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$sql = "SELECT * FROM user_goals WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>My Goals</title>
</head>

<body>
<<div class="signout-container">
    <a href="signout.php" class="signout-link">Sign Out</a>
</div>

<div id="container">
    <h1>My Goals</h1>
    <form action="insert_goal.php" method="post">
        <label for="cat">Category</label>
        <select name="cat" id="cat">
            <option value="0">Personal</option>
            <option value="1">work</option>
            <option value="2">Other</option>
        </select>
        <label for="text">Goal</label>
        <textarea name="text" id="text"></textarea>
        <label for="goaldate">Date</label>
        <input type="date" id="goaldate" name="goaldate" />

        <button type="submit">Submit Goal</button>
    </form>

    <h2>Incomplete Goals</h2>
    <?php
    while($row = mysqli_fetch_array($result)){
        if($row['goal_complete'] == 0){
            $cat = ($row['goal_category'] == 0) ? "Personal" : (($row['goal_category'] == 1) ? "work" : "Other");
            echo "<div class='goal'>";
            echo "<a href='complete.php?id=" . $row['id'] . "'><button class='btnComplete'>Complete</button></a>";
            echo  $cat . "</strong><p>" . $row['goal_text'] . "</p>Goal Date: " . $row['goal_date'];
            echo "</div>";
        }
    }
    ?>

    <h2>Complete Goals</h2>
    <?php
    mysqli_data_seek($result, 0);
    while($row = mysqli_fetch_array($result)){
        if($row['goal_complete'] != 0){
            $cat = ($row['goal_category'] == 0) ? "Personal" : (($row['goal_category'] == 1) ? "work" : "Other");
            echo "<div class='goal'>";
            echo "<a href='delete.php?id=" . $row['id'] . "'><button class='btnDelete'>Delete</button></a>";
            echo  $cat . "</strong><p>" . $row['goal_text'] . "</p>Goal Date: " . $row['goal_date'];
            echo "</div>";
        }
    }
    ?>
</div>
</body>
</html>

<?php
mysqli_close($link);
?>
