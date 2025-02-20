<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Activity;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
class ActivityService
{
    protected $activityRepository;
    public function __construct(ActivityRepositoryInterface $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function getAllActivities(): Collection
    {
        return $this->activityRepository->getAll();
    }

    public function findActivityById(int $id): ?Activity
    {
        return $this->activityRepository->findById($id);
    }

    public function createActivity(array $data): Activity
    {
        DB::beginTransaction();
        try {
            $activity = $this->activityRepository->create($data);
            DB::commit();
            return $activity;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateActivity(int $id, array $data): Activity
    {
        DB::beginTransaction();
        try {
            $activity = $this->activityRepository->update($id, $data);
            DB::commit();
            return $activity;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteActivity(int $id): void
    {
        DB::beginTransaction();
        try {
            $this->activityRepository->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
