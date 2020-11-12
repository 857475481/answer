<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>题目上传</title>
</head>
<body>
    <form action="/api/excel" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <input type="file" name="que" id="" />
        <input type="submit" value="upload" />
    </form>
</body>
</html>