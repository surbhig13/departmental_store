<?php 
include("connect.php");
$q=mysqli_query($con,"select * from item_master where item_status='active'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script> 
  <link href="style.css" rel="stylesheet">
  <title>POS</title>
</head>

<body>
      <div class="wrapper">
        <header> 
          <div class="row">
             <div class="col-2" style='background-color: white; height:100px' ></div>
            <div class='col-8' style='background-color: white;height:100px;'><h2>Daily Need General Store</h2></div>
            <div class='col-2' style='background-color: white;height:100px;'></div>
          </div>
        </header>
      </div>
    
      <div class="main">
       <div class="row">
         <div class="column left" style="background-color:lightsteelblue;">
           <table style="width:100% ;" >
             <tr>
               <th>Description</th>
               <th>Price</th>
               <th>Qty</th>
               <th>Sub Total</th>
             </tr>
           </table>
         </div>

      <div class="column middle" style="background-color:rgb(183, 201, 224);">

        <label for="bar">Barcode/Stock Code/Description</label><br>
          <input type="text" id="bar" name="bar" list='item_list' autofocus autocomplete="off"><br>

        <table style="width: 100%; height: 100px;">

        </table>

      </div>
<datalist id='item_list'>
<?php
  while($data=mysqli_fetch_array($q)){
    extract($data);
    echo "<option>$item_name ($item_code)</option>";
  }
?>
</datalist>
      <div class="column right" style="background-color:lightsteelblue;">
        <div class="row">
          <button class="btn btn-success btn-lg col-12" >Pay</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal">Add Item</button>
          <button class="btn btn-success btn-lg col-12" >View/Modify Items</button>
        </div>
          
        </div>
 
      </div>
    </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form>
           <label for="item_name">Item name:</label><br>
              <input type="text" id="item_name" name="item_name"><br>
           <label for="item_code">Item Code:</label><br>
              <input type="text" id="item_code" name="item_code">
           <label for="item_price">Item Price:</label><br>
              <input type="text" id="item_price" name="item_price">  
          </form>

          <button class="btn btn-success btn-lg float-right" type="save" data-dismiss="modal">Save</button>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    
      <div class="footer"> 
        <div class='row'>
            <div class="col-2">
             <button type="button" class="btn btn-primary">Price Mode</button></div>
            <div class="col-2">
             <button type="button" class="btn btn-primary">Customer</button></div>
            <div class="col-2">
             <button type="button" class="btn btn-primary">Print Last slip</button></div>
            <div class="col-2">
             <button type="button" class="btn btn-primary">Menu</button></div>
            <div class="col-2">
                <button type="button" class="btn btn-primary">Logout</button>
            </div> 
        </div>
        <p style="color:beige; text-align: center;">Copyright 2021 @ONESTOPESOLUTIONS</p>

      </div>      

      <script>
        function myFunction() {
         document.getElementById("myModal").innerHTML = "";
        }
</script>



</body>

</html>