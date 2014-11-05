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
require_once(Mage::getBaseDir('lib') . '/Datadog/datadogstatsd.php');

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
    public function send($key, $value, array $tags, $type)
    {
        switch ($type) {
            case Hackathon_Metrics_Model_Config::CHANNEL_MESSAGE_TYPE_INCREMENT:
                Datadogstatsd::increment($key, 1, $tags);
                break;
            case Hackathon_Metrics_Model_Config::CHANNEL_MESSAGE_TYPE_HISTOGRAM:
                Datadogstatsd::histogram($key, $value, 1, $tags);
                break;
            case Hackathon_Metrics_Model_Config::CHANNEL_MESSAGE_TYPE_GAUGE:
                Datadogstatsd::gauge($key, $value, 1, $tags);
                break;
            case Hackathon_Metrics_Model_Config::CHANNEL_MESSAGE_TYPE_TIMING:
                Datadogstatsd::timing($key, microtime(), 1, $tags);
                break;
            case Hackathon_Metrics_Model_Config::CHANNEL_MESSAGE_TYPE_SET:
                Datadogstatsd::set($key, $value, 1, $tags);
                break;
            default:
                throw new ErrorException("This type doesn't exist.");
        }
        return $this;
    }

}