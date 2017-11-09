<?php

namespace FireGento\PluginDemo\Plugin;

use Magento\Contact\Block\ContactForm;

class ContactFormPlugin
{
    public function aroundGetFormAction(ContactForm $subject, \Closure $proceed)
    {
        $result = $proceed();
        return 'https://www.google.de/' . $result;
    }
//    public function afterGetFormAction(ContactForm $subject, $result)
//    {
//        $result .= '?firegento=true';
//        return $result;
//    }
}