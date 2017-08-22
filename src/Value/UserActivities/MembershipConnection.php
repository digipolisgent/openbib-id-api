<?php

namespace OpenBibIdApi\Value\UserActivities;

use OpenBibIdApi\Value\StringLiteral\StringLiteral;
use OpenBibIdApi\Value\ValueInterface;

class MembershipConnection implements ValueInterface
{
    /**
     * The library ID.
     *
     * @var StringLiteral
     */
    private $library;

    /**
     * The barcode of the library membership.
     *
     * @var StringLiteral
     */
    private $barcode;

    /**
     * The verification code. Most likely a birth date in format ddmmyyyy.
     *
     * @var StringLiteral
     */
    private $verification;

    /**
     * A user session ID for optional logging or debugging.
     *
     * @var StringLiteral
     */
    private $logSessionId;

    /**
     * Force use of static methods to create MembershipConnection objects.
     */
    private function __construct()
    {
    }

    /**
     * Builds a MembershipConnection object from an array.
     *
     * @param array $values
     *   An array containing the connection values:
     *   - library (string)
     *   - barcode (string)
     *   - verification (string)
     *   - logSessionId (string) (optional)
     *
     * @return MembershipConnection
     *   An MembershipConnection object
     */
    public static function fromArray(array $values)
    {
        $class = new static();

        foreach ($values as $property => $value) {
            $function = 'set' . ucfirst($property);

            if (method_exists(__CLASS__, $function)) {
              $class->$function($value);
            }
        }

        return $class;
    }

    /**
     * Sets the library ID.
     *
     * @param StringLiteral $library
     *    The ID of the library.
     */
    public function setLibrary($library)
    {
        $this->library = $library;
    }

    /**
     * Sets the barcode.
     *
     * @param StringLiteral
     *    The barcode.
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * Sets the verification code.
     *
     * @param StringLiteral
     *    The verification code.
     */
    public function setVerification($verification)
    {
        $this->verification = $verification;
    }

    /**
     * Sets the session ID for optional logging of user session.
     *
     * @param StringLiteral
     *    The user session ID.
     */
    public function setLogSessionId($logSessionId)
    {
        $this->logSessionId = $logSessionId;
    }

    /**
     * Gets the library ID.
     *
     * @return StringLiteral
     *   The ID of the library.
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * Gets the barcode.
     *
     * @return StringLiteral
     *   The barcode.
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Gets the verification code.
     *
     * @return StringLiteral
     *   The verification code.
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * Gets the session ID for optional logging of user session.
     *
     * @return StringLiteral
     *   The user session ID.
     */
    public function getLogSessionId()
    {
        return $this->logSessionId;
    }
}
