<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class BasketBuilder
{
    public CheckoutProcess $checkoutProgress;

    /**
     * BasketBuilder constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * @return CheckoutProcess
     */
    public function reset(): void
    {
        $this->checkoutProgress = new CheckoutProcess();
    }

    /**
     * @return mixed
     */
    public function getProductsInfo(): array
    {
        return $this->checkoutProgress->productsInfo;
    }

    /**
     * @param array $productsInfo
     * @return BasketBuilder
     */
    public function setProductsInfo(array $productsInfo): self
    {
        $this->checkoutProgress->productsInfo = $productsInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->checkoutProgress->discount;
    }

    /**
     * @param mixed $discount
     * @return BasketBuilder
     */
    public function setDiscount(DiscountInterface $discount): self
    {
        $this->checkoutProgress->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBilling()
    {
        return $this->checkoutProgress->billing;
    }

    /**
     * @param mixed $billing
     * @return BasketBuilder
     */
    public function setBilling(BillingInterface $billing): self
    {
        $this->checkoutProgress->billing = $billing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->checkoutProgress->security;
    }

    /**
     * @param mixed $security
     * @return BasketBuilder
     */
    public function setSecurity(SecurityInterface $security): self
    {
        $this->checkoutProgress->security = $security;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommunication()
    {
        return $this->checkoutProgress->communication;
    }

    /**
     * @param mixed $communication
     * @return BasketBuilder
     */
    public function setCommunication(CommunicationInterface $communication): self
    {
        $this->checkoutProgress->communication = $communication;
        return $this;
    }

    /**
     * @return CheckoutProcess
     */
    public function build(): CheckoutProcess
    {
        $result = $this->checkoutProgress;
        $this->reset();
        return $result;
    }
}