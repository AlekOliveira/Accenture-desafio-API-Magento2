<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Model;

use Gama\Resellers\Api\Data\ResellerInterface;
use Gama\Resellers\Api\Data\ResellerInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Reseller extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'gama_resellers_reseller';
    protected $resellerDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResellerInterfaceFactory $resellerDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Gama\Resellers\Model\ResourceModel\Reseller $resource
     * @param \Gama\Resellers\Model\ResourceModel\Reseller\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResellerInterfaceFactory $resellerDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Gama\Resellers\Model\ResourceModel\Reseller $resource,
        \Gama\Resellers\Model\ResourceModel\Reseller\Collection $resourceCollection,
        array $data = []
    ) {
        $this->resellerDataFactory = $resellerDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve reseller model with reseller data
     * @return ResellerInterface
     */
    public function getDataModel()
    {
        $resellerData = $this->getData();
        
        $resellerDataObject = $this->resellerDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $resellerDataObject,
            $resellerData,
            ResellerInterface::class
        );
        
        return $resellerDataObject;
    }
}

