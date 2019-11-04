<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=getenv('APP_ROOT_PATH')?>css/styles.css">
    <title><?=$this->e($title)?></title>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<body>
    <!-- This is where all of the content is rendered. -->
    <?=$this->section('content')?>
<script src="<?=getenv('APP_ROOT_PATH')?>scripts/index.js"></script>
</body>
</html>