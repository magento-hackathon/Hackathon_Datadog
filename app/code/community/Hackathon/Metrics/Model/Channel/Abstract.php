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
 * Channel_Abstract Model
 * @package Hackathon_Metrics
 */
class Hackathon_Metrics_Model_Channel_Abstract
    extends Mage_Core_Model_Abstract
    implements Hackathon_Metrics_Model_Channel_Interface
{

    /**
     * {@inheritdoc}
     */
    public function send($key, $value, $type)
    {
        throw new RuntimeException("Please implement first!");
    }

}
