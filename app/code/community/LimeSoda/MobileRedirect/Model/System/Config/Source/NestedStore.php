<?php

class LimeSoda_MobileRedirect_Model_System_Config_Source_NestedStore
{
    protected $_options;
    
    public function toOptionArray()
    {
        if (!$this->_options) {
            
            $options = array(
                array(
                    'value' => null,
                    'label' => Mage::helper('limesoda_mobileredirect')->__('No redirect')
                )
            );
            
            foreach (Mage::getSingleton('adminhtml/system_store')->getWebsiteCollection() as $website) {
                $websiteName = $website->getName();
                foreach ($website->getGroups() as $group) {
                    $groupOption = array(
                        'value' => array(),
                        'label' => $websiteName . ' &gt; ' . $group->getName()
                    );
                    foreach ($group->getStores() as $store) {
                        $storeOption = array(
                            'value' => $store->getId(),
                            'label' => $store->getName()
                        );
                        $groupOption['value'][] = $storeOption;
                    }
                    $options[] = $groupOption;
                } 
            }
            $this->_options = $options;
        }        
        return $this->_options;
    }
}
