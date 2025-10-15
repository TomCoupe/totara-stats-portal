<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<header>
</header>

<main>
    <div id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer>
</footer>


<?php $env = $_ENV['APP_ENV'] ?? 'production'; ?>
<?php if($env === 'local'): ?>
    
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/resources/js/app.js"></script>
<?php else: ?>
    <script type="module" src="<?php echo e(vite_asset('resources/js/app.js')); ?>"></script>
<?php endif; ?>
</body>
</html><?php /**PATH /Users/tomcoupe-standard/Documents/hackday/totara-stats-portal/totara-stats-portal/resources/views/layouts/app.blade.php ENDPATH**/ ?>