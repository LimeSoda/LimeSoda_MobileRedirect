<?php

class LimeSoda_MobileRedirect_Model_Observer
{
    /**
     * Checks if the visitor should be redirected based on the user agent.
     * We issue a 302 redirect.
     * 
     * @param Varien_Event_Observer $observer
     * @return LimeSoda_MobileRedirect_Model_Observer
     */
    public function controllerActionPredispatch(Varien_Event_Observer $observer)
    {
        $helper = Mage::helper('limesoda_mobileredirect');
        if (!$helper->isEnabled()) {
            return $this;
        }
        
        if ($helper->isStoreViewForced()) {
            return $this;
        }

        $frontController = Mage::app()->getFrontController();
        $userAgent = $frontController->getRequest()->getServer('HTTP_USER_AGENT');
        $httpAccept = $frontController->getRequest()->getServer('HTTP_ACCEPT', null);
        $httpXWapProfile = $frontController->getRequest()->getServer('HTTP_X_WAP_PROFILE', null);
        $httpProfile = $frontController->getRequest()->getServer('HTTP_PROFILE', null);

        if (!$helper->isMobileUser($userAgent, $httpAccept, $httpXWapProfile, $httpProfile)) {
            return $this;
        }
        
        $store = $helper->getRedirectTarget();
        if (!$store->getId() || $store->getId() === Mage::app()->getStore()->getId()) {
            return $this;
        }
        
        $response = Mage::app()->getResponse();
        $response->setRedirect($store->getUrl(), 302);
        $response->sendResponse();
        exit;
    }
}
