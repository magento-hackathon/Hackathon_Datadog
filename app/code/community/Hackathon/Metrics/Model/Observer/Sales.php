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

class Hackathon_Metrics_Model_Observer_Sales
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function salesOrderPlaceAfter(Varien_Event_Observer $observer)
    {
        /** @var Hackathon_Metrics_Model_Queue $queue */
        $queue = Mage::getSingleton('hackathon_metrics/queue');

        /** @var Mage_Sales_Model_Order $order */
        $order = $observer->getOrder();

        // Order currency
        $queue->addMessage('sales_order', $order->getGrandTotal(), [
            'currency' => $order->getOrderCurrency()
        ]);

        // Base currency
        $queue->addMessage('sales_order.base', $order->getBaseGrandTotal(), [
            'currency' => $order->getBaseCurrency()
        ]);

        return;
    }
}