<!doctype html>
<html lang="en">
<head>


    <title>My Project</title>

</head>
<body>

<header>
    <h1>Welcome to My Project</h1>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <div id="app">
        <h2>About</h2>
        <p>This is a simple HTML page structure you can build upon.</p>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer>
    <p>testing footer</p>
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