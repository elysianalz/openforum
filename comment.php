<?php
if(isset($_POST["comment"]))
{
  $postId = htmlspecialchars(intval($_SESSION['postId']));
  $text = htmlspecialchars($_POST['comment']);
  $date = htmlspecialchars(date('Y-m-d'));
  $stmt = $conn->prepare("INSERT INTO comments (postId, text, date) VALUES (?,?,?)");
  $stmt->bind_param("iss", $postId, $text, $date);

  if(!$stmt->execute())
  {
    echo "fail" . $conn->error;
  }
  $stmt->close();
  header("location: post.php?postId=$postId");
}
?>
<form class="row g-3" method="post" action="post.php?postId=<?php echo $postId ?>">
  <div class="col">
    <label for="comment" class="visually-hidden">comment</label>
    <input type="text" class="form-control" id="comment" name="comment">
  </div>
  <div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary mb-3" >comment</button>
  </div>
</form>
