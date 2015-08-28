<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreExecutePayment.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment is executed.
 *
 * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::PRE_EXECUTE_PAYMENT
 */
class PreExecutePayment extends PrePaymentMethodOperation {
}
