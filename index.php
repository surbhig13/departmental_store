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
             <div class="col-2" style='height:100px' >
              <img src='img/pos_logo.png' height='95px;'>
            </div>
            <div class='col-8' style='background-color: white;height:100px;'>
              <h1 style='height: 98%; width:99.7%; display:flex; align-items: center; justify-content: center;color:black;font-weight:bold'>Daily Need General Store</h1>
            </div>
            <div class='col-2' style='height:100px;'>
              <canvas id="canvas" width="100" height="95" style="">
              </canvas>
            </div>
          </div>
        </header>
      </div>
    
      <div class="main">
       <div class="row p-1">
         <div class='col-6' style=''>
         <div class="col-12" style="background-color:lightsteelblue;overflow:auto;height:420px;">
           <table class="table-hover table-condensed" style="width:100%;text-align:center" >
             <tr>
               <th>Description</th>
               <th>Qty</th>
               <th>Price</th>
               <th>Sub Total</th>
             </tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
             <tr><td>1</td><td>1</td><td>1</td><td>1</td></tr>
            </table>
          </div>
          <div class='col-12 border rounded-lg' style='background-color:lightsteelblue;height:50px;'>
            <h3 style='height:50px;display:flex; align-items: center;color:black;font-weight:bold'>TOTAL</h3>
          </div>
         </div>

      <div class="col-4 p-1" style="background-color:rgb(183, 201, 224);">
          <input type="text" id="bar" name="bar" list='item_list' autofocus autocomplete="off" placeholder='Barcode/Stock Code/Description'><br>

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
      <div class="col-2" style="background-color:lightsteelblue;">
        <div class="row">
          <button class="btn btn-success btn-lg col-12" >Pay</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal"  >Add Item</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal1" >View/Modify Items</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal2" >Discount</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal3" >Payment Mode</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal4" >Hold Bill</button>
          <button class="btn btn-success btn-lg col-12" data-toggle="modal" data-target="#myModal5" >Cancel Bill</button>
        </div>
          
        </div>
 
      </div>
    </div>

    <!--add items Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <form id="additemform">
             <label for="item_name">ITEM NAME:</label>
              <input type="text" id="item_name" name="item_name">
            <label for="item_code">ITEM CODE:</label>
              <input type="text" id="item_code" name="item_code">
            <label for="item_price">ITEM PRICE:</label>
              <input type="text" id="item_price" name="item_price">  <br>
          </form>
         
         <div class="btn-group"> 
          <button class="btn btn-success" type="save" data-dismiss="modal" style="width:130px;" onclick="add_items()">Save</button>
       
          <button  class="btn btn-danger" type="button" data-dismiss="modal" style='width:130px;'>Close</button>
      
        </div>
       </div> 
    </div>
  </div>

  <!-- view item Modal -->
<!-- The Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close">&times;</span>
    <table id="tab1">
         <tr>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Item Price</th>
          </tr>
      
</table>
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

function add_items(){
  $.post("add_items.php",$("#additemform").serialize(),function(data, status){
    if(status=="success"){
      document.getElementById("item_list").innerHTML=data;
    }
  });
}
</script>
<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}
function view_items(){
  $.post("view_items.php",$("#tab1").serialize(),function(data, status){
    if(status=="success"){
      document.getElementById("item_list").innerHTML=data;
    }
  });
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

</body>

</html>