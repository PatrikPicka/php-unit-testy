<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length="255", name="delivery_address")
     */
    private $deliveryAddress;

    /**
     * @ORM\Column(type="string", length="255", name="delivery_name")
     */
    private $deliveryName;

    /**
     * @ORM\Column(type="integer", name="final_price")
     */
    private $finalPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $status = 1;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var \DateTimeInterface
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     * @var \DateTimeInterface
     */
    private $updatedAt;
    
    /**
     * @ORM\Column(type="datetime", name="canceled_at", nullable=true)
     * @var \DateTimeInterface
     */
    private $canceledAt;

    

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTimeInterface
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTimeInterface  $updatedAt
     */ 
    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get the value of createdAt
     *
     * @return  \DateTimeInterface
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param  \DateTimeInterface  $createdAt
     */ 
    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get the value of deliveryName
     */ 
    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    /**
     * Set the value of deliveryName
     */ 
    public function setDeliveryName($deliveryName)
    {
        $this->deliveryName = $deliveryName;
    }

    /**
     * Get the value of deliveryAddress
     */ 
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * Set the value of deliveryAddress
     */ 
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of finalPrice
     */ 
    public function getFinalPrice()
    {
        return $this->finalPrice;
    }

    /**
     * Set the value of finalPrice
     */ 
    public function setFinalPrice($finalPrice)
    {
        $this->finalPrice = $finalPrice;
    }

    /**
     * Get the value of canceledAt
     *
     * @return  \DateTimeInterface
     */ 
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * Set the value of canceledAt
     *
     * @param  \DateTimeInterface  $canceledAt
     */ 
    public function setCanceledAt(\DateTimeInterface $canceledAt)
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
    }
}