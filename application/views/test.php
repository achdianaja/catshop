<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>

<body>
	<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand">Achdian</a>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div id="carouselExample" class="carousel slide mb-4 shadow" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?php echo base_url('assets/logoci.png'); ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?php echo base_url('assets/logobootstrap.png'); ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?php echo base_url('assets/logojquery.png'); ?>" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mb-4">
					<img src="<?php echo base_url('assets/image1.png'); ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">CodeIgniter</h5>
						<p class="card-text">CodeIgniter adalah kerangka kerja PHP yang kuat dengan jejak yang sangat
							kecil.</p>
						<a href="https://codeigniter.com" class="btn btn-primary">Pelajari lebih lanjut</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-4">
					<img src="<?php echo base_url('assets/image2.png'); ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">jQuery</h5>
						<p class="card-text">jQuery adalah pustaka JavaScript cepat, kecil, dan kaya fitur.</p>
						<a href="https://jquery.com" class="btn btn-primary">Pelajari lebih lanjut</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-4">
					<img src="<?php echo base_url('assets/image3.png'); ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Bootstrap</h5>
						<p class="card-text">Bootstrap adalah toolkit open-source untuk mengembangkan dengan HTML, CSS,
							dan JS.</p>
						<a href="https://getbootstrap.com" class="btn btn-primary">Pelajari lebih lanjut</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h3>Sudah Belajar Apa Saja Hari ini?</h3>
				<form id="todo-form">
					<div class="input-group mb-3">
						<input type="text" id="todo-input" class="form-control" placeholder="Add a new todo"
							aria-label="Add a new todo">
						<button class="btn btn-outline-primary" type="submit">Add</button>
					</div>
				</form>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead class="table-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Task</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody id="todo-list">
					</tbody>
				</table>
			</div>
		</div>

	</div>

	<footer class="bg-dark text-white text-center py-3 mt-4">
		<div class="container">
			<p class="mb-1">&copy; 2023 Your Company. All rights reserved.</p>
			<ul class="list-inline">
				<li class="list-inline-item"><a href="#" class="text-white">Privacy Policy</a></li>
				<li class="list-inline-item"><a href="#" class="text-white">Terms of Service</a></li>
				<li class="list-inline-item"><a href="#" class="text-white">Contact Us</a></li>
			</ul>
		</div>
	</footer>
	<script src="<?php echo base_url('assets/jquery.js'); ?>"></script>


	<script>
		$(document).ready(function () {
			function updateTodoNumbers() {
				$('#todo-list tr').each(function (index) {
					$(this).find('td:first').text(index + 1);
				});
			}

			$('#todo-form').submit(function (event) {
				event.preventDefault();
				var todoText = $('#todo-input').val().trim();
				$('.alert').remove();

				if (todoText) {
					$('#todo-form').prepend(
						'<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menambahkan Todolist!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
					);

					var todoItem = $('<tr></tr>')
						.append('<td></td>')
						.append('<td></td>')
						.append('<td class="text-center"></td>');

					todoItem.find('td').eq(0).text($('#todo-list tr').length + 1);
					todoItem.find('td').eq(1).text(todoText);

					var doneButton = $('<button class="btn btn-success btn-sm me-2">Sudah</button>').click(
						function () {
							$(this).closest('tr').toggleClass('table-success');
						});

					var deleteButton = $('<button class="btn btn-danger btn-sm">Delete</button>').click(
						function () {
							$(this).closest('tr').fadeOut(300, function () {
								$(this).remove();
								updateTodoNumbers();
							});
						});

					todoItem.find('td:last').append(doneButton).append(deleteButton);
					$('#todo-list').append(todoItem);
					$('#todo-input').val('').focus();
				} else {
					$('#todo-form').prepend(
						'<div class="alert alert-warning alert-dismissible fade show" role="alert">Masukkan List Terlebih Dahulu!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
					);
				}
			});
		});

	</script>

	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

</body>

</html>
