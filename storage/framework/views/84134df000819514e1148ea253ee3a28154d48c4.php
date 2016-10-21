<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $error): ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

