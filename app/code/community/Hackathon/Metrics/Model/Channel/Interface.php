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
 * Channel_Interface Interface
 * @package Hackathon_Metrics
 */
interface Hackathon_Metrics_Model_Channel_Interface
{

    /**
     * Send data
     * @param string $key The metric key
     * @param string|int $value The metric value
     * @param string $type The metric type
     */
    public function send($key, $value, $type);

}
