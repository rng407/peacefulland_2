<?php


namespace App\Repositories;

use App\Models\Medicine;
use App\Repositories\Interfaces\MedicineRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function getAll(): Collection
    {
        return Medicine::all();
    }

    public function findById(int $id): ?Medicine
    {
        return Medicine::find($id);
    }

    public function create(array $data): Medicine
    {
        return Medicine::create($data);
    }

    public function update(int $id, array $data): Medicine
    {
        $medicine = Medicine::find($id);
        $medicine->update($data);
        return $medicine;
    }

    public function delete(int $id): void
    {
        Medicine::destroy($id);
    }
}
