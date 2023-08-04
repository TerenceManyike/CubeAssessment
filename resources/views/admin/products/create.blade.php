@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.product.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="variants">{{ trans('cruds.product.fields.variant') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('variants') ? 'is-invalid' : '' }}" name="variants[]" id="variants" multiple>
                    @foreach($variants as $id => $variant)
                        <option value="{{ $id }}" {{ in_array($id, old('variants', [])) ? 'selected' : '' }}>{{ $variant }}</option>
                    @endforeach
                </select>
                @if($errors->has('variants'))
                    <div class="invalid-feedback">
                        {{ $errors->first('variants') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.variant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="variants">{{ trans('cruds.category.title_singular') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('variants') ? 'is-invalid' : '' }}" name="category[]" id="category" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-heade m-3">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item m-3">
            <a class="nav-link" href="#product_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.category.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane m-3" role="tabpanel" id="product_categories">
            @includeIf('admin.products.relationships.productCategories', ['categories' => $product->productCategories])
        </div>
    </div>
</div>


@endsection