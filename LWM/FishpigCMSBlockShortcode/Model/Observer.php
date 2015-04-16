<?php
/*
* Hook the new shortcode to the wordpress_shortcode_apply event
*/
class LWM_FishpigCMSBlockShortcode_Model_Observer
{
    public function applyShortCodes($objs)
    {
        $content = $objs->getContent()->getContent();
        $obj = $objs->getObject();
        Mage::helper('magentocmsshortcode')->apply($content, $obj);
        $objs->getContent()->setContent($content);
    }
}