<?php

namespace App\Repositories;

use App\Interfaces\PapersRepositoryInterface;
use App\Models\ResearchPaper;

class ResearchPapersRepository implements PapersRepositoryInterface
{
    /**
     * Add a new research paper
     *
     * @param array $researchDetails
     * @return collection
     */
    public function addResearchPaper(array $researchDetails)
    {
        return ResearchPaper::create($researchDetails);
    }

    /**
     * Update a research paper
     * @param int $researchId
     * @param array $newDetails
     * @return collection
     */
    public function updateResearchPaper($researchId, array $newDetails)
    {
        return ResearchPaper::whereId($researchId)->update($newDetails);
    }

    /**
     * Get all the research papers
     * @return collection
     */
    public function getResearchPapers()
    {
        return ResearchPaper::all();
    }

    /**
     * Get a single research paper
     * @param int $researchId
     * @return array
     */
    public function getSingleResearchPaper($researchId)
    {
        return ResearchPaper::with('researchpaperimages')->findOrFail($researchId);
    }

    /**
     * Delete a research paper
     * @param int $researchId
     * @return void
     */
    public function deleteResearchPaper($researchId)
    {
        return ResearchPaper::whereId($researchId)->delete();
    }
}
