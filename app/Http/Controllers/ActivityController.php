<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Services\ActivityService;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $activities = $this->activityService->getAllActivities();
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request): RedirectResponse
    {
        $this->activityService->createActivity($request->validated());
        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    /** public function show(Activity $activity)
    {
        //
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity): RedirectResponse
    {
        $this->activityService->updateActivity($activity->id, $request->validated());
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity): RedirectResponse
    {
        $this->activityService->deleteActivity($activity->id);
        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully');
    }
}
