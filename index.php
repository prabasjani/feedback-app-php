
<?php include 'header.php'; ?>

<?php
  $name = $email = $body = '';
  $nameError = $emailError = $bodyError = '';
  
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // validate name
    if (empty($_POST['name'])) {
      $nameError = "Name is Required!";
    } else{
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    // validate email
    if (empty($_POST['email'])) {
      $emailError = "Email is Required!";
    } else{
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    // validate body
    if (empty($_POST['body'])) {
      $bodyError = "Feedback is Required!";
    } else{
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    // Add to Database
    if (empty($nameError) && empty($emailError) && empty($bodyError)) {
      $statement = $pdo->prepare("INSERT INTO feedbacks(name, email, body) VALUES(:name,:email, :body)");
      $statement->bindValue(':name', $name);  // named variables :name, :email, :body
      $statement->bindValue(':email', $email);
      $statement->bindValue(':body', $body);
      $statement->execute();
      header("Location: feedback.php");
    }
  }
?>
  <div class="container">

    <div class="logo d-flex justify-content-center mt-4">
      <img src="logo.png" alt="" class="w-25 ">
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="px-5">
      <div class="mb-2">
        <label for="formInput" class="form-label fw-bold">Name: </label>
        <input type="text" class="form-control shadow <?php echo $nameError ? 'is-invalid': null; ?>" name="name" id="formInput" placeholder="Enter Your Name..." value="<?php echo $name ?>">
        <div class="invalid-feedback">
          <?php echo $nameError; ?>
        </div>
      </div>
      <div class="mb-2">
        <label for="formInput" class="form-label fw-bold">Email: </label>
      <input type="email" class="form-control shadow <?php echo $emailError ? 'is-invalid': null; ?>" name="email" id="formInput" placeholder="Enter Your Email..." value="<?php echo $email ?>">
      <div class="invalid-feedback">
        <?php echo $emailError; ?>
      </div>
      </div>
      <div class="mb-2">
        <label for="formInput" class="form-label fw-bold">Feedback: </label>
        <textarea name="body" class="form-control shadow <?php echo $bodyError ? 'is-invalid': null; ?>" id="formInput" placeholder="Type your Feedbacks here..." style="resize: none;"><?php echo $body ?></textarea>
        <div class="invalid-feedback">
          <?php echo $bodyError; ?>
        </div>
      </div>
      <input type="submit" value="Submit" name="submit" class="btn btn-primary fw-bold w-100 mt-2">
    </form>
  </div>
<?php include 'footer.php' ?>
