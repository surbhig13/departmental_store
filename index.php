<?php 
include("connect.php");
$q=mysqli_query($con,"select * from item_master where item_status='active'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script> 
  <link href="style.css" rel="stylesheet">
  <title>POS</title>
</head>

<body>

  <div class='container-fluid' style='height:100%;background-color:'>
        <header> 
          <div class="row" style='background-color:#b7c9e0;'>
             <div class="col-2" style='height:100px;' >
              <img src='img/logo1.png' height='95px;'>
            </div>
            <div class='col-8' style='height:100px;border:5px white solid'>
              <h1 style='height: 98%; width:99.7%; display:flex; align-items: center; justify-content: center;color:black;font-weight:bold'>DAILY NEED GENERAL STORE</h1>
            </div>
            <div class='col-2' style='height:100px;'>
              <canvas id="canvas" width="100" height="95" style="">
              </canvas>
            </div>
          </div>
        </header>
    
      <div class="main">
       <div class="row">
         <div class='col-6' style='padding:0px;border:2px white solid;'>
         <div class="col-12 mt-1" style="background-color:lightsteelblue;overflow:auto;min-height:90%;max-height:90%;">
           <table class="table-hover table-condensed" style="width:100%;text-align:center" >
             <thead>
             <tr>
               <th>Description</th>
               <th>Qty</th>
               <th>Price</th>
               <th>Amount</th>
             </tr>
             </thead>
             <tbody id="bill_items">
             <input type='hidden' id='bill_id' name='bill_id' value='0'>
             </tbody>
            </table>
          </div>
          <div class='col-12 border rounded-lg' style='background-color:lightsteelblue;height:10%;'>
            <h5 style='height:40px;display:flex;align-items:center;color:black;font-weight:bold'>TOTAL</h5>
          </div>
         </div>

      <div class="col-4" style="background-color:rgb(183, 201, 224);border:2px white solid">
      <div class="col-12 form-group" style='height:10%;'>
        <input class='form-control mt-1' type="text" id="bar" name="bar" list='' autofocus autocomplete="off" placeholder='Barcode/Stock Code/Description'><br>
      </div>
      <div class="col-12" style="background-color:rgb(183, 201, 224);height:80%;overflow:hidden;">
      <table style="width: 100%;"></table>

      </div>
      </div>
<datalist id='item_list'>
<?php
  while($data=mysqli_fetch_array($q)){
    extract($data);
    echo "<option>$item_name ($item_code)</option>";

  }
?>
</datalist>
      <div class="col-2" style="background-color:lightsteelblue;min-height:100%;">
        <div class="row">
          <div class='col-12 mt-1'><button class="btn btn-primary btn-lg col-12" >Save and Print</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal"  >Add Item</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal1" >View/Modify Items</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal2" >Discount</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal3" >Payment Mode</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal4" >Hold Bill</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal5" >Cancel Bill</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal5" >Home</button></div>
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
        <div class='row' style='background-color:lightsteelblue;margin-top:20px;'>
          <div class="col-1">
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-primary col-12">Price Mode</button></div>
          <div class="col-2">
            <button type="button" class="btn btn-primary col-12">Customer</button></div>
          <div class="col-2">
            <button type="button" class="btn btn-primary col-12">Print Last slip</button></div>
          <div class="col-2">
            <button type="button" class="btn btn-primary col-12">Menu</button></div>
          <div class="col-2">
            <button type="button" class="btn btn-primary col-12">Logout</button>
          </div>
          <div class='col-1'>
          </div>
          <div class='col-12' style='margin-top:20px;'>
            <p style="text-align: center;">Copyright 2021 @ONESTOPESOLUTIONS</p>
          </div>
        </div>
        
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
$('#bar').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
		var barcode = document.getElementById("bar").value;
    var bill_id = document.getElementById("bill_id").value;
		$.post("search_items.php","barcode="+barcode+"&bill_id="+bill_id,function(data, status){
			if(status=="success"){
				document.getElementById("bill_items").innerHTML=data;
			}
		});
	}
});

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