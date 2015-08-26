<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanRefundPayment.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched when checking whether a payment method
 * can refund a payment.
 *
 * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::CAN_REFUND_PAYMENT
 */
class CanRefundPayment extends CanPerformPaymentMethodOperation {
}
