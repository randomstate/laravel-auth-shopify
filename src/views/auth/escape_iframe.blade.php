<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Auth</title>

    <script src="//cdn.shopify.com/s/assets/external/app.js"></script>
</head>
<body>

<script type='text/javascript'>

  var permissionUrl = encodeURI("https://{{ $shop }}/admin{!! $permissionUrl !!}");

  if (window.top === window.self) {
    window.location.assign(permissionUrl);
  } else {
    ShopifyApp.init({
      apiKey: "{{ $apiKey }}",
      shopOrigin: "https://{{ $shop }}",
    });

    ShopifyApp.redirect(permissionUrl);
  }
</script>

</body>
</html>
