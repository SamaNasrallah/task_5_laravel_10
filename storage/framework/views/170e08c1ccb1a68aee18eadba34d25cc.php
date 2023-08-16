
<?php $__env->startSection('MainContent'); ?>
<br>
<?php if(session('error')): ?>
    <div class="alert alert-danger" style=" position: fixed;   top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
    width:600px;
    text-align: center;">
        <?php echo e(session('error')); ?>

    </div>

<?php endif; ?>


    <a href="<?php echo e(url('reg/create/'.$course_id)); ?>" class="btn btn-success" style="font-size: 18px">Register_Student</a>
<table id="myTable" class="table table-success table-striped" >

    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>name_english</th>
        <th>is_paid</th>
        <th>amount_paid</th>
        <th>remaining_amount</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $courseStd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <tr>
        <td><?php echo e($corr->id); ?></td>
        <td><?php echo e($corr->student->name_english); ?></td> 
        <td>
            <?php if($corr->is_paid == 0): ?>
            <?php if($corr->amount_paid == 0): ?>
                Payment is not made
            <?php elseif($corr->amount_paid < $corr->course->course_price): ?>
                Partial payment made
            <?php else: ?>
                Payment was made
            <?php endif; ?>
              <?php else: ?>
              payment was made

        <?php endif; ?>
        </td>
        <td><?php echo e($corr->amount_paid); ?></td>
        <td><?php echo e($corr->remaining_amount); ?></td>
        <td><?php echo e($corr->start_date); ?></td>
        <td><?php echo e($corr->end_date); ?></td>
        <td>
            <a class="btn btn-primary" href="<?php echo e(route('course-students.edit',$corr->id)); ?>">
                Edit
            </a>
        </td>
        <td>
            <form action="<?php echo e(route('course-students.destroy', $corr->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" id="btn-delete-co">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        $(document).ready(function() {
           $("#btn-delete-co").click(function() {
              alert("Delete Course successfully");
          });
        });
     </script>
</tbody>
<script>
    $(document).ready(function () {
  $('#myTable').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    "initComplete": function () {
        $('#myTable').css('width', '80%');
        $('#myTable_wrapper').css('margin-left', '100px');
    }
  });
});
</script>


</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/stdCor.blade.php ENDPATH**/ ?>