<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreRefundPayment.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment is Refundd.
 *
 * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::PRE_REFUND_PAYMENT
 */
class PreRefundPayment extends PrePaymentMethodOperation {
}
