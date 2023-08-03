<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.product.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.products.update", [$product->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(trans('cruds.product.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>">
                <?php if($errors->has('name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.product.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="slug"><?php echo e(trans('cruds.product.fields.slug')); ?></label>
                <input class="form-control <?php echo e($errors->has('slug') ? 'is-invalid' : ''); ?>" type="text" name="slug" id="slug" value="<?php echo e(old('slug', $product->slug)); ?>">
                <?php if($errors->has('slug')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.product.fields.slug_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="variants"><?php echo e(trans('cruds.product.fields.variant')); ?></label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                </div>
                <select class="form-control select2 <?php echo e($errors->has('variants') ? 'is-invalid' : ''); ?>" name="variants[]" id="variants" multiple>
                    <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('variants', [])) || $product->variants->contains($id)) ? 'selected' : ''); ?>><?php echo e($variant); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('variants')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('variants')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.product.fields.variant_helper')); ?></span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.relatedData')); ?>

    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item m-3">
            <a class="nav-link" href="#product_categories" role="tab" data-toggle="tab">
                <?php echo e(trans('cruds.category.title')); ?>

            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane m-3" role="tabpanel" id="product_categories">
            <?php if ($__env->exists('admin.products.relationships.productCategories', ['categories' => $product->productCategories])) echo $__env->make('admin.products.relationships.productCategories', ['categories' => $product->productCategories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.category.other_categories')); ?>

    </div>
    <div class="card body m-3">
        <ul>
            <form method="POST" action="<?php echo e(route('admin.product.addToCategory', $product->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php $__currentLoopData = $other_ctegories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="m-3">
                        <input type="hidden" name="category" value="<?php echo e($key); ?>" />
                        <input type="hidden" name="product" value="<?php echo e($product->id); ?>" />
                        <li>
                            <button type="submit" class="btn btn-success btn-block text-white"><?php echo e(trans('cruds.category.add_to_category')); ?> <?php echo e($category); ?></button>
                        </li>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </ul>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CubeAssessment/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>