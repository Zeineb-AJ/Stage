<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $translate = $attribute->translate(app_get_locale()); ?>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__('Attribute: :name',['name'=>$translate->name])); ?></strong></div>
        <div class="panel-body">
            <div class="terms-scrollable">
                <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $term_translate = $term->translate(app_get_locale()); ?>
                    <label class="term-item">
                        <input <?php if(!empty($selected_terms) and $selected_terms->contains($term->id)): ?> checked <?php endif; ?> type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>">
                        <span class="term-name"><?php echo e($term_translate->name); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\wamp64\www\mytravel2\modules/Car/Views/admin/car/attributes.blade.php ENDPATH**/ ?>