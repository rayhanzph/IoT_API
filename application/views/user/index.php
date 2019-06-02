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

	.button3 {
		background-color: white; 
		color: black; 
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
    
      <div class="col-sm-5">
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: 40px;">Location</h6>
        </div>
        <div class="card-body mx-auto">
              <form action="" method="get">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1978.1728610678492!2d109.18669265804814!3d-7.426939338952161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMjUnMzcuMCJTIDEwOcKwMTEnMTYuMCJF!5e0!3m2!1sid!2sid!4v1559032991263!5m2!1sid!2sid"
width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			  </form>
        </div>
      </div>
    </div>
    
  </div>
</div>

<script>
    	function loaddata(){
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
                loaddata();
            }, 500);
            
            function loaddata2(){
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
                loaddata2();
            }, 500);
</script>