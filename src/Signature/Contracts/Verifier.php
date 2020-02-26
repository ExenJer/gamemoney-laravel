<?php


namespace ExenJer\GamemoneyLaravel\Signature\Contracts;

use ExenJer\GamemoneyLaravel\Signature\SignatureVerificationData;

/**
 * Signature Verification Contract.
 *
 * @package ExenJer\GamemoneyLaravel\Signature\Contracts
 */
interface Verifier
{
    public function check(array $data): SignatureVerificationData ;
}
