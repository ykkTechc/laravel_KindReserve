@include('sample.text')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="message">
    <p>コンポーネントの中身</p>
    <p class="title">{{$title}}</p>
    <p class="content">{{$content}}</p>
  </div>
</body>
</html>

