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

    const CONFIG_XML_PATH_GENERAL_ACTIVE = 'hackathon_metrics/general/is_active';

    /**
     * Is active?
     * @return bool
     */
    public function isActive()
    {
        return Mage::helper('hackathon_metrics')->isModuleOutputEnabled()
            && Mage::getStoreConfigFlag(self::CONFIG_XML_PATH_GENERAL_ACTIVE)
        ;
    }

}