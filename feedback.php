<?php include 'header.php' ?>

<?php 
  $sql = "SELECT * FROM feedbacks ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);
  $feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> 

<h2 class="text-center my-2 fw-bold">FeedBacks</h2>

<?php if(empty($feedbacks)): ?>
  <p>No Feedbacks Found</p>
<?php endif; ?>

<?php foreach($feedbacks as $feedback): ?>
  <div class="card w-75 my-3 mx-auto shadow-lg">
    <div class="card-body text-center">
      <?php echo $feedback['body'] ?>
      <div class="text-secondary mt-2" style="font-size: 12px;">
        Posted by <b><?php echo ucfirst($feedback['name']) ?></b> on 
        <?php echo $feedback['date_time'] ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php include 'footer.php' ?>
