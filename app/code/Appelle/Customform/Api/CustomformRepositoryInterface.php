<?php
declare(strict_types=1);

namespace Appelle\Customform\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomformRepositoryInterface
{

    /**
     * Save Customform
     * @param \Appelle\Customform\Api\Data\CustomformInterface $customform
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Appelle\Customform\Api\Data\CustomformInterface $customform
    );

    /**
     * Retrieve Customform
     * @param string $customformId
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customformId);

    /**
     * Retrieve Customform matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Appelle\Customform\Api\Data\CustomformSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Customform
     * @param \Appelle\Customform\Api\Data\CustomformInterface $customform
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Appelle\Customform\Api\Data\CustomformInterface $customform
    );

    /**
     * Delete Customform by ID
     * @param string $customformId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customformId);
}

