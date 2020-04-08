<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class Checkout
{
    public DiscountInterface $discount;
    public BillingInterface $billing;
    public SecurityInterface $security;
    public CommunicationInterface $communication;
    public array $productsInfo;

    /**
     * Checkout constructor.
     * @param DiscountInterface $discount
     * @param BillingInterface $billing
     * @param SecurityInterface $security
     * @param CommunicationInterface $communication
     * @param array $productsInfo
     */
    public function __construct(
        DiscountInterface $discount,
        BillingInterface $billing,
        SecurityInterface $security,
        CommunicationInterface $communication,
        array $productsInfo
    )
    {
        $this->discount = $discount;
        $this->billing = $billing;
        $this->security = $security;
        $this->communication = $communication;
        $this->productsInfo = $productsInfo;
    }
}