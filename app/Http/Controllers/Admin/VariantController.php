<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVariantRequest;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Models\Variant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VariantController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('variant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variants = Variant::all();

        return view('admin.variants.index', compact('variants'));
    }

    public function create()
    {
        abort_if(Gate::denies('variant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.variants.create');
    }

    public function store(StoreVariantRequest $request)
    {
        $variant = Variant::create($request->all());

        return redirect()->route('admin.variants.index');
    }

    public function edit(Variant $variant)
    {
        abort_if(Gate::denies('variant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.variants.edit', compact('variant'));
    }

    public function update(UpdateVariantRequest $request, Variant $variant)
    {
        $variant->update($request->all());

        return redirect()->route('admin.variants.index');
    }

    public function show(Variant $variant)
    {
        abort_if(Gate::denies('variant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variant->load('variantProducts');

        return view('admin.variants.show', compact('variant'));
    }

    public function destroy(Variant $variant)
    {
        abort_if(Gate::denies('variant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variant->delete();

        return back();
    }

    public function massDestroy(MassDestroyVariantRequest $request)
    {
        $variants = Variant::find(request('ids'));

        foreach ($variants as $variant) {
            $variant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
