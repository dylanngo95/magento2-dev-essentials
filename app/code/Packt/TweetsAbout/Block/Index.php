<?php

namespace Packt\TweetsAbout\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @return string
     */
    public function getMagentoUrl()
    {
        return $this->getData('urlMagento');
    }

    /**
     * @return string
     */
    public function getPHPUrl()
    {
        return $this->getData('urlPHP');
    }

    /**
     * @return string
     */
    public function getPacktUrl()
    {
        return $this->getData('urlPackt');
    }
}