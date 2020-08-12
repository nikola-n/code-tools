<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <title>Hackr.io Admin</title>
</head>
<body>
<table class="table table-striped text-center" style="white-space: nowrap;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Medium</th>
        <th>Level</th>
        <th>URL</th>
        <th>Approved</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
        <tr>
            <td><?php echo e($course->id); ?></td>
            <td><?php echo e($course->name); ?></td>
            <td><?php echo e($course->type); ?></td>
            <td><?php echo e($course->medium); ?></td>
            <td><?php echo e($course->level); ?></td>
            <td><?php echo e($course->url); ?></td>
            <td><?php echo e($course->approved); ?></td>
            <td>
                <?php if($course->approved == 0): ?>
                    <form action="<?php echo e(URL::to('/admin/approve')); ?>/<?php echo e($course->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
            <td>
            <td>
                <form action="<?php echo e(URL::to('/admin/delete')); ?>/<?php echo e($course->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">Don't Approve</button>
                </form>
            </td>
            <?php endif; ?>
        </tr>
        </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<div style="margin-left: 43%">
    <?php echo e($courses->links()); ?>

</div>

</body>
</html>
<?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/project3/resources/views/admin/admin.blade.php ENDPATH**/ ?>