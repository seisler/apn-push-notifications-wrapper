<?php

namespace ApnsBundle\Entity;


class ApnPushNotification
{
    /**
     * @var string
     */
    private $_deviceToken;

    /**
     * @var string
     */
    private $_text;

    /**
     * @var int
     */
    private $_badge;

    /**
     * @var array
     */
    private $_customProperties;

    /**
     * @var string
     */
    private $_sound;

    /**
     * @var int
     */
    private $_expiry;


    /**
     * Constructor
     * @param string $deviceToken
     * @param string $text
     * @param int $badge
     * @param int $expiry
     * @param array $customProperties
     * @param string $sound
     */
    public function __constructor(
        $deviceToken,
        $text,
        $badge = 1,
        $expiry = 30,
        $customProperties = array(),
        $sound = ''
    )
    {
        $this->setDeviceToken($deviceToken);
        $this->setText($text);
        $this->setBadge($badge);
        $this->setExpiry($expiry);
        $this->setCustomProperties($customProperties);
        $this->setSound($sound);
    }

    /**
     * @return string
     */
    public function getDeviceToken()
    {
        return $this->_deviceToken;
    }

    /**
     * @param string $deviceToken
     */
    public function setDeviceToken($deviceToken)
    {
        $this->_deviceToken = $deviceToken;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->_text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->_text = $text;
    }

    /**
     * @return int
     */
    public function getBadge()
    {
        return $this->_badge;
    }

    /**
     * @param int $badge
     */
    public function setBadge($badge)
    {
        $this->_badge = $badge;
    }

    /**
     * @return array
     */
    public function getCustomProperties()
    {
        return $this->_customProperties;
    }

    /**
     * @param array $customProperties
     */
    public function setCustomProperties($customProperties)
    {
        $this->_customProperties = $customProperties;
    }

    /**
     * @return string
     */
    public function getSound()
    {
        return $this->_sound;
    }

    /**
     * @param string $sound
     */
    public function setSound($sound)
    {
        $this->_sound = $sound;
    }

    /**
     * @return mixed
     */
    public function getExpiry()
    {
        return $this->_expiry;
    }

    /**
     * @param mixed $expiry
     */
    public function setExpiry($expiry)
    {
        $this->_expiry = $expiry;
    }
}