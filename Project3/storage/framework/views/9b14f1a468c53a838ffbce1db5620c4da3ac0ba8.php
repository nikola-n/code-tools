<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="header">

                <a href="<?php echo e(route('programming')); ?>"><?php echo e($technologies->categories->name); ?></a>    >   <b><?php echo e($technologies->name); ?> Tutorials</b>

            </div>

        </div>
        <div class="row">
            <div class="tutorial-title mt-5 d-flex flex-row col-md-12">
                <div class="col-md-1">

                <img src="<?php echo e($technologies->img); ?>" alt="img" class="img-fluid mr-5" width="50px">

                </div>
                   <div class="col-md-11">

                    <h1><?php echo e($technologies->name); ?> Tutorials and Courses</h1>
                <h5 class="mb-5">Learn <?php echo e($technologies->name); ?> online from the best <?php echo e($technologies->name); ?> tutorials & voted by the programming
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
                <input type="checkbox" name="type" id=""> Free <br>
                <input type="checkbox" name="type" id=""> Paid
               </div>
                <p class="font-weight-bolder mb-1">Medium</p>
                <div class="mb-2">
                    <input type="checkbox" name="medium" id=""> Book <br>
                    <input type="checkbox" name="medium" id=""> Video
                </div>
                <p class="font-weight-bolder mb-1">Level</p>
              <div class="mb-2">
                  <input type="checkbox" name="medium" id="" style="border:1px solid red;"> Beginner <br>
                  <input type="checkbox" name="medium" id=""> Advanced
              </div>
                <p class="font-weight-bolder mb-1">Version</p>
                <?php $__currentLoopData = $technologies->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2">
                        <input type="checkbox" name="course"> <?php echo e($name->name); ?> <br>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="font-weight-bolder mb-1">Language</p>
                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2"><input type="checkbox" name="lang"> <?php echo e($lang->name); ?> <br>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-8 ml-4 p-0 border border-secondary rounded">
                <div class="d-flex justify-content-between border-bottom align-items-center border-secondary p-2 bg-white font-weight-bolder">
                    <div>Top <?php echo e($technologies->name); ?> tutorials</div>
                    <div>
                    <a href="#" class="clicked">Upvotes <i class="fas fa-arrow-down"></i></a> |
                    <a href="#">Recent</a>
                    </div>
                </div>
                    <?php $__currentLoopData = $technologies->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 d-flex border-bottom selected bg-white">
                    <div class="col-md-1 p-3">
                        <button type="button" class="btn btn-dark btn-lg"><i class="fas fa-caret-up fa-2x"></i>288</button>
                    </div>
                    <div class="col-md-11 p-3 ml-3">
                        <a href="<?php echo e($tutorial->url); ?>" class="h5 font-weight-bolder text-decoration-none text-dark"><?php echo e($tutorial->description); ?><span class="small">(<?php echo e($tutorial->url); ?>)</span></a>
                        <p>Submitted by <?php echo e($tutorial->users->name); ?></p>
                    <div class="tags">
                       <button class="bg-dark"><a href=""class="font-weight-bolder"><?=ucwords($tutorial->type)?></a></button>
                        <button class="bg-dark"><a href="" class="font-weight-bolder"><?=ucwords($tutorial->medium)?></a></button>
                       <button class="bg-dark"><a href="" class="font-weight-bolder"><?=ucwords($tutorial->level)?></a></button>
                    </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/Project3/resources/views/courses.blade.php ENDPATH**/ ?>