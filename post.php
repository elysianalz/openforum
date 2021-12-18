<?php include_once "headpartial.php" ?>
<?php include_once "conn.php" ?>
<?php
  $postId = $_GET["postId"];
  $_SESSION["postId"] = $_GET["postId"];
  $sql = "SELECT * FROM posts WHERE postId = '$postId'";
  $result = $conn->query($sql) or die();
?>
<main class="container-fluid" id="post-container">
<?php if($result->num_rows > 0) { ?>
  <?php while($row = $result->fetch_assoc()) { ?>
    <h1><?php echo $row["heading"] ?></h1>
    <p>
      <?php echo $row["postId"] ?>
      <?php echo $row["date"] ?>
    </p>
    <p>
      <?php echo $row["text"] ?>
    </p>
  <?php } ?>
<?php } ?>
<?php include_once "comment.php" ?>
<?php include_once "comment-section.php" ?>
</main>
<?php include_once "footpartial.php" ?>
