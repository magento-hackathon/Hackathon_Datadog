<?php
/**
 * This file is part of Hackathon_Metrics for Magento.
 *
 * @license OSL v3
 * @author Marco Bamert <mb@bami.ch> <@marcobamert>
 * @category Hackathon
 * @package Hackathon_Metrics
 * @copyright Copyright (c) 2014 Magento Hackathon (http://mage-hackathon.de)
 */

class Hackathon_Metrics_Model_Observer_Core
{
    public function controllerActionLayoutLoadBefore(Varien_Event_Observer $observer)
    {
        /** @var Mage_Core_Controller_Varien_Action $action */
        $action = $observer->getAction();

        $key = 'core.page.view.' . $action->getFullActionName();

        /** @var Hackathon_Metrics_Model_Queue $queue */
        $queue = Mage::getSingleton('hackathon_metrics/queue');
        $queue->addMessage($key);
    }
}