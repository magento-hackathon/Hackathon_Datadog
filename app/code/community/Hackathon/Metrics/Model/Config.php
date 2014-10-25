<?php
/**
 * This file is part of Hackathon_Metrics for Magento.
 *
 * @license OSL v3
 * @author Jacques Bodin-Hullin <j.bodinhullin@monsieurbiz.com> <@jacquesbh>
 * @category Hackathon
 * @package Hackathon_Metrics
 * @copyright Copyright (c) 2014 Magento Hackathon (http://mage-hackathon.de)
 */

/**
 * Config Model
 * @package Hackathon_Metrics
 */
class Hackathon_Metrics_Model_Config extends Mage_Core_Model_Abstract
{

    const CONFIG_XML_NODE_CHANNELS = 'global/metrics/channels';

    const CHANNEL_MESSAGE_TYPE_INCREMENT = 'increment';
    const CHANNEL_MESSAGE_TYPE_HISTOGRAM = 'histogram';
    const CHANNEL_MESSAGE_TYPE_GAUGE     = 'gauge';
    const CHANNEL_MESSAGE_TYPE_TIMING    = 'timing';

    /**
     * Is active?
     * @return bool
     */
    public function isActive()
    {
        return Mage::helper('hackathon_metrics')->isModuleOutputEnabled();
    }

    /**
     * Retrieve the channels model
     * @return array
     */
    public function getActiveChannels()
    {
        // Not active?
        if (!$this->isActive()) {
            return [];
        }

        if (!$activeChannels = $this->getData('_active_channels')) {
            $activeChannels = [];
            $config = Mage::app()->getConfig();
            $nodes = $config->getNode(self::CONFIG_XML_NODE_CHANNELS)->children();
            foreach ($nodes as $node) {
                $activeChannels[$node->getName()] = Mage::getSingleton((string) $node->model);
            }
            $this->setData('_active_channels', $activeChannels);
        }

        return $activeChannels;
    }

}