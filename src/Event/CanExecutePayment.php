<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanExecutePayment.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched when checking whether a payment method
 * can execute a payment.
 *
 * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::CAN_EXECUTE_PAYMENT
 */
class CanExecutePayment extends CanPerformPaymentMethodOperation {
}
