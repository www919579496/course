<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>sign up confirm link</title>
</head>
<body>
  <h1>Thanks for register</h1>

  <p>
    please click this link to finish register：
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    if not you，please ignore it。
  </p>
</body>
</html>