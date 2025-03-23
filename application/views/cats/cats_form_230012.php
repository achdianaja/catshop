<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h3>CAT FORM</h3>
	<hr>

	<form action="" method="POST">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name_230012" id="" required></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<select name="type_230012" id="" required>
						<option value="" selected disabled>Choose</option>
						<option value="Domestic">Domestic</option>
						<option value="Anggora">Anggora</option>
						<option value="Persia">Persia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender_230012" value="Male" required> Male
					<input type="radio" name="gender_230012" value="Female" required> Female
				</td>
			</tr>
			<tr>
				<td>Age (Month)</td>
				<td><input type="number" name="age_230012" id="" required></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="number" name="price_230012" id="" required></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="SAVE" name="submit" required>
					<input type="reset" value="RESET" required>
				</td>
			</tr>
		</table>
	</form>
	<p><a href="<?= site_url('/') ?>">CANCEL</a></p>
</body>

</html>
