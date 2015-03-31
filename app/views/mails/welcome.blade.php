<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Welcome</h2>

<p><b>Account:</b> {{{ $email }}}</p>
<p>To activate your account, <a href="{{ route('activate/user', array('id' => $userId, 'code' => urlencode($activationCode))) }}">click here.</a></p>

<p>Thank you, <br />
    ~The Admin Team</p>
</body>
</html>