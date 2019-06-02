<!DOCTYPE html>

<html lang="en">
    <head>
	  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="..." content="...">
	  <meta http-equiv="Access-Control-Allow-Origin" content="*">
     
	 <!-- If you are opening this page from local machine, uncomment belwo line -->
       
     <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
	  
	 
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
		padding-top: 10px;
		padding-right: 30px;
		padding-bottom: 50px;
		padding-left: 30px;
	}
    .ip{
		background-color: #ffffff; /* Green */
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
            <h1 class="m-0 font-weight-bold text-primary">Temperature &amp; Humidity &amp; Pressure (Barometric From BMP280)</h1>
        </center>
        <div class="center">
           <div align="center" class="form">
                <p style = 'line-height: 60px;font-family: Helvetica;color: #fff;font-size: 50px;' id="temperature">
                    <img src = "<?php echo $this->config->item('base_url'); ?>/assets/img/temperature.png"  height="60px" width="60px" style='vertical-align: middle' /> 00.00
                </p>
                <p style = 'line-height: 60px;font-family: Helvetica;color: #fff;font-size: 50px;' id="humidity">
                    <img src = "<?php echo $this->config->item('base_url'); ?>/assets/img/humidity.png" height="60px" width="60px" style='vertical-align: middle' /> 00.00 
                </p>
                <p style = 'line-height: 60px;font-family: Helvetica;color: #fff;font-size: 50px;' id="pressure">
                    <img src = "<?php echo $this->config->item('base_url'); ?>/assets/img/pressure.jpg" height="60px" width="60px" style='vertical-align: middle' /> 00.00 
                </p>
            </div>
        </div> 
       </div>
        
        <script>
            window.onload = function() {
                loaddata();
            };
            function loaddata(){
                    var url = "http://iot.coinstrash.com/api/weather/read_all.php";
                    $.getJSON(url, function(data) {
                        var val= data;
                        var humid=(data['weather'][(Object.keys(data['weather']).length)-1]['hum']);
                        var temper=(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
                        var press=(data['weather'][(Object.keys(data['weather']).length)-1]['press']);
                       document.getElementById("temperature").innerHTML =
                        "<img src = '<?php echo $this->config->item('base_url'); ?>/assets/img/temperature.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  " +temper + '&#8451';
                       document.getElementById("humidity").innerHTML =
                        "<img src = '<?php echo $this->config->item('base_url'); ?>/assets/img/humidity.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  "+humid + '%';
                       document.getElementById("pressure").innerHTML =
                        "<img src = '<?php echo $this->config->item('base_url'); ?>/assets/img/pressure.jpg' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  "+press + ' ' + 'mb';
                        console.log(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
                    });
                
            }
            window.setInterval(function(){
            loaddata();
                }, 5000);
        
        </script>
  