


<?php
require_once ("Reviews.php");

$title = isset($_POST['Title']) ? $_POST['Title'] : "";
$Comment = isset($_POST['review_body']) ? $_POST['review_body'] : "";


$sql = "INSERT INTO reviews(Title, review_body) VALUES (?,?)";

$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}

echo $result;
?>
