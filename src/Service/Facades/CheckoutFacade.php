<?php


namespace Service\Facades;


use Service\Order\Checkout;
use Service\Order\CheckoutProcess;

class CheckoutFacade
{
    /**
     * прям облегчает очень то, что специально для этого наусложнялось ранее путем выделения в разные классы
     * @param $discount
     * @param $billing
     * @param $security
     * @param $communication
     * @param $productsInfo
     * @throws \Service\Billing\Exception\BillingException
     * @throws \Service\Communication\Exception\CommunicationException
     */
    public function checkout($discount, $billing, $security, $communication, $productsInfo)
    {
        $checkout = new Checkout($discount, $billing, $security, $communication, $productsInfo);
        $checkoutProgress = new CheckoutProcess($checkout);
        $checkoutProgress->checkoutProcess();
    }
}