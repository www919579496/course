<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>注册確認link</title>
</head>
<body>
  <h1>感謝你的注冊</h1>

  <p>
    請點擊以下link完成注冊：
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    如果不是你本人，請忽略此郵件。
  </p>
</body>
</html>