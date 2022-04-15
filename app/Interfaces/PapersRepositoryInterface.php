<?php

namespace App\Interfaces;

interface PapersRepositoryInterface
{
    //define all the required methods
    public function addResearchPaper(array $researchDetails);
    public function updateResearchPaper($researchId, array $researchDetails);
    public function getSingleResearchPaper($researchId);
    public function getResearchPapers();
    public function deleteResearchPaper($researchId);
}
