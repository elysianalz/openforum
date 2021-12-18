<?php include_once "conn.php"; ?>
<?php
if(isset($_POST["submit"]))
{
  $heading = htmlspecialchars($_POST['heading']);
  $text = htmlspecialchars($_POST['text']);
  $date = htmlspecialchars(date('Y-m-d'));
  $stmt = $conn->prepare("INSERT INTO posts (date, heading, text) VALUES (?,?,?)");
  $stmt->bind_param("sss", $date, $heading, $text);

  if($stmt->execute())
  {
    echo "success";
  } else {
    echo "fail" . $conn->error;
  }
  $stmt->close();
}
?>

<?php include_once "headpartial.php"; ?>
<main class="container-fluid" id="post-form-container">
  <div class="row justify-content-center">
    <form class="post-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="mb-3">
        <label for="heading" class="form-label">Heading</label>
        <input type="text" class="form-control" id="heading" name="heading">
      </div>
      <div class="mb-3">
        <label for="text" class="form-label">Text</label>
        <textarea type="text" class="form-control" id="text" name="text"></textarea>
      </div>
      <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </form>
</div>
</main>
<?php include_once "footpartial.php"; ?>
