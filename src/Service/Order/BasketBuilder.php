<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class BasketBuilder
{
    public Checkout $checkout;

    /**
     * BasketBuilder constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * @return void
     */
    public function reset(): void
    {
        $this->checkout = new Checkout;
    }

    /**
     * @return mixed
     */
    public function getProductsInfo(): array
    {
        return $this->checkout->productsInfo;
    }

    /**
     * @param array $productsInfo
     * @return BasketBuilder
     */
    public function setProductsInfo(array $productsInfo): self
    {
        $this->checkout->productsInfo = $productsInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->checkout->discount;
    }

    /**
     * @param mixed $discount
     * @return BasketBuilder
     */
    public function setDiscount(DiscountInterface $discount): self
    {
        $this->checkout->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBilling()
    {
        return $this->checkout->billing;
    }

    /**
     * @param mixed $billing
     * @return BasketBuilder
     */
    public function setBilling(BillingInterface $billing): self
    {
        $this->checkout->billing = $billing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->checkout->security;
    }

    /**
     * @param mixed $security
     * @return BasketBuilder
     */
    public function setSecurity(SecurityInterface $security): self
    {
        $this->checkout->security = $security;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommunication()
    {
        return $this->checkout->communication;
    }

    /**
     * @param mixed $communication
     * @return BasketBuilder
     */
    public function setCommunication(CommunicationInterface $communication): self
    {
        $this->checkout->communication = $communication;
        return $this;
    }

    /**
     * @return CheckoutProcess
     */
    public function build(): Checkout
    {
        $result = $this->checkout;
        $this->reset();
        return $result;
    }
}