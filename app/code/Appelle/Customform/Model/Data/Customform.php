<?php
declare(strict_types=1);

namespace Appelle\Customform\Model\Data;

use Appelle\Customform\Api\Data\CustomformInterface;

class Customform extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomformInterface
{
    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $id
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Appelle\Customform\Api\Data\CustomformExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Appelle\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Appelle\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get full_name
     * @return string|null
     */
    public function getFullName()
    {
        return $this->_get(self::FULL_NAME);
    }

    /**
     * Set full_name
     * @param string $fullName
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setFullName($fullName)
    {
        return $this->setData(self::FULL_NAME, $fullName);
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
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
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
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

     /**
     * Get style
     * @return string|null
     */
    public function getStyle()
    {
        return $this->_get(self::STYLE);
    }

    /**
     * Set style
     * @param string $style
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setStyle($style)
    {
        return $this->setData(self::STYLE, $style);
    }

    /**
     * Get color_palette
     * @return string|null
     */
    public function getColor()
    {
        return $this->_get(self::COLOR);
    }

    /**
     * Set color_palette
     * @param string $color_palette
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setColor($color)
    {
        return $this->setData(self::COLOR, $color);
    }

    /**
     * Get message
     * @return string|null
     */
    public function getMessage()
    {
        return $this->_get(self::MESSAGE);
    }

    /**
     * Set message
     * @param string $message
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }
	
	/**
     * Get prefered
     * @return string|null
     */
    public function getPrefered()
    {
        return $this->_get(self::PREFERED);
    }

    /**
     * Set prefered
     * @param string $prefered
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setPrefered($prefered)
    {
        return $this->setData(self::PREFERED, $prefered);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
