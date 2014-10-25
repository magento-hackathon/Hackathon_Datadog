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
 * Datadog Model
 * @package Hackathon_Metrics
 */
class Hackathon_Metrics_Model_Datadog
    extends Hackathon_Metrics_Model_Abstract
{
    public function pushData($key, $value){

        $curl = new Varien_Http_Adapter_Curl();
        $curl->setConfig(array(
            'timeout'   => 15
        ));

        //$url = $this->getUrlKey();
        $url = 'https://app.datadoghq.com/api/v1/series?api_key=ddce98e4385d428bf8be81132e111f1c';

        $headers ='Content-type: application/json';

        $data = array('series'=> array(array(
                'metric' => 'page.loaded',
                'points' => array(array(time(), 1)),
                'type' => 'gauge',
                'host' => 'magento1901.dev',
                'tags' => array('test')
                ))
        );

        $content = json_encode($data);

        $curl->write(Zend_Http_Client::POST, $url, '1.0', $headers, $content);

        try{
            $curl->read();
        } catch(Exception $e){
            Mage::logException($e);
        }

        Mage::log($curl->getError());


        $curl->close();

    }

    public function connect($url, $apiKey){

    }
}