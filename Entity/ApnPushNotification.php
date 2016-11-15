<?php

namespace Seisler\ApnsBundle\Entity;

/**
 * Class ApnPushNotification
 * @package ApnsBundle\Entity
 */
class ApnPushNotification
{
    /**
     * @var string
     */
    private $deviceToken;

    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $badge;

    /**
     * @var array
     */
    private $customProperties;

    /**
     * @var string
     */
    private $sound;

    /**
     * @var int
     */
    private $expiry;


    /**
     * Constructor
     * @param string $deviceToken
     * @param string $text
     * @param int $badge
     * @param int $expiry
     * @param array $customProperties
     * @param string $sound
     */
    public function __construct(
        $deviceToken,
        $text,
        $badge = 1,
        $expiry = 30,
        $customProperties = array(),
        $sound = ''
    )
    {
        $this->deviceToken = $deviceToken;
        $this->text = $text;
        $this->badge = $badge;
        $this->expiry = $expiry;
        $this->customProperties = $customProperties;
        $this->sound = $sound;
    }

    /**
     * @return string
     */
    public function getDeviceToken()
    {
        return $this->deviceToken;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @return array
     */
    public function getCustomProperties()
    {
        return $this->customProperties;
    }

    /**
     * @return string
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * @return mixed
     */
    public function getExpiry()
    {
        return $this->expiry;
    }
}
