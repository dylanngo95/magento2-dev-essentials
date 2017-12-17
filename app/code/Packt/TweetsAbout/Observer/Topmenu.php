<?php

namespace Packt\TweetsAbout\Observer;

use \Magento\Framework\Event\Observer as EventObserver;
use \Magento\Framework\Data\Tree\Node;
use \Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\App\ObjectManager;

class Topmenu implements ObserverInterface
{
    /**
     * @param EventObserver $observer
     *
     * @return $this
     */
    public function execute(EventObserver $observer)
    {
        /** @var \Magento\Framework\UrlInterface $urlInterface */
        $urlInterface = ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');

        /** @var \Magento\Framework\Data\Tree\Node $menu */
        $menu = $observer->getMenu();

        $menu->addChild(new Node([
                'name' => __("TweetsAbout"),
                'id'   => 'tweetmenu',
                'url'  => $urlInterface->getBaseUrl() . 'tweetsabout',
                'is_active' => $this->isActive($urlInterface)
            ],'id', $menu->getTree(), $menu)
        );

        return $this;
    }

    /**
     * @param \Magento\Framework\UrlInterface $urlInterface
     *
     * @return bool|int
     */
    private function isActive($urlInterface)
    {
        return strpos($urlInterface->getCurrentUrl(), "tweetsabout");
    }
}