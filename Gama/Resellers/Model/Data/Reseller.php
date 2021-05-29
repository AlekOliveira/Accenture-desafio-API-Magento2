<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Resellers\Model\Data;

use Gama\Resellers\Api\Data\ResellerInterface;

class Reseller extends \Magento\Framework\Api\AbstractExtensibleObject implements ResellerInterface
{

    /**
     * Get reseller_id
     * @return string|null
     */
    public function getResellerId()
    {
        return $this->_get(self::RESELLER_ID);
    }

    /**
     * Set reseller_id
     * @param string $resellerId
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setResellerId($resellerId)
    {
        return $this->setData(self::RESELLER_ID, $resellerId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Gama\Resellers\Api\Data\ResellerExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Gama\Resellers\Api\Data\ResellerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Gama\Resellers\Api\Data\ResellerExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get gender
     * @return string|null
     */
    public function getGender()
    {
        return $this->_get(self::GENDER);
    }

    /**
     * Set gender
     * @param string $gender
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * Get zipcode
     * @return string|null
     */
    public function getZipcode()
    {
        return $this->_get(self::ZIPCODE);
    }

    /**
     * Set zipcode
     * @param string $zipcode
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setZipcode($zipcode)
    {
        return $this->setData(self::ZIPCODE, $zipcode);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * Set phone
     * @param string $phone
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get nationalID
     * @return string|null
     */
    public function getNationalID()
    {
        return $this->_get(self::NATIONALID);
    }

    /**
     * Set nationalID
     * @param string $nationalID
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setNationalID($nationalID)
    {
        return $this->setData(self::NATIONALID, $nationalID);
    }

    /**
     * Get street_number
     * @return string|null
     */
    public function getStreetNumber()
    {
        return $this->_get(self::STREET_NUMBER);
    }

    /**
     * Set street_number
     * @param string $streetNumber
     * @return \Gama\Resellers\Api\Data\ResellerInterface
     */
    public function setStreetNumber($streetNumber)
    {
        return $this->setData(self::STREET_NUMBER, $streetNumber);
    }
}

