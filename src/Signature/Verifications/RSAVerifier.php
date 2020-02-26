<?php


namespace ExenJer\GamemoneyLaravel\Signature\Verifications;

use ExenJer\GamemoneyLaravel\Exceptions\SignatureMismatchException;
use ExenJer\GamemoneyLaravel\Exceptions\SignatureNotFoundException;
use ExenJer\GamemoneyLaravel\Exceptions\SignatureVerificationException;
use ExenJer\GamemoneyLaravel\Signature\Contracts\Verifier;
use ExenJer\GamemoneyLaravel\Signature\SignatureVerificationData;
use ExenJer\GamemoneyLaravel\Utilities\Arr;

class RSAVerifier implements Verifier
{
    /**
     * @var string
     */
    private $publicCertificate;

    /**
     * RSAVerifier constructor.
     *
     * @param string $publicCertificate
     */
    public function __construct(string $publicCertificate)
    {
        $this->publicCertificate = $publicCertificate;
    }

    /**
     * @param array $data
     * @return SignatureVerificationData
     */
    public function check(array $data): SignatureVerificationData
    {
        if (empty($data['signature'])) {
            return new SignatureVerificationData(
                false, new SignatureNotFoundException('Signature not found')
            );
        }

        $signature = base64_decode($data['signature']);
        unset($data['signature']);
        $stringSignature = Arr::toSignString($data);

        $publicKey = openssl_pkey_get_public(file_get_contents($this->publicCertificate));

        $signatureVerification = openssl_verify($stringSignature, $signature, $publicKey, 'sha256');

        return $this->signatureVerificationDataVerify($signatureVerification);
    }

    /**
     * @param int $signatureVerification
     * @return SignatureVerificationData
     */
    private function signatureVerificationDataVerify(int $signatureVerification): SignatureVerificationData
    {
        switch ($signatureVerification) {
            case -1:
                return new SignatureVerificationData(
                    false, new SignatureVerificationException(openssl_error_string())
                );
            case 0: {
                return new SignatureVerificationData(
                    false, new SignatureMismatchException('Signature mismatch')
                );
            }
        }

        return new SignatureVerificationData(true);
    }
}
