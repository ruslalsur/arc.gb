<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class Checkout
{
    public array $productsInfo;
    public DiscountInterface $discount;
    public BillingInterface $billing;
    public SecurityInterface $security;
    public CommunicationInterface $communication;

}