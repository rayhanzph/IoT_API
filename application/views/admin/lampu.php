<!DOCTYPE html>
<html lang="en">
   <head>
	  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="..." content="...">
	  <meta http-equiv="Access-Control-Allow-Origin" content="*">
     
      <!-- If you are opening this page from local machine, uncomment belwo line 
       
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
	  -->
	 
	 <!-- If you are opening this page from a web hosting server machine, uncomment belwo line -->
	 
	 <script type="text/javascript">
		document.write([
			"\<script src='",
			("https:" == document.location.protocol) ? "https://" : "http://",
			"ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'>\<\/script>" 
		].join(''));
	  </script>
	  

      
	 <style>
	.center { 
		height: 100%;
		width: 100%;
		background: #c0c5ce;
		position: relative; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	
	.form{
		padding-top: 50px;
		padding-right: 30px;
		padding-bottom: 50px;
		padding-left: 30px;
	}

	.button {
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 16px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
	}

	.button1 {
		background-color: white; 
		color: black; 
	}

	.button1:hover {
		background-color: #4CAF50;
		color: white;
	}

	.button3 {
		background-color: white; 
		color: black; 
	}

	.button3:hover {
		background-color: #F44336;
		color: white;
	}
	
	.btnOnActive {
	    background-color: #4CAF50;
	    color: white;
	}
	.btnOffActive {
	    background-color: #F44336;
		color: white;
	}

	.ip{
		background-color: #fffff; /* Green */
		border: none;
		color: black;
		padding: 16px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		-webkit-transition-duration: 0.4s; /* Safari */
	}

	</style>
      
   </head>

   <div class="container-fluid">
   <center>
		<h1 class="m-0 font-weight-bold text-primary"">LAMPU RUANG 1</h1>
	</center>
   
   <div class="center">
	<div align="center" class="form">
       <form action="" method="get">
              <button type="button" id="D1-on" class="button button1" >Lampu 1 ON</button>
			  <button type="button" id="D1-off" class="button button3" >Lampu 1 OFF</button>
			  <br>
			  <button type="button" id="D2-on" class="button button1" >Lampu 2 ON</button>
			  <button type="button" id="D2-off" class="button button3" >Lampu 2 OFF</button>
			  <br>
			  <button type="button" id="D3-on" class="button button1" >Lampu 3 ON</button>
			  <button type="button" id="D3-off" class="button button3" >Lampu 3 OFF</button>
			  <br>
        </form>
		<br><br>
	 </div>
	</div>
	
    </div>
    
	<script>
		document.getElementById('D1-on').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=1&status=on";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D1-off').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=1&status=off";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		
		document.getElementById('D2-on').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=2&status=on";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D2-off').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=2&status=off";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		
		document.getElementById('D3-on').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=3&status=on";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D3-off').addEventListener('click', function() {
				var url = "http://iot.coinstrash.com/api/led/update.php?id=3&status=off";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		window.onload = function(){
		    loaddata();
		};
		
		function loaddata(){
                    var url = "http://iot.coinstrash.com/api/led/read_all.php";
                    $.getJSON(url, function(data) {
                        if(data['led'][0]['status'] == "on"){
                            document.getElementById("D1-on").classList.add("btnOnActive");
                            document.getElementById("D1-off").classList.remove("btnOffActive");
                        }else{
                            document.getElementById("D1-off").classList.add("btnOffActive");
                            document.getElementById("D1-on").classList.remove("btnOnActive");
                        }
                        if(data['led'][1]['status'] == "on"){
                            document.getElementById("D2-on").classList.add("btnOnActive");
                            document.getElementById("D2-off").classList.remove("btnOffActive");
                        }else{
                            document.getElementById("D2-off").classList.add("btnOffActive");
                            document.getElementById("D2-on").classList.remove("btnOnActive");
                        }
                        if(data['led'][2]['status'] == "on"){
                            document.getElementById("D3-on").classList.add("btnOnActive");
                            document.getElementById("D3-off").classList.remove("btnOffActive");
                        }else{
                            document.getElementById("D3-off").classList.add("btnOffActive");
                            document.getElementById("D3-on").classList.remove("btnOnActive");
                        }
                    });
                
            };
            window.setInterval(function(){
                loaddata();
            }, 500);

		
	</script>
</html>