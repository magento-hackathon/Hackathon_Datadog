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

class Hackathon_Metrics_Model_Queue
{
    protected $_messages = array();

    /**
     * add a key/value pair to the stack
     *
     * @param $key
     * @param $value
     */
    public function addMessage($key, $value)
    {
        $this->_messages[$key] = $value;
    }

    public function __destruct()
    {
        $this->sendMessages();
    }

    public function sendMessages()
    {
        foreach ($this->getActiveChannels() as $channel) {
            // TODO check if $channel follows interface

            foreach ($this->_messages as $key => $value) {
                $channel->send($key, $value);
            }
        }
    }

    /**
     * get list of all active channels to push data to
     *
     * @return array
     */
    protected function getActiveChannels()
    {
        $channels = array();

        // TODO implement
    }
}