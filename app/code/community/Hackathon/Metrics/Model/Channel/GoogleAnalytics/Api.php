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
 * Channel_Datadog_Socket Model
 * @package Hackathon_Metrics
 *
 * Reference:
 * https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide
 *
 * Explore Data:
 * https://ga-dev-tools.appspot.com/explorer/
 *
 */
class Hackathon_Metrics_Model_Channel_GoogleAnalytics_Api
    extends Hackathon_Metrics_Model_Channel_Abstract
    implements Hackathon_Metrics_Model_Channel_Interface
{
    /**
     * {@inheritdoc}
     */
    public function send($key, $value, array $tags, $type)
    {


        $url = "https://www.google-analytics.com/collect";

        $parameters = array(
                'v'     =>  1,                                                                      // Version.
                'tid'   =>  Mage::getStoreConfig('hackathon_metrics/googleAnalytics_api/api_key'),  // Tracking ID / Property ID.
                'cid'   =>  Mage::helper('hackathon_metrics')->getGUID(),                           // Anonymous Client ID.
                't'     =>  'event',                                                                // Hit Type.
                'ea'    =>  'Action',
                'ec'    =>  'Magento',
                'el'    =>  $key,
                'ev'    =>  $value
            );

        $client = new Zend_Http_Client($url);

        foreach($parameters as $parameter=>$value){
            $client->setParameterPost($parameter, $value);
        }

        // POST request
        $client->request(Zend_Http_Client::POST);

    }
}