<?php 
include("connect.php");
$q=mysqli_query($con,"select * from item_master where item_status='active' order by item_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script> 
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
  <link href="style.css" rel="stylesheet">
  <title>POS</title>
</head>

<body>

<!-- header-->

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

<!-- table-->    
      <div class="main">
       <div class="row">
         <div class='col-6' style='padding:0px;border:2px white solid;'>
         <div class="table-responsive col-12 mt-1" style="background-color:lightsteelblue;overflow:auto; min-height:90%; max-height:90%;">
           <table class="table-hover table-condensed" style="width:100%;text-align:center;" >
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

<!-- barcode column -->         

      <div class="col-4" style="background-color:rgb(183, 201, 224);border:2px white solid">
      <div class="col-12 form-group" style='height:10%;'>
        <input class='form-control mt-1' type="text" id="bar" name="bar" list='' autofocus autocomplete="off" placeholder='BARCODE / ITEM NAME'><br>
      </div>
      <div class="col-12" style="background-color:rgb(183, 201, 224);height:80%;overflow:auto;">
		<div class="list-group" id="item_list">
		<?php
			while($data=mysqli_fetch_array($q)){
				extract($data);
		?>
				<a class="list-group-item" style="overflow:hidden;color:black;" href="#" onclick="select_item(this.innerHTML);"><?php echo $item_name;?></a>
		<?php 
				}
		?>
		</div>
	  </div>
  </div>


<!-- side buttons -->

      <div class="col-2" style="background-color:lightsteelblue;min-height:100%;">
        <div class="row">
          <div class='col-12 mt-1'><button class="btn btn-primary btn-lg col-12" >Save and Print</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal"  >Add Item</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal1" onclick="fetch_items()"  >View/Modify Items</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal2" >Discount</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal3" >Payment Mode</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal4" >Hold Bill</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal5" >Cancel Bill</button></div>
          <div class='col-12 mt-2'><button class="btn btn-primary btn-lg col-12" data-toggle="modal" data-target="#myModal5" >Home</button></div>
        </div>
        </div>
 
       </div>
     </div>


<!--Add items Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">  
        
        <form class="col-12" id="additemform">
           <div class="form-row mt-3">
             <label class="col-sm-4 col-form-label"  for="item_name">ITEM NAME:</label>
               <input type="text" class="form-control col-sm-8" name="item_name" id="item_name" autocomplete="off" onkeyup="this.value=toTitleCase(this.value)"><br>
            
            <label class="col-sm-4 col-form-label mt-2" for="item_code">ITEM CODE:</label>
              <input type="text" class="form-control col-sm-8 mt-2" id="item_code" name="item_code" autocomplete="off"><br>
              
            <label class="col-sm-4 col-form-label mt-2" for="item_price">ITEM PRICE:</label>
              <input type="text" class="form-control col-sm-8 mt-2" id="item_price" name="item_price" autocomplete="off">  <br><br>

           </div>    
          </form>
      

         <div class="btn-group"> 
          <button class="btn btn-success" type="save" data-dismiss="modal" style="width:130px;" onclick="add_items()">Save</button>
       
          <button  class="btn btn-danger" type="button" data-dismiss="modal" style='width:130px;'>Close</button>
      
        </div>
       </div> 
    </div>
  </div>

 <!-- View item Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style='width:600px;'>  
        <div class="row">
		 <div class="col-12 mt-1" style="">
           <table id="table1" class="table table-hover table-bordered" style="width:100%">
			 <thead>
				<tr>
					<th>Item Name</th>
					<th>Item Code</th>
					<th>Item Price</th>					
				</tr>
			 </thead>
			<tbody id='table1_body'>
			   <tr data-target="#myModal2" data-dismiss="modal" data-toggle="modal" onclick='edit_item(1)'>
				   <td id='item_name1'>Surbhi</td>
				   <td id='item_code1'>1234567890</td>
				   <td id='item_price1'>999.20</td>
			   </tr>
			   <tr data-target="#myModal2" data-dismiss="modal" data-toggle="modal" onclick='edit_item(2)'>
				   <td id='item_name2'>Lovansh</td>
				   <td id='item_code2'>0987654321</td>
				   <td id='item_price2'>202.22</td>
			   </tr>
			</tbody>
		   </table>
		 </div>
		</div>
      </div> 
	</div>
   </div>

   <!-- Edit Item Modal-->

   <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">  
        
        <form class="col-12" id="updateitemform">
           <div class="form-row mt-3">
             <label class="col-sm-4 col-form-label"  for="item_name">ITEM NAME:</label>
               <input type="text" class="form-control col-sm-8" name="edit_item_name" id="edit_item_name" autocomplete="off" onkeyup="this.value=toTitleCase(this.value)"><br>
            
            <label class="col-sm-4 col-form-label mt-2" for="item_code">ITEM CODE:</label>
              <input type="text" class="form-control col-sm-8 mt-2" id="edit_item_code" name="edit_item_code" autocomplete="off"><br>
              
            <label class="col-sm-4 col-form-label mt-2" for="item_price">ITEM PRICE:</label>
              <input type="text" class="form-control col-sm-8 mt-2" id="edit_item_price" name="edit_item_price" autocomplete="off">  <br><br>
              <input type='hidden' id='item_row_id' name='item_row_id' value=''>
           </div>    
          </form>
      

         <div class="btn-group"> 
          <button class="btn btn-success" type="save" data-dismiss="modal" style="width:130px;" onclick="update_items()">Update</button>
       
          <button  class="btn btn-danger" type="button" data-dismiss="modal" style='width:130px;'>Close</button>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Delete</button> 

        </div>
       </div> 
    </div>
  </div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delete_item()">YES</button>
      </div>
    </div>
  </div>
</div>
	  

<!-- bottom buttons -->

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
      

<!-- Scripts -->   

<script>
  function myFunction() {
    document.getElementById("myModal").innerHTML = "";
  }
function select_item(item_name){
	document.getElementById("bar").value = item_name;
	document.getElementById("bar").focus();
}
function add_items(){
  $.post("add_items.php",$("#additemform").serialize(),function(data, status){
    if(status=="success"){
      document.getElementById("item_list").innerHTML=data;
    }
  });
}
function update_items(){
  $.post("update_items.php",$("#updateitemform").serialize(),function(data, status){
    if(status=="success"){
      document.getElementById("item_list").innerHTML=data;
    }
  });
}

function delete_item(){
  $.post("delete_item.php","id="+document.getElementById("item_row_id").value,function(data, status){
    if(status=="success"){
      document.getElementById("item_list").innerHTML=data;
    }
  });
}

function toTitleCase(str) {
  return str.replace(
    /\w\S*/g,
    function(txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    }
  );
}
function edit_item(row_id){
 document.getElementById('edit_item_name').value = document.getElementById('item_name'+row_id).innerHTML;
 document.getElementById('edit_item_code').value = document.getElementById('item_code'+row_id).innerHTML;
 document.getElementById('edit_item_price').value = document.getElementById('item_price'+row_id).innerHTML;
 document.getElementById('item_row_id').value = row_id;
}
$('#bar').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
		var barcode = document.getElementById("bar").value;
    var bill_id = document.getElementById("bill_id").value;
		$.post("search_items.php","barcode="+barcode+"&bill_id="+bill_id,function(data, status){
			if(status=="success"){
				document.getElementById("bill_items").innerHTML=data;
				document.getElementById("bar").value="";
			}
		});
	}
});

function fetch_items(){
	$.ajax({
		url: "view_ajax.php",
		type: "POST",
		cache: false,
		success: function(data){
			
			$('#table1_body').html(data); 
		}
	});
 }

	$(document).ready(function() {
    $('#table1').dataTable();
    } );

</script>

<script>
$( document ).on( "click", "#delete", function() {
  $('#deleteModal').modal('hide');
});
</script>

<script>
//Clock
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