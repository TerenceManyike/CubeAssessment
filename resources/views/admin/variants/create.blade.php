@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.variant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.variants.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sap_product_code">{{ trans('cruds.variant.fields.sap_product_code') }}</label>
                <input class="form-control {{ $errors->has('sap_product_code') ? 'is-invalid' : '' }}" type="text" name="sap_product_code" id="sap_product_code" value="{{ old('sap_product_code', 'ZROY132000') }}">
                @if($errors->has('sap_product_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sap_product_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.variant.fields.sap_product_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web_product_code">{{ trans('cruds.variant.fields.web_product_code') }}</label>
                <input class="form-control {{ $errors->has('web_product_code') ? 'is-invalid' : '' }}" type="text" name="web_product_code" id="web_product_code" value="{{ old('web_product_code', 'ZRC0279') }}">
                @if($errors->has('web_product_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('web_product_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.variant.fields.web_product_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.variant.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.variant.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection