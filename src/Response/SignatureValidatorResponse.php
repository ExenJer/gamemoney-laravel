<?php


namespace ExenJer\GamemoneyLaravel\Response;

use ExenJer\GamemoneyLaravel\Exceptions\SignatureException;
use ExenJer\GamemoneyLaravel\Exceptions\SignatureNotFoundException;
use ExenJer\GamemoneyLaravel\Exceptions\SignatureVerificationException;
use ExenJer\GamemoneyLaravel\Signature\Contracts\Verifier;
use ExenJer\GamemoneyLaravel\Signature\SignatureVerificationData;

class SignatureValidatorResponse
{
    /**
     * @param Verifier $verifier
     * @param array $data
     * @return array
     */
    public function response(Verifier $verifier, array $data): array
    {
        $signatureValidator = $verifier->check($data);

        return $signatureValidator->isVerified() ? $this->getSuccess() :
            $this->getError(
                $this->getExceptionMessage($signatureValidator->getException())
            );
    }

    /**
     * @param SignatureException|null $exception
     * @return string
     */
    private function getExceptionMessage(?SignatureException $exception): string
    {
        if (! $exception) {
            return 'Unknown Exception';
        }

        return $exception->getMessage();
    }

    /**
     * @param string $error
     * @return array
     */
    private function getError(string $error): array
    {
        return ['success' => 'false', 'error' => $error];
    }

    /**
     * @return array
     */
    private function getSuccess(): array
    {
        return ['success' => 'true'];
    }
}
