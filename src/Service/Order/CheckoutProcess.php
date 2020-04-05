<?php


namespace Service\Order;

use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckoutProcess
{
    public array $productsInfo;
    public DiscountInterface $discount;
    public BillingInterface $billing;
    public SecurityInterface $security;
    public CommunicationInterface $communication;

    public function checkoutProcess(): void
    {
        $totalPrice = 0;
        foreach ($this->productsInfo as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}