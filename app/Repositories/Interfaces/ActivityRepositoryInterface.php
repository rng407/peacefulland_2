<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Activity;
interface ActivityRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Activity;
    public function create(array $data): Activity;

    public function update(int $id, array $data): Activity;

    public function delete(int $id): void;
}
