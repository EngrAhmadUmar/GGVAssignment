<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <!-- <button type="button" onload="makePayment()">Pay Now</button> -->
</form>

<?php
$id = $id;
?>

<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK-37c936c6fcb61a873bd1001a67ee6bcd-X",
      tx_ref: '<?php echo $transaction_id;?>',
      amount: '<?php echo $totalprice;?>',
      currency: 'RWF',
      country: 'RW',
      payment_options: "",
      redirect_url: // specified redirect URL
        "<?php echo base_url().'retailer/retry_checkout_status/'.$id;?>",
      
      customer: {
        email: '<?php echo $email;?>',
        phone_number: '<?php echo $buyercontact;?>',
        name: '<?php echo $buyername;?>',
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "MOYA Technology",
        description: "e-Commerce Product Check OUt",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  }
</script>
<body onload="makePayment()"></body>

