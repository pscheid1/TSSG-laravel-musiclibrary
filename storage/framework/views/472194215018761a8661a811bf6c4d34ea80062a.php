           <?php if(Session::has('flash_message')): ?>
   
  
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      
                <?php echo e(session('flash_message')); ?>

            </div>
            <?php endif; ?>

