<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Services\MedicineService;
class MedicineController extends Controller
{
    protected $medicineService;

    public function __construct(MedicineService $medicineService)
    {
        $this->medicineService = $medicineService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $medicines = $this->medicineService->getAllMedicines();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicineRequest $request): RedirectResponse
    {
        $this->medicineService->createMedicine($request->validated());
        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully.');
    }

    /**
     * Display the specified resource.
     */
    /** public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine): View
    {
        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine): RedirectResponse
    {
        $this->medicineService->updateMedicine($medicine->id, $request->validated());
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine): RedirectResponse
    {
        $this->medicineService->deleteMedicine($medicine->id);
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully');
    }
}
