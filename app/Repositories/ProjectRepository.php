<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    /**
     * Get all the projects
     *
     * @return collection
     */
    public function getAllProjects()
    {
        return Project::with('buildingspecification', 'projectimages')->get();
    }

    /**
     * Get a single project
     *
     * @param int $projectId
     * @return collection
     */
    public function getProjectById($projectId)
    {
        return Project::with('buildingspecification', 'projectimages')->findOrFail($projectId); //use eloquent relationship
    }

    /**
     * Delete a project
     *
     * @param int $projectId
     * @return void
     */
    public function deleteProject($projectId)
    {
        Project::destroy($projectId);
    }

    /**
     * Add a new project
     *
     * @param array $projectDetails
     * @return collection
     */
    public function createProject(array $projectDetails)
    {
        return Project::create($projectDetails);
    }

    /**
     * Update a project
     *
     * @param int $projectId
     * @param array $newDetails
     * @return collection
     */
    public function updateProject($projectId, array $newDetails)
    {
        return Project::whereId($projectId)->update($newDetails);
    }

    /**
     * Get all the projects for individual user
     *
     * @return collection
     */
    public function getAllProjectsForUser()
    {
        return Project::with('user')->get(); //there might be a better way to do this
    }
}
