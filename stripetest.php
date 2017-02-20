<?php require_once('stripe/config.php'); ?>

<form action="/stripe/charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-name="The F Plus"
          data-email="false"
          data-image="https://thefpl.us/also-made/stickers/s9_thumb.png"
          data-description="3 Roy Orbisons"
          data-locale="auto"
          data-shipping-address="false"
  ></script>
</form>