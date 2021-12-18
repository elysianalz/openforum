<?php
  $sql = "SELECT DISTINCT c.commentId, c.postId, c.text, c.date FROM comments c, posts p WHERE c.postId = p.postId AND p.postId = '$_SESSION[postId]'";
  $results = $conn->query($sql) or die();
?>
<section class="container-fluid">
  <?php if($results->num_rows > 0) { ?>
    <?php while($row = $results->fetch_assoc()) { ?>
      <p>
        <span style="color:gray; text-decoration: underline; margin-right: 10px;"><?php echo $row["commentId"];?></span>
        <?php  echo $row["text"]; ?>
      </p>
    <?php } ?>
  <?php } ?>
</section>
