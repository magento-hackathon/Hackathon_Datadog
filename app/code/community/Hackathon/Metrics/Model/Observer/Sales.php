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
        /** @var Mage_Sales_Model_Order $order */
        $order = $observer->getOrder();

        $orderAmount = $order->getGrandTotal();
        $orderCurrency = $order->getOrderCurrency();
        $originalKey = 'magento.sales_order.' . $orderCurrency;

        $baseCurrency = $order->getBaseCurrency();
        $baseAmount = $order->getGrandTotal();
        $baseKey = 'magento.sales_order'.$baseCurrency;

        /** @var Hackathon_Metrics_Model_Queue $queue */
        $queue = Mage::getSingleton('hackathon_metrics/queue');

        $queue->addMessage($originalKey, $orderAmount);
        $queue->addMessage($baseKey, $baseAmount);

        return;
    }
}