<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Api\Data;

interface ResellerInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const NATIONALID = 'nationalID';
    const RESELLER_ID = 'reseller_id';
    const ZIPCODE = 'zipcode';
    const STREET_NUMBER = 'street_number';
    const NAME = 'name';
    const PHONE = 'phone';
    const GENDER = 'gender';
    const EMAIL = 'email';

    /**
     * Get reseller_id
     * @return string|null
     */
    public function getResellerId();

    /**
     * Set reseller_id
     * @param string $resellerId
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setResellerId($resellerId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Gama\Resellers\Api\Data\ResellerExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Gama\Resellers\Api\Data\ResellerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Gama\Resellers\Api\Data\ResellerExtensionInterface $extensionAttributes
    );

    /**
     * Get gender
     * @return string|null
     */
    public function getGender();

    /**
     * Set gender
     * @param string $gender
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setGender($gender);

    /**
     * Get zipcode
     * @return string|null
     */
    public function getZipcode();

    /**
     * Set zipcode
     * @param string $zipcode
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setZipcode($zipcode);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setPhone($phone);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setEmail($email);

    /**
     * Get nationalID
     * @return string|null
     */
    public function getNationalID();

    /**
     * Set nationalID
     * @param string $nationalID
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setNationalID($nationalID);

    /**
     * Get street_number
     * @return string|null
     */
    public function getStreetNumber();

    /**
     * Set street_number
     * @param string $streetNumber
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setStreetNumber($streetNumber);
}

