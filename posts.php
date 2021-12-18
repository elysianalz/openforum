<?php include_once "conn.php" ?>
<?php
  $sql = "SELECT postId, date, heading, text FROM posts ORDER BY postId DESC";
  $result = $conn->query($sql) or die();
?>
<main class="container-fluid g-3" id="posts">
  <?php if($result->num_rows > 0) { ?>
    <?php while($row = $result->fetch_assoc()) { ?>

      <div class="card card-style" style ="margin-bottom: 20px;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row["heading"] ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["date"] ?></h6>
          <p class="card-text"><?php echo $row["text"] ?></p>
          <a href="post.php?postId=<?php echo $row["postId"] ?>" class="card-link"><?php echo $row["postId"] ?></a>
        </div>
      </div>

  <?php } ?>
<?php } ?>
</main>
