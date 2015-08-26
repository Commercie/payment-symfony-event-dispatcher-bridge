<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\PreRefundPayment.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment is Refundd.
 *
 * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::PRE_REFUND_PAYMENT
 */
class PreRefundPayment extends PrePaymentMethodOperation {
}
