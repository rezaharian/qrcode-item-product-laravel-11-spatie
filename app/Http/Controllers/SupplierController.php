<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    /**
     * Instantiate a new SupplierController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-supplier|create-supplier|edit-supplier|delete-supplier', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-supplier', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-supplier', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-supplier', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->all());
        return redirect()->route('suppliers.index')
            ->withSuccess('New supplier is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier): View
    {
        return view('suppliers.show', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier): View
    {
        return view('suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->all());
        return redirect()->back()
            ->withSuccess('Supplier is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')
            ->withSuccess('Supplier is deleted successfully.');
    }
}
