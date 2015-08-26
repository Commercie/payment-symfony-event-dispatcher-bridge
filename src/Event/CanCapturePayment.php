<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event\CanCapturePayment.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched when checking whether a payment method
 * can capture a payment.
 *
 * @see \BartFeenstra\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::CAN_CAPTURE_PAYMENT
 */
class CanCapturePayment extends CanPerformPaymentMethodOperation {
}
