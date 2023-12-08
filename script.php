<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData() {
    $(document).ready(function() {
      var data = {
        name: $("#name").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        role: $('#role').val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'connection.php',
        type: 'post',
        data: data,
        success: function(response) {
          alert(response);
          if (response == "Login Successful") {
            window.location.reload();
          }
        }
      });
    });
  }

  function saveFormData() {
    $(document).ready(function() {
      var userId = <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : 'null'; ?>;
      var data = {
        userId: userId,
        product1Qty: $("#product1Qty").val(),
        product2Qty: $("#product2Qty").val(),
        product3Qty: $("#product3Qty").val(),
        name: $("#name").val(),
        phone: $("#phone").val(),
        postcode: $("#postcode").val(),
        address: $('#address').val(),
        city: $('#city').val(),
        province: $('#province').val(),
        email: $('#email').val(),
        cname: $('#cname').val(),
        ccnum: $('#ccnum').val(),
        expmonth: $('#expmonth').val(),
        expyear: $('#expyear').val(),
        cvv: $('#cvv').val(),
        password: $('#password').val(),
        confirmPassword: $('#confirmPassword').val(),
        action: $("#action").val(),

      };

      $.ajax({
            url: 'connection.php',
            type: 'post',
            data: data,
            success: function(response) {
                // Parse the JSON response
                var responseData = JSON.parse(response);

                alert(responseData.message);

                if (responseData.message == "Checkout Successful") {
                    // Update receipt with calculated values
                    updateReceipt(data, responseData.calculatedValues);

                }
            }
        });
    });
  }

  // Print the receipt
  function updateReceipt(data, calculatedValues) {

  // Update the #receipt div receipt data
  const receiptDiv = document.getElementById('receipt');
  receiptDiv.innerHTML = `
    <h2>Receipt</h2>
    <h3>Customer Details</h3>
    <p>Name: ${data.name}</p>
    <p>Phone: ${data.phone}</p>
    <p>Postcode: ${data.postcode}</p>
    <p>Address: ${data.address}</p>
    <p>City: ${data.city}</p>
    <p>Province: ${data.province}</p>
    <p>Email: ${data.email}</p>
    <p>Name On Card: ${data.cname}</p>
    <p>Credit Card Number : ${data.ccnum}</p>
    <p>Exp Month: ${data.expmonth}</p>
    <h2>Cart Details</h2>
    <p>Sneakers($8.99) : ${data.product1Qty}</p>
    <p>Hiking boot($29.99): ${data.product2Qty}</p>
    <p>High Heels($19.99) : ${data.product3Qty}</p>
    <h2>Total</h2>
    <p>Total Price: $${Math.round(calculatedValues.totalPrice)}</p>
    <p>Sales Tax: $${Math.round(calculatedValues.salesTax)}</p>
    <p>Total Price with Tax: $${Math.round(calculatedValues.totalPriceWithTax)}</p>
  `;
}

</script>