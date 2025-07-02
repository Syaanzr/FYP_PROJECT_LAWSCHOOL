<?php include 'header.php'; ?>
<main>
  <section class="contact-section">
    <div class="contact-box">
      <h2><i class="fas fa-envelope"></i> Get in Touch</h2>
      <p class="subtitle">We’d love to hear from you. Send us your message below.</p>

      <form action="contact_process.php" method="POST" class="contact-form">
        <div class="form-row">
          <label for="name"><i class="fas fa-user"></i> Full Name</label>
          <input type="text" name="name" id="name" required placeholder="Your Name">
        </div>

        <div class="form-row">
          <label for="email"><i class="fas fa-envelope"></i> Email</label>
          <input type="email" name="email" id="email" required placeholder="you@example.com">
        </div>


        <div class="form-row">
          <label for="message"><i class="fas fa-comment-dots"></i> Message</label>
          <textarea name="message" id="message" rows="5" required placeholder="Write your message..."></textarea>
        </div>

        <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Send</button>
      </form>
      <?php if (isset($_GET['status'])): ?>
  <div class="alert <?= $_GET['status'] === 'success' ? 'alert-success' : 'alert-error' ?>">
    <?= $_GET['status'] === 'success' ? '✅ Message sent successfully!' : '❌ Failed to send message. Please fill all fields.' ?>
  </div>
<?php endif; ?>

      
    </div>
  </section>
</main>
<script>
  setTimeout(() => {
    const alertBox = document.querySelector('.alert');
    if (alertBox) {
      alertBox.style.opacity = '0';
      alertBox.style.transition = 'opacity 0.5s ease-out';
      setTimeout(() => alertBox.remove(), 500);
    }
  }, 4000);
</script>

<?php include 'footer.php'; ?>
