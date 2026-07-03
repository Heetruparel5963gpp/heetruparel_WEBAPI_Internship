<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();

include("db.php");

/* CHECK FORM */

if(
!isset($_POST['email'])
||
!isset($_POST['password'])
)
{
header("Location: login.html");
exit();
}

/* RECAPTCHA CHECK */

if(
!isset($_POST['g-recaptcha-response'])
||
empty($_POST['g-recaptcha-response'])
)
{

echo "

<script>

alert(
'Please complete the Google reCAPTCHA.'
);

window.location='login.html';

</script>

";

exit();

}

/* SECRET KEY */

$secretKey =
"6LeUyEAtAAAAANZ2N78FfuISjde-mFIBNG4qmjHM";

/* CAPTCHA RESPONSE */

$captcha =
$_POST['g-recaptcha-response'];

/* VERIFY CAPTCHA */

$verify =
file_get_contents(

"https://www.google.com/recaptcha/api/siteverify?secret="
.$secretKey.
"&response=".$captcha

);

$response =
json_decode(
$verify
);

if(
!$response->success
)
{

echo "

<script>

alert(
'Google reCAPTCHA verification failed.'
);

window.location='login.html';

</script>

";

exit();

}

/* GET DATA */

$email =
trim($_POST['email']);

$password =
trim($_POST['password']);

/* FIND USER */

$query =
mysqli_query(

$conn,

"SELECT *
FROM users
WHERE email='$email'
LIMIT 1"

);

if(
$query
&&
mysqli_num_rows($query)==1
)
{

$user =
mysqli_fetch_assoc(
$query
);

/* PASSWORD CHECK (CASE SENSITIVE) */

if(
$password !==
$user['password']
)
{

echo "

<script>

alert(
'Invalid Email or Password'
);

window.location='login.html';

</script>

";

exit();

}

/* BLOCK CHECK */

if(
isset($user['status'])
&&
$user['status']=="blocked"
)
{

echo "

<script>

alert(
'You are blocked from our website. Contact Admin.'
);

window.location='login.html';

</script>

";

exit();

}

/* SESSION */

$_SESSION['user_id'] =
$user['id'];

$_SESSION['user_name'] =
$user['name'];

$_SESSION['role'] =
$user['role'];

/* ONLINE */

$user_id =
$user['id'];

mysqli_query(

$conn,

"UPDATE users
SET is_online=1
WHERE id='$user_id'"

);

/* REDIRECT */

if(
$user['role']=="admin"
)
{

header(
"Location: AAdmin/admin.html"
);

}
else
{

header(
"Location: homepage.php"
);

}

exit();

}
else
{

echo "

<script>

alert(
'Invalid Email or Password'
);

window.location='login.html';

</script>

";

exit();

}

?>