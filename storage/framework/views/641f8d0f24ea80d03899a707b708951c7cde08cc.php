<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.variant.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.variants.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="sap_product_code"><?php echo e(trans('cruds.variant.fields.sap_product_code')); ?></label>
                <input class="form-control <?php echo e($errors->has('sap_product_code') ? 'is-invalid' : ''); ?>" type="text" name="sap_product_code" id="sap_product_code" value="<?php echo e(old('sap_product_code', 'ZROY132000')); ?>">
                <?php if($errors->has('sap_product_code')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('sap_product_code')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.variant.fields.sap_product_code_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="web_product_code"><?php echo e(trans('cruds.variant.fields.web_product_code')); ?></label>
                <input class="form-control <?php echo e($errors->has('web_product_code') ? 'is-invalid' : ''); ?>" type="text" name="web_product_code" id="web_product_code" value="<?php echo e(old('web_product_code', 'ZRC0279')); ?>">
                <?php if($errors->has('web_product_code')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('web_product_code')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.variant.fields.web_product_code_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="name"><?php echo e(trans('cruds.variant.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', '')); ?>">
                <?php if($errors->has('name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.variant.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CubeAssessment/resources/views/admin/variants/create.blade.php ENDPATH**/ ?>