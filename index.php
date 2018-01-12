<html>
<head>
	<title>Task HTML, CSS, Javascript</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse bg">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand white" href="#">Training Bootstrap</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php" class="bg-blueblack">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="profile.html" class="white">Profile</a></li>
					<li><a href="contact.html" class="white">Contact</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="assets/img/flat-city.jpg" alt="Hello!">
					<div class="carousel-caption black" >
				        <h3>Hello!</h3>
				    </div>
				</div>

				<div class="item">
					<img src="assets/img/flat-city.jpg" alt="Gang di kota Bandung">
					<div class="carousel-caption black">
				        <h3>Hello!</h3>
				    </div>
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div class="col-md-4 c">
		<p>Hello saya Riku dan saya saat ini akan lulus dari kuliah, salam kenal ya. Berikut contoh dari hasil design grafik yang saya buat :).</p>
		</div>
		<div class="col-md-4" style="float:right">
		<p>Facebook: riku@gmail.com</p>
		<p>Twitter: riku@gmail.com</p>
		<p>Telepon: 022-232392</p>
		<p>Alamat: Jl. Harapan Bangas No.23, Bandung, Indonesia</p>
		</div>
	</div>
</body>
</html>