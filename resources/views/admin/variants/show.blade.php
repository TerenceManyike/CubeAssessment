@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.variant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.variant.fields.id') }}
                        </th>
                        <td>
                            {{ $variant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variant.fields.sap_product_code') }}
                        </th>
                        <td>
                            {{ $variant->sap_product_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variant.fields.web_product_code') }}
                        </th>
                        <td>
                            {{ $variant->web_product_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variant.fields.name') }}
                        </th>
                        <td>
                            {{ $variant->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#variant_products" role="tab" data-toggle="tab">
                {{ trans('cruds.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="variant_products">
            @includeIf('admin.variants.relationships.variantProducts', ['products' => $variant->variantProducts])
        </div>
    </div>
</div>

@endsection