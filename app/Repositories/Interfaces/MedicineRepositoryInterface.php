<?php

namespace App\Repositories\Interfaces;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Collection;
interface MedicineRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id): ?Medicine;

    public function create(array $data): Medicine;
    public function update(int $id, array $data): Medicine;
    public function delete(int $id): void;
}
