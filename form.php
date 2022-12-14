<style>
	.error {
		color: red;
		padding: 0;
		margin:
	}
</style>
<?php
$firstName = $lastName = $password = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
		$firstName = validateInput($_POST['firstname']);
		if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['firstname'])) {
			$errors['firstName'] = "Only letters and white space allowed";
		}
	}
	else {
		$errors['firstName'] = 'Firstname is required';
	}
	if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
		$lastName = validateInput($_POST['lastname']);
		if (!preg_match("/^[\p{L}\p{P}\p{Zs}]+$/", $_POST['lastname'])) {
			$errors['lastName'] = "Only letters and white space allowed";
		}
	}
	else {
		$errors['lastName'] = 'Lastname is required';
	}
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$lastName = validateInput($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Invalid email format";
		}
	}
	else {
		$errors['lastName'] = 'Lastname is required';
	}
	if (isset($_POST['password']) && !empty($_POST['password'])) 
	{
		$password = validateInput($_POST['password']);
		if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password))
		{
			$errors['password'] = 'Password has to be:
			1. At least one lowercase char
			2. At least one uppercase char
			3. At least one digit
			4. At least one special sign of @#-_$%^&+=§!?';
		}
	} 
	else {
		$errors['password'] = 'Password is required';
	}
debug($errors);
if (!$errors) {
	echo 'Form submitted successfully!';
}
}
function validateInput($validatedInput) {
	$validatedInput = trim($validatedInput);
	$validatedInput = stripslashes($validatedInput);
	$validatedInput = htmlspecialchars($validatedInput);
	return $validatedInput;
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
	<label>Firstname</label>
	<div class="error"><?php echo (isset($errors['firstName']) ? $errors['firstName'] : ''); ?></div>
	<input type="text" name="firstname" />
	<br />
	<label>Lastname</label>
	<div class="error"><?php echo (isset($errors['lastName']) ? $errors['lastName'] : ''); ?></div>
	<input type="text" name="lastname" />
	<br />
	<label>Email</label>
	<div class="error"><?php echo (isset($errors['email']) ? $errors['email'] : ''); ?></div>
	<input type="email" name="email" required />
	<br />
	<label>Password</label>
	<div class="error"><?php echo (isset($errors['password']) ? $errors['password'] : ''); ?></div>
	<input type="password" name="password" />
	<br />
	<input type="submit" name="submit" />
</form>