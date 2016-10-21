           <?php if(Session::has('flash_message')): ?>
            <div class="alert alert-success <?php echo e(Session::has('flash_message_important') ? 'alert-important' : ''); ?>">
                <?php if(Session::has('flash_message_important')): ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php endif; ?>
                <?php echo e(session('flash_message')); ?>

            </div>
            <?php endif; ?>

