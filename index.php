
<?php include 'header.php'; ?>
      <div class="logo d-flex justify-content-center mt-4">
        <img src="logo.png" alt="" class="w-25 ">
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="px-5">
        <div class="mb-2">
          <label for="formInput" class="form-label">Name: </label>
          <input type="text" class="form-control" name="name" id="formInput" placeholder="Enter Your Name...">
        </div>
        <div class="mb-2">
          <label for="formInput" class="form-label">Email: </label>
          <input type="email" class="form-control" name="email" id="formInput" placeholder="Enter Your Email...">
        </div>
        <div class="mb-2">
          <label for="formInput" class="form-label">Name: </label>
          <textarea name="body" class="form-control" id="formInput" placeholder="Type your Feedbacks here..." style="resize: none;"></textarea>
        </div>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
      </form>
  <?php include 'footer.php' ?>
