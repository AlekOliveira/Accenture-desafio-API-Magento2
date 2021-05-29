<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Api\Data;

interface ResellerSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Reseller list.
     * @return \Gama\Resellers\Api\Data\ResellerInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Gama\Resellers\Api\Data\ResellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

