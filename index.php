<!DOCTYPE html>
<html>
<head>
	<title>Tilte of Project</title>
	
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet/less" type="text/css" href="css/pre.less" />
	<link rel="stylesheet/less" type="text/css" href="css/index.less" />

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/less.min.js"></script>

</head>
<body>
	<header>
		<div class="title">Title of Project Title of Project</div>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<div class="selector">
						<div class="title">Select the Image to Compare</div>
						<div class="content">
							<a href="#" class="btn btn-info btn-lg trigger-it">Click here to select</a>
							<div class="img-holder">
								<img src="">
							</div>
							<div class="file-ip-holder hide">
								<input type="file" accept="image/*" id="upload-photo">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="encoder">
						<div class="title">Encoding Image to Compare</div>
						<div class="content">
							<a href="#" class="btn btn-info btn-lg encode-it disabled" data-loading-text="Uploading <i class='spin glyphicon glyphicon-refresh'></i>">Upload &amp; Encode</a>
							<div class="toggle-bit hide">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" data-attr="data-16" class="btn toggle-16 btn-info active">16 bit</button>
									<button type="button" data-attr="data-32" class="btn toggle-32 btn-info">32 bit</button>
								</div>
							</div>
							<div class="encode-result">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row compare-section">
				<div class="col-xs-12">
					<div class="filters">
						<div class="title">Filters</div>
						<div class="fields clearfix">
							<label>
								Compare by 
								<select class="form-control" id="compare">
									<option value="16">16</option>
									<option value="32">32</option>
								</select>
							</label>
							<label>
								<span>Similarity :</span>
								<select class="form-control" id="similarity">
									<option value="30">Greater than 30%</option>
									<option value="40">Greater than 40%</option>
									<option value="50">Greater than 50%</option>
									<option value="60">Greater than 60%</option>
									<option value="70">Greater than 70%</option>
									<option value="80">Greater than 80%</option>
									<option value="90">Greater than 90%</option>
									<option value="100">100%</option>
								</select>
							</label>
							<label>
								<span>Date Range :</span>
								<span>
									<input type="text" id="from" name="from" readonly class="form-control">
									<input type="text" id="to" name="to" readonly class="form-control">
								</span>
							</label>
							<label>
								<span>File Size :</span>
								<select class="form-control" id="file_size">
									<option value="(`size` < 2097152)">0MB - 2MB</option>
									<option value="(`size` BETWEEN  2097153 AND 3145728)">2MB - 3MB</option>
									<option value="(`size` BETWEEN  3145729 AND 4194304)">3MB - 4MB</option>
									<option value="(`size` BETWEEN  4194305 AND 5242880)">4MB - 5MB</option>
									<option value="(`size` > 5242880)">More than 5MB</option>
								</select>
							</label>
							<label>
								<span>File Type :</span>
								<select class="form-control" id="file_type">
									<option value=" AND (`type` like '%jpeg')">JPEG/JPG</option>
									<option value=" AND (`type` like '%png')">PNG</option>
									<option value=" AND (`type` like '%bmp')">BMP</option>
								</select>
							</label>
						</div>
						<div class="similar-images">
						</div>
						<div class="search-holder text-center">
							<a href="#" class="compare-it btn btn-info">Compare</a>
							<a href="#" class="upload-it btn btn-info">Upload</a>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
	<script type="text/javascript">
		var file;
		$(document).ready(function(){
			$( "#from" ).datepicker({
				changeMonth: true,
				numberOfMonths: 1,
				dateFormat: 'yy-mm-dd',
				onClose: function( selectedDate ) {
					$( "#to" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#to" ).datepicker({
				changeMonth: true,
				dateFormat: 'yy-mm-dd',
				numberOfMonths: 1,
				onClose: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
			$(document).on("click","a[href='#']",function(e){
				e.preventDefault();
			});
			$(document).on("click",".trigger-it",function(){
				$("#upload-photo").trigger("click");
			});
			$(document).on("change","#upload-photo",function(e){
				var input = this;
				file = input.files[0];
				console.log(file);
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$(".encoder").hide()
						$('.img-holder > img').attr('src', e.target.result);
						$(".file-ip-holder").html('<input type="file" accept="image/*" id="upload-photo">');
						$(".encoder").slideDown()
						$(".encode-it").button("reset");
						$(".encode-it").removeClass("disabled")
					}

					reader.readAsDataURL(input.files[0]);
				}
			});
			$(document).on("click",".encode-it",function(){
				$(this).button("loading");
				var ext = 'img' + file.name.substring(file.name.lastIndexOf("."));
				getEncode(file,ext,'16');
			});
			$(document).on("click",".upload-it",function(){
				$(this).button("loading");
				var ext = 'img' + file.name.substring(file.name.lastIndexOf("."));
				upload(file);
			});
			$(document).on("click",".compare-it",function(){
				compare(file);
			});
			$(document).on("click",".toggle-bit button",function(){
				$(this).addClass("active").siblings().removeClass("active");
				var encode = $(".encode-result").attr($(this).data("attr"));
				$(".encode-result").html(encode);
			});
			function getEncode(file, ext, bit){
				var formdata = new FormData();
				formdata.append('file',file)
				formdata.append('bit',bit)
				$.ajax({
					type: "POST",
					url: 'getEncode.php',
					data: formdata,
					processData: false,
					contentType: false,
					success: function (response) {
						$(".encode-result").attr("data-"+bit,response)
						$(".encode-result").html(response)
						// $(".toggle-bit").removeClass("hide");
						// $(".toggle-"+bit).trigger("click");
						$(".encode-it").html("Encoded");
						$(".encode-it").addClass("disabled");
						$(".encode-it").attr("disabled","disabled");
					},
					error: function (response) {

					}
				});
			}

			function upload(file){
				var formdata = new FormData();
				formdata.append('file',file)
				formdata.append('path',"tmp/"+file.name)
				formdata.append('bit',$("#compare").val())
				formdata.append('encoded_16',$(".encode-result").attr("data-16"));
				// formdata.append('encoded_32',$(".encode-result").attr("data-32"));
				$.ajax({
					type: "POST",
					url: 'upload.php',
					data: formdata,
					processData: false,
					contentType: false,
					success: function (response) {
						location.reload()
					},
					error: function (response) {
						$(".upload-it").button("reset")
					}
				});
			}

			function compare(file){
				var formdata = new FormData();
				// formdata.append('bit',$("#compare").val())
				// formdata.append('hex',$(".encode-result").attr("data-"+$("#compare").val()));
				formdata.append('file',file)
				formdata.append('similar',$("#similarity").val())
				formdata.append('bit',"16")
				formdata.append('hex',$(".encode-result").attr("data-16"));
				var from = $("#from").val();
				var to = $("#to").val();
				var file_size = $("#file_size").val();
				var file_type = $("#file_type").val();
				var sql = "";

				if(from != "" && to != ""){
					sql += " where (`upload_date` BETWEEN '"+from+"' AND '"+to+"')";
				}
				sql += sql == "" ? " where " : " AND ";
				sql += file_size+file_type;
				console.log(sql);
				formdata.append('sql',sql);

				$.ajax({
					type: "POST",
					url: 'getDiff.php',
					data: formdata,
					processData: false,
					contentType: false,
					success: function (response) {
						$(".similar-images").html('')
						$.each(JSON.parse(response),function(i,data){
							var image = $("<img/>",{"src":data.url});
							$(".similar-images").append(image)
						});
					},
					error: function (response) {
						$(".upload-it").button("reset")
					}
				});
}
})
</script>
</html>