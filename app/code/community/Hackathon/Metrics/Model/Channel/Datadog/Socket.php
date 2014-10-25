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

require_once 'Datadog/Datadogstatsd.php';

/**
 * Channel_Datadog_Socket Model
 * @package Hackathon_Metrics
 */
class Hackathon_Metrics_Model_Channel_Datadog_Socket
    extends Hackathon_Metrics_Model_Channel_Abstract
    implements Hackathon_Metrics_Model_Channel_Interface
{

    /**
     * {@inheritdoc}
     */
    public function send($key, $value)
    {
        Datadogstatsd::increment($key, $value);
        return $this;
    }

}