<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\EventDispatcher\Event\PreCapturePayment.
 */

namespace Commercie\Payment\Bridge\Symfony\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before a payment is captured.
 *
 * @see \Commercie\Payment\Bridge\Symfony\EventDispatcher\EventDispatcher::PRE_CAPTURE_PAYMENT
 */
class PreCapturePayment extends PrePaymentMethodOperation {
}
