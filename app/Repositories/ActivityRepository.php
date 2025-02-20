<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository implements ActivityRepositoryInterface
{
    public function getAll(): Collection
    {
        return Activity::all();
    }

    public function findById(int $id): ?Activity
    {
        return Activity::find($id);
    }

    public function create(array $data): Activity
    {
        return Activity::create($data);
    }

    public function update(int $id, array $data): Activity
    {
        $activity = Activity::findOrFail($id);
        $activity->update($data);
        return $activity;
    }

    public function delete(int $id): void
    {
        Activity::destroy($id);
    }
}
