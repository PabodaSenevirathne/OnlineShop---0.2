<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
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
        success:function(response){
          alert(response);
          if(response == "Login Successful"){
            window.location.reload();
          }
        }
      });
    });
  }


  function saveFormData(){
    $(document).ready(function(){
      var userId = <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : 'null'; ?>;
      var data = {
        userId: userId,
        name: $("#name").val(),
        phone: $("#phone").val(),
        postcode: $("#postcode").val(),
        address: $('#address').val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'connection.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "Checkout Successful"){
            window.location.reload();
          }
        }
      });
    });
  }
</script>