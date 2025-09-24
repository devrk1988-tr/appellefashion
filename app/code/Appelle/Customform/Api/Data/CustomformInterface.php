<?php
declare(strict_types=1);

namespace Appelle\Customform\Api\Data;

interface CustomformInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
	const ID = 'id';
    const FULL_NAME = 'full_name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const STYLE = 'style';
    const OCCASION = 'color';
    const MESSAGE = 'message';
	const PREFERED = 'prefered';
    const CREATED_AT = 'created_at';


    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Appelle\Customform\Api\Data\CustomformExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Appelle\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Appelle\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
    );

    /**
     * Get first_name
     * @return string|null
     */
    public function getFullName();

    /**
     * Set first_name
     * @param string $firstName
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setFullName($fullName);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setEmail($email);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setPhone($phone);
	
	/**
     * Get style
     * @return string|null
     */
    public function getStyle();

    /**
     * Set style
     * @param string $style
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setStyle($style);

    /**
     * Get color
     * @return string|null
     */
    public function getColor();

    /**
     * Set color
     * @param string $message
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setColor($color);
	
    /**
     * Get message
     * @return string|null
     */
    public function getMessage();

    /**
     * Set message
     * @param string $message
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setMessage($message);

    /**
     * Get image
     * @return string|null
     */
    public function getPrefered();

    /**
     * Set image
     * @param string $image
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setPrefered($prefered);
	
    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Appelle\Customform\Api\Data\CustomformInterface
     */
    public function setCreatedAt($createdAt);
}
