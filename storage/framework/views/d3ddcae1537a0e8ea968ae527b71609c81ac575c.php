<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.category.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.categories.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(trans('cruds.category.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', '')); ?>">
                <?php if($errors->has('name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.category.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="meta_title"><?php echo e(trans('cruds.category.fields.meta_title')); ?></label>
                <input class="form-control <?php echo e($errors->has('meta_title') ? 'is-invalid' : ''); ?>" type="text" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title', 'Meta title')); ?>">
                <?php if($errors->has('meta_title')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('meta_title')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.category.fields.meta_title_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="meta_description"><?php echo e(trans('cruds.category.fields.meta_description')); ?></label>
                <input class="form-control <?php echo e($errors->has('meta_description') ? 'is-invalid' : ''); ?>" type="text" name="meta_description" id="meta_description" value="<?php echo e(old('meta_description', 'Meta description')); ?>">
                <?php if($errors->has('meta_description')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('meta_description')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.category.fields.meta_description_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="meta_keywords"><?php echo e(trans('cruds.category.fields.meta_keywords')); ?></label>
                <input class="form-control <?php echo e($errors->has('meta_keywords') ? 'is-invalid' : ''); ?>" type="text" name="meta_keywords" id="meta_keywords" value="<?php echo e(old('meta_keywords', 'Meta keyword')); ?>">
                <?php if($errors->has('meta_keywords')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('meta_keywords')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.category.fields.meta_keywords_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="products"><?php echo e(trans('cruds.category.fields.product')); ?></label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                </div>
                <select class="form-control select2 <?php echo e($errors->has('products') ? 'is-invalid' : ''); ?>" name="products[]" id="products" multiple>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(in_array($id, old('products', [])) ? 'selected' : ''); ?>><?php echo e($product); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('products')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('products')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.category.fields.product_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CubeAssessment/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>