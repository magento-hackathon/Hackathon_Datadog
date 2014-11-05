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

class Hackathon_Metrics_Model_Observer_Customer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function customerCustomerAuthenticated(Varien_Event_Observer $observer)
    {
        /** @var Hackathon_Metrics_Model_Queue $queue */
        $queue = Mage::getSingleton('hackathon_metrics/queue');
        $queue->addMessage('customer.login');

        return;
    }
}