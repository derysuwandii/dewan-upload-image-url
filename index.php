<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Dewan Upload From URL</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark bg-info">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Dewan Komputer
	  </a>
	</nav>

	<div class="container mb-3">
		<h3 align="center" class="mb-3 mt-3">Dewan Upload Image From URL</h3>
		<div class="form-group">
			<label>Enter Image Url</label>
			<input type="url" name="image_url" id="image_url" class="form-control" required/>
			<small>contoh : https://i2.wp.com/dewankomputer.com/wp-content/uploads/2019/01/CRUD-Create-Read-Update-Delete-Dengan-Ajax-Tanpa-Loading-PHP-Part-1-Menampilkan-Data-Ajax-1.png</small>
		</div>
		<div class="form-group">
			<input type="button" name="upload" id="upload" value="Upload" class="btn btn-info" />
		</div>
		
		<div id="result">
			<img src="no_image.png" class="img-thumbnail img-responsive" />
		</div>
	</div>

	<div class="navbar bg-dark fixed-bottom">
		<div style="color: #fff;">© <?php echo date('Y'); ?> Copyright:
		    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
		</div>
	</div>

	<script>
		$(document).ready(function(){
		 $('#upload').click(function(){
		  var image_url = $('#image_url').val();
		  if(image_url == '')
		  {
		   alert("Please enter image url");
		   return false;
		  }
		  else
		  {
		   $('#upload').attr("disabled", "disabled");
		   $.ajax({
		    url:"upload.php",
		    method:"POST",
		    data:{image_url:image_url},
		    dataType:"JSON",
		    beforeSend:function(){
				$('#upload').val("Processing...");
		    },
		    success:function(data)
		    {
				$('#image_url').val('');
				$('#upload').val('Upload');
				$('#upload').attr("disabled", false);
				$('#result').html(data.image);
				alert(data.message);
		    }
		   })
		  }
		 });
		});
	</script>

</body>
</html>