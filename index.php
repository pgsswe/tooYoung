<?php
$name = '';
$age = '';
$message = '';

if (isset($_POST['name']) && isset($_POST['age'])) 
	$name = trim($_POST['name']);
	$age = trim($_POST['age']);
	$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

	if ($name === '' || $age === '') {
		$message = 'Var vänlig fyll i både namn och ålder.';
	} elseif (!is_numeric($age) || (int)$age < 0) {
		$message = 'Ange en giltig ålder.';
	} else {
		$ageInt = (int)$age;
		if ($ageInt < 18) {
			$message = "Hej $safeName! Du är för ung för att använda den här webbplatsen.";
		} else {
			$message = "Hej $safeName! Välkommen till vår webbplats.";
		}
	}

?>

<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TooYoung - Formulär</title>
	<style>
		body { font-family: Arial, Helvetica, sans-serif; padding: 20px; }
		form { max-width: 400px; margin-top: 10px; }
		label { display: block; margin-top: 10px; }
		input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
		button { margin-top: 12px; padding: 8px 12px; }
		.message { margin-top: 16px; padding: 10px; background: #f3f3f3; border-radius: 4px; }
	</style>
</head>
<body>

	<h1>Skicka ditt namn och din ålder</h1>

	<form method="post" action="">
		<label for="name">Namn:</label>
		<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>

		<label for="age">Ålder:</label>
		<input type="number" id="age" name="age" min="0" value="<?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?>" required>

		<button type="submit">Skicka</button> 
	</form>

	<?php if ($message !== ''): ?>
		<div class="message"><?php echo $message; ?></div>
	<?php endif; ?>

</body>
</html>
