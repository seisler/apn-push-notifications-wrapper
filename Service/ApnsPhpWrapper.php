<?php

namespace Seisler\ApnsBundle\Service;

use Seisler\ApnsBundle\Entity\ApnPushNotification;
use ApnsPHP_Push;

/**
 * Class ApnsPhpWrapper
 * @package ApnsBundle\Service
 */
class ApnsPhpWrapper
{
    /**
     * @var ApnsPHP_Push
     */
    private $apnsPush;

    /**
     * ApnsPhpWrapper constructor.
     * @param ApnsPHP_Push $apnsPush
     */
    public function __construct(
        ApnsPHP_Push $apnsPush
    )
    {
        $this->apnsPush = $apnsPush;
    }

    /**
     * @param ApnPushNotification $notification
     * @throws \ApnsPHP_Exception
     * @throws \ApnsPHP_Push_Exception
     */
    public function sendPushNotification(ApnPushNotification $notification)
    {
        $this->apnsPush->connect();
        $this->apnsPush->add($this->createMessage($notification));
        $this->apnsPush->send();
        $this->apnsPush->disconnect();
    }

    /**
     * @param ApnPushNotification $notification
     * @return \ApnsPHP_Message
     * @throws \ApnsPHP_Message_Exception
     */
    private function createMessage(ApnPushNotification $notification)
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
