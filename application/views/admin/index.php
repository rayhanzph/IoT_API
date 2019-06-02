	 <script type="text/javascript">
		document.write([
			"\<script src='",
			("https:" == document.location.protocol) ? "https://" : "http://",
			"ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'>\<\/script>" 
		].join(''));
	  </script>
	  
        <style>
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

	/*.button1:hover {
		background-color: #4CAF50;
		color: white;
	}
    */
	.button3 {
		background-color: white; 
		color: black; 
	}
    /*
	.button3:hover {
		background-color: #F44336;
		color: white;
	}
	*/
	.btnOnActive {
	    background-color: #4CAF50;
	    color: white;
	}
	.btnOffActive {
	    background-color: #F44336;
		color: white;
	}
	
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Rayhan Dashboard</h1>
            
            
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <!-- Basic Card Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: 40px;">Sensor Getar</h6>
                    </div>
                    <div class="card-body mx-auto">
              <form action="" method="get">
              <button type="button" id="D1-on" class="button button1" >Aman !</button>
			  <button type="button" id="D1-off" class="button button3" >Bahaya !</button>
			  </form>
                    </div>
                  </div>
            
                </div>
                <div class="col-sm-5">
                  <!-- Basic Card Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: 40px;">Sensor Api</h6>
                    </div>
                    <div class="card-body mx-auto">
              <form action="" method="get">
              <button type="button" id="D2-on" class="button button1" >Aman !</button>
			  <button type="button" id="D2-off" class="button button3" >Bahaya !</button>
			  </form>
                    </div>
                  </div>
            
                </div>
              </div>
               <div class="row">
                <div class="col-sm-5">
                  <!-- Basic Card Example 2 -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: 40px;">BMP280</h6>
                    </div>
                    <div class="card-body mx-auto">
                     <div class="container-fluid">
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
                    </div>
                  </div>
            
                </div>
                <div class="col-sm-5">
                  <!-- Basic Card Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: 40px;">Location</h6>
                    </div>
                    <div class="card-body mx-auto">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.47459336703!2d109.25265224181892!3d-7.421432450235298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e96a7e3cc79%3A0x6d79bcd9709b4b6!2sSMK+Negeri+1+Purwokerto!5e0!3m2!1sid!2sid!4v1559022762366!5m2!1sid!2sid" 
width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
            
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; IoT SMK N 1 Purwokerto 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
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
        
        	function loaddata2(){
                    var url = "http://iot.coinstrash.com/api/vibrate/read_all.php";
                    $.getJSON(url, function(data) {
                        if(data['vibrate'][0]['status'] == "aman"){
                            document.getElementById("D1-on").classList.add("btnOnActive");
                            document.getElementById("D1-off").classList.remove("btnOffActive");
                        }else{
                            document.getElementById("D1-off").classList.add("btnOffActive");
                            document.getElementById("D1-on").classList.remove("btnOnActive");
                        }
                        
                    });
                
            };
            window.setInterval(function(){
                loaddata2();
            }, 500);
            
            function loaddata3(){
                    var url = "http://iot.coinstrash.com/api/flame/read_all.php";
                    $.getJSON(url, function(data) {
                        if(data['flame'][0]['status'] == "aman"){
                            document.getElementById("D2-on").classList.add("btnOnActive");
                            document.getElementById("D2-off").classList.remove("btnOffActive");
                        }else{
                            document.getElementById("D2-off").classList.add("btnOffActive");
                            document.getElementById("D2-on").classList.remove("btnOnActive");
                        }
                        
                    });
                
            };
            window.setInterval(function(){
                loaddata3();
            }, 500);
        </script>
