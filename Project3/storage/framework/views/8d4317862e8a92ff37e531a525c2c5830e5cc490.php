<?php $__env->startSection('content'); ?>
    <div class="text-center">
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="header">
                <a href="<?php echo e(route('programming')); ?>"><?php echo e($technologies->categories->category_name); ?></a> >
                <b><?php echo e($technologies->technology_name); ?> Tutorials</b>
            </div>
        </div>
        <div class="row">
            <div class="tutorial-title mt-5 d-flex flex-row col-md-12">
                <div class="col-md-1">

                    <img src="<?php echo e($technologies->img); ?>" alt="img" class="img-fluid mr-5" width="50px">

                </div>
                <div class="col-md-11">

                    <h1><?php echo e($technologies->technology_name); ?> Tutorials and Courses</h1>
                    <h5 class="mb-5">Learn <?php echo e($technologies->technology_name); ?> online from the
                                     best <?php echo e($technologies->technology_name); ?> tutorials & voted by the programming
                        <br> community.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 border border-primary rounded bg-white" style="font-size: large">
                <h5 class="border-bottom border-info p-3 font-weight-bolder">Filter Courses</h5>
                <p class="font-weight-bolder mb-1">Type of course</p>
                <div class="mb-2">
                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?>
                            <input type="checkbox" name="type" id="free" value="free"> Free (<?php echo e($t); ?>) <br>
                        <?php endif; ?>
                        <?php if($loop->last): ?>
                            <input type="checkbox" name="type" id="paid" value="paid"> Paid (<?php echo e($t); ?>)
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p class="font-weight-bolder mb-1">Medium</p>
                <div class="mb-2">
                    <?php $__currentLoopData = $medium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?>
                            <input type="checkbox" name="medium" id=""> Book (<?php echo e($m); ?>) <br>
                        <?php endif; ?>
                        <?php if($loop->last): ?>
                            <input type="checkbox" name="medium" id=""> Video (<?php echo e($m); ?>)
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p class="font-weight-bolder mb-1">Level</p>
                <div class="mb-2">
                    <?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?>
                            <input type="checkbox" name="level" id=""> Beginner (<?php echo e($l); ?>)
                            <br>
                        <?php endif; ?>
                        <?php if($loop->last): ?>
                            <input type="checkbox" name="level" id=""> Advanced (<?php echo e($l); ?>)
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p class="font-wight-bolder mb-1">Version</p>
                <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2">
                        <input type="checkbox" name="course"> <?php echo e($key); ?> (<?php echo e($value); ?>)
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="font-weight-bolder mb-1">Language</p>
                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $lang_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2"><input type="checkbox" name="lang"> <?php echo e($lang); ?> (<?php echo e($lang_number); ?>)</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-8 ml-4 p-0 border rounded border-primary font-weight-bolder">
                <div
                    class="d-flex justify-content-between border-bottom align-items-center border-secondary p-2 bg-white font-weight-bolder">
                    <div>Top <?php echo e($technologies->name); ?> tutorials</div>
                    <div>
                        <a href="#" class="clicked">Upvotes <i class="fas fa-arrow-down"></i></a> |
                        <a href="<?php echo e(URL::to('/recent')); ?>">Recent</a>
                    </div>
                </div>
                <div id="c">
                    <?php $__currentLoopData = $technologies->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tutorial->approved === 1): ?>
                            <div class="col-md-12 d-flex border-bottom selected bg-white">
                                <div class="col-md-1 p-3">
                                    <form action="<?php echo e(URL::to('votes')); ?>/<?php echo e($tutorial->id); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-dark btn-lg" id="vote">
                                            <i class="fas fa-caret-up fa-2x"></i>
                                            <?php echo e($tutorial->votesCount ?: 0); ?>

                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-11 p-3 ml-3">
                                    <a href="<?php echo e($tutorial->url); ?>"
                                       class="h5 font-weight-bolder text-decoration-none text-dark"><?php echo e($tutorial->name); ?>

                                        <span
                                            class="small"> (<?php echo e($tutorial->url); ?>)</span></a>
                                    <p>Submitted by <?php echo e($tutorial->users->name); ?></p>
                                    <div class="tags">
                                        <button class="bg-dark"><a href="#"
                                                                   class="font-weight-bolder"><?=ucwords($tutorial->type)?></a>
                                        </button>
                                        <button class="bg-dark"><a href="#"
                                                                   class="font-weight-bolder"><?=ucwords($tutorial->medium)?></a>
                                        </button>
                                        <button class="bg-dark"><a href="#"
                                                                   class="font-weight-bolder"><?=ucwords($tutorial->level)?></a>
                                        </button>
                                        <?php $__currentLoopData = $tutorial->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button class="bg-dark">
                                                <a href="#" class="font-weight-bolder"><?=ucwords($sub->subcategory_name)?></a>
                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $tutorial->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button class="bg-dark">
                                                <a href="#" class="font-weight-bolder"><?=ucwords($lan->language_name)?></a>
                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var baseUrl = 'http://project3.test/filtered';

    $(document).ready(function () {
        $('#free').on('change', function (e) {
            e.preventDefault();

            var query = '';
            if($(this).is(':checked')) {
                query = '?type='+this.value;
            } else {
                query = '';
            }

            $.get('http://project3.test/filtered' + query, function (data) {
                $('#c').html('');


                $.each(data, function (index, value) {
                    $('#c').append('<div class="col-md-12 d-flex border-bottom selected bg-white">' +
                        '<div class="col-md-1 p-3">' +
                        '<button type="submit" class="btn btn-dark btn-lg" id="vote" data-course-id="">' +
                        '<i class="fas fa-caret-up fa-2x">' +
                        '</i>' +
                        '<span>' + value.votes_count + '</span>' +
                        '</button>' +
                        '</div>' +
                        '<div class="col-md-11 p-3 ml-3">' +
                        '<a href="' + value.url + '"class="h5 font-weight-bolder text-decoration-none text-dark">' + value.name +
                        '<span class="small">' + value.url + '</span>' +
                        '</a>' +
                        '<p>Submitted by ' + value.users.name + '</p>' +
                        '</div>'
                    );

                });
            })
        })
    })
</script>


















































<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/project3/resources/views/courses.blade.php ENDPATH**/ ?>