<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ResellerRepositoryInterface
{

    /**
     * Save Reseller
     * @param \Gama\Resellers\Api\Data\ResellerInterface $reseller
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Gama\Resellers\Api\Data\ResellerInterface $reseller
    );

    /**
     * Retrieve Reseller
     * @param string $resellerId
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($resellerId);

    /**
     * Retrieve Reseller matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Gama\Resellers\Api\Data\ResellerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Reseller
     * @param \Gama\Resellers\Api\Data\ResellerInterface $reseller
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Gama\Resellers\Api\Data\ResellerInterface $reseller
    );

    /**
     * Delete Reseller by ID
     * @param string $resellerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($resellerId);
}

