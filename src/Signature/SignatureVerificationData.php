<?php


namespace ExenJer\GamemoneyLaravel\Signature;


use ExenJer\GamemoneyLaravel\Exceptions\SignatureException;

class SignatureVerificationData
{
    /**
     * @var bool
     */
    private $verified;

    /**
     * @var SignatureException|null
     */
    private $exception = null;

    /**
     * SignatureData constructor.
     *
     * @param bool $verified
     * @param SignatureException|null $exception
     */
    public function __construct(bool $verified, SignatureException $exception = null)
    {
        $this->verified = $verified;
        $this->exception = $exception;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * @return SignatureException|null
     */
    public function getException(): ?SignatureException
    {
        return $this->exception;
    }
}
