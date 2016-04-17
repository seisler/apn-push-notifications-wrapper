<?php

namespace ApnsBundle\Service;

use ApnsBundle\Entity\ApnPushNotification;
use ApnsPHP_Push;

class ApnsPhpWrapper
{
    /**
     * @var ApnsPHP_Push
     */
    private $_apnsPush;

    /**
     * ApnsPhpWrapper constructor.
     * @param ApnsPHP_Push $apnsPush
     */
    public function __construct(
        ApnsPHP_Push $apnsPush
    )
    {
        $this->_apnsPush = $apnsPush;
    }

    /**
     * @param ApnPushNotification $notification
     * @throws \ApnsPHP_Exception
     * @throws \ApnsPHP_Push_Exception
     */
    public function sendPushNotification(ApnPushNotification $notification)
    {
        $this->_apnsPush->connect();
        $this->_apnsPush->add($this->_createMessage($notification));
        $this->_apnsPush->send();
        $this->_apnsPush->disconnect();
    }

    /**
     * @param ApnPushNotification $notification
     * @return \ApnsPHP_Message
     * @throws \ApnsPHP_Message_Exception
     */
    private function _createMessage(ApnPushNotification $notification)
    {
        $message = new \ApnsPHP_Message($notification->getDeviceToken());
        $message->setBadge($notification->getBadge());
        $message->setSound($notification->getSound());
        $message->setText($notification->getText());
        $message->setExpiry($notification->getExpiry());

        foreach ($notification->getCustomProperties() as $name => $customProperty) {
            $message->setCustomProperty($name, $customProperty);
        }

        return $message;
    }
}