<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/main.css">
    
    <title><?= $title . ' - Cookbook' ?? 'Cookbook'  ?></title>
</head>
<body>
    <?php include_once BASE_DIR . '/views/_templates/_partials/header.php'; ?>

    <main>
        <?= $content; ?>
    </main>
    
    <?php include_once BASE_DIR . '/views/_templates/_partials/footer.php'; ?>

    <script src="<?= BASE_URL; ?>/js/main.js"></script>
</body>
</html>