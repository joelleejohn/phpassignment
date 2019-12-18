<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=getenv('APP_ROOT_PATH')?>node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=getenv('APP_ROOT_PATH')?>css/styles.css">
    <title><?=$this->e($title)?></title>
</head>
<script src="<?=getenv('APP_ROOT_PATH')?>node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?=getenv('APP_ROOT_PATH')?>node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<body>
    <?php if (isset($_SESSION['user'])): ?>
    <header>
        <div class="title"><h1>MPloyEZ</h1></div>
        <div class="status"><?='Logged in as '.$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']?></div>
        <div class="logout"><a href="/logout">Logout</a></div>
    </header>
    <?php endif; ?>
    <!-- This is where all of the content is rendered. -->
    <?=$this->section('content')?>
<script src="<?=getenv('APP_ROOT_PATH')?>scripts/index.js"></script>
</body>
</html>