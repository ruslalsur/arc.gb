<?php


namespace Service\Order;

use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckoutProcess
{
    private array $productsInfo;
    private DiscountInterface $discount;
    private BillingInterface $billing;
    private SecurityInterface $security;
    private CommunicationInterface $communication;

    /**
     * CheckoutProcess constructor.
     */
    public function __construct(Checkout $checkout)
    {
        $this->productsInfo = $checkout->productsInfo;
        $this->discount = $checkout->discount;
        $this->billing = $checkout->billing;
        $this->security = $checkout->security;
        $this->communication = $checkout->communication;
    }

    /**
     * перенесено в отдельный класс
     * @throws \Service\Billing\Exception\BillingException
     * @throws \Service\Communication\Exception\CommunicationException
     */
    public function checkoutProcess(): void
    {
        $totalPrice = 0;

        foreach ($this->productsInfo as $product) {
            $totalPrice += $product->getPrice();
        }

        $totalPrice = $totalPrice - $totalPrice / 100 * $this->discount->getDiscount();
        $this->billing->pay($totalPrice);
        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}