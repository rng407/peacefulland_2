<?php

namespace App\Services;

use App\Models\Medicine;
use App\Repositories\Interfaces\MedicineRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Exception;

class MedicineService
{
    protected $medicineRepository;

    public function __construct(MedicineRepositoryInterface $medicineRepository)
    {
        $this->medicineRepository = $medicineRepository;
    }

    public function getAllMedicines(): Collection
    {
        return $this->medicineRepository->getAll();
    }

    public function findMedicineById(int $id): ?Medicine
    {
        return $this->medicineRepository->findById($id);
    }

    public function createMedicine(array $data): Medicine
    {
        DB::beginTransaction();
        try {
            $medicine = $this->medicineRepository->create($data);
            DB::commit();
            return $medicine;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateMedicine(int $id, array $data): Medicine
    {
        DB::beginTransaction();
        try {
            $medicine = $this->medicineRepository->update($id, $data);
            DB::commit();
            return $medicine;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteMedicine(int $id): void
    {
        DB::beginTransaction();
        try {
            $this->medicineRepository->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
