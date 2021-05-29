<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Model;

use Gama\Resellers\Api\Data\ResellerInterfaceFactory;
use Gama\Resellers\Api\Data\ResellerSearchResultsInterfaceFactory;
use Gama\Resellers\Api\ResellerRepositoryInterface;
use Gama\Resellers\Model\ResourceModel\Reseller as ResourceReseller;
use Gama\Resellers\Model\ResourceModel\Reseller\CollectionFactory as ResellerCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ResellerRepository implements ResellerRepositoryInterface
{

    protected $resellerFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $resellerCollectionFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $dataResellerFactory;


    /**
     * @param ResourceReseller $resource
     * @param ResellerFactory $resellerFactory
     * @param ResellerInterfaceFactory $dataResellerFactory
     * @param ResellerCollectionFactory $resellerCollectionFactory
     * @param ResellerSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceReseller $resource,
        ResellerFactory $resellerFactory,
        ResellerInterfaceFactory $dataResellerFactory,
        ResellerCollectionFactory $resellerCollectionFactory,
        ResellerSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->resellerFactory = $resellerFactory;
        $this->resellerCollectionFactory = $resellerCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataResellerFactory = $dataResellerFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Gama\Resellers\Api\Data\ResellerInterface $reseller
    ) {
        /* if (empty($reseller->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $reseller->setStoreId($storeId);
        } */
        
        $resellerData = $this->extensibleDataObjectConverter->toNestedArray(
            $reseller,
            [],
            \Gama\Resellers\Api\Data\ResellerInterface::class
        );
        
        $resellerModel = $this->resellerFactory->create()->setData($resellerData);
        
        try {
            $this->resource->save($resellerModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the reseller: %1',
                $exception->getMessage()
            ));
        }
        return $resellerModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($resellerId)
    {
        $reseller = $this->resellerFactory->create();
        $this->resource->load($reseller, $resellerId);
        if (!$reseller->getId()) {
            throw new NoSuchEntityException(__('Reseller with id "%1" does not exist.', $resellerId));
        }
        return $reseller->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->resellerCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Gama\Resellers\Api\Data\ResellerInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Gama\Resellers\Api\Data\ResellerInterface $reseller
    ) {
        try {
            $resellerModel = $this->resellerFactory->create();
            $this->resource->load($resellerModel, $reseller->getResellerId());
            $this->resource->delete($resellerModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Reseller: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($resellerId)
    {
        return $this->delete($this->get($resellerId));
    }
}

