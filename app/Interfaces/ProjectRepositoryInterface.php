<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{

    //define all the required methods for project(all functionality)
    public function getAllProjects();
    public function getProjectById($projectId);
    public function deleteProject($projectId);
    public function createProject(array $projectDetails);
    public function updateProject($projectId, array $newDetails);
    public function getAllProjectsForUser(); ///
}
