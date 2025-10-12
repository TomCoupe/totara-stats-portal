<?php $__env->startSection('content'); ?>
    <div>
        <projects-home id="projects-root" data-props='<?php echo json_encode($projects, 15, 512) ?>'></projects-home>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/tomcoupe-standard/Documents/hackday/totara-stats-portal/totara-stats-portal/resources/views/content/home.blade.php ENDPATH**/ ?>