

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">Card 1</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 2</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 3</div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\polleria\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>