<?php


namespace Service\Order;


class CheckoutProcess
{
    private Checkout $checkout;

    /**
     * процесс заказа
     * CheckoutProcess constructor.
     * @param Checkout $checkout
     */
    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * @throws \Service\Billing\Exception\BillingException
     * @throws \Service\Communication\Exception\CommunicationException
     */
    public function checkoutProcess(): void
    {
        $totalPrice = 0;
        foreach ($this->checkout->productsInfo as $product) {
            $totalPrice += $product->getPrice();
        }

        $totalPrice = $totalPrice - $totalPrice / 100 * $this->checkout->discount->getDiscount();

        $this->checkout->billing->pay($totalPrice);

        $user = $this->checkout->security->getUser();
        $this->checkout->communication->process($user, 'checkout_template');
    }
}