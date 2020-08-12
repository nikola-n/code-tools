<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <h1 class="text-center mt-5">Find the Best DevOps Courses & Tutorials</h1>
        <div class="text-center">
            <form class="form-inline active-cyan-3 active-cyan-4">
                <i class="fas fa-search fa-2x" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="search" id="query" name="query"
                       style="width: 70%; border: 0.1px solid #5a6268; border-radius: 4px;box-shadow: 1px 1px 8px gray; padding: 19px 20px; "
                       placeholder="Search for the language you want to learn: PHP, Python, Javascript,.....">
            </form>
        </div>
    </div>

    <div class="container-fluid col-md-10 col-md-offset-1">
        <div class="row" style="justify-content: space-evenly;" id="courses">
            <?php $__currentLoopData = $devOps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 courses-style bg-white d-flex align-items-center" style="max-width: 30%">
                    <a class="col-md-12 text-decoration-none text-danger font-weight-bolder" href="<?php echo e(URL::to('tutorials')); ?>/<?php echo e($dev->technology_name); ?>">
                        <img class="img-fluid mr-2" style="width:50px;" src="<?php echo e($dev->img); ?>" />
                        <?php echo e($dev->technology_name); ?>

                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#query').on('keyup', function () {
                $.ajax({
                    url: "<?php echo e(URL::to('api/')); ?>",
                    data: {"query": $('#query').val(), ' _token': '<?php echo e(csrf_token()); ?>'},
                    dataType: "json",
                    method: "GET",
                }).done(function (data) {
                    $('#courses').html("");
                    $.each(data.searchData, function (index, value) {
                        $("#courses").append(
                            '<div class="col-md-4 courses-style d-flex align-items-center" style="max-width: 30%">' +
                            '<img class="img-fluid mr-2" style="width:50px;" href="/tutorials/' + value.technology_name + '"src="' + value.img + '">' +
                            '<a class="col-md-12 text-decoration-none text-danger" href="/tutorials/' + value.technology_name + '">' + value.technology_name + '</a>' +
                            '</div>');
                    })
                })
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/project3/resources/views/categories/devops.blade.php ENDPATH**/ ?>