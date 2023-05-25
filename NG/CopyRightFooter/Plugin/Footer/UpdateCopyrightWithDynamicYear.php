<?php
/**
 * @category NG
 * @package  NG_CopyRightFooter
 * @license  Proprietary
 *
 * @author   Nirali Gajera <niraligajera8@gmail.com>
 */
namespace NG\CopyRightFooter\Plugin\Footer;

use Magento\Theme\Block\Html\Footer;

class UpdateCopyrightWithDynamicYear
{

    private $templateFilter;

    public function __construct(        
        \Magento\Framework\Filter\Template $templateFilter
    ) {
        $this->templateFilter  = $templateFilter;

    }

    /**
     * @param Footer $subject
     * @param string $result
     * @return string $result
     */
    public function afterGetCopyright(Footer $subject, $result)
    {        
        $this->templateFilter->setVariables([
            'date_Y'      => date('Y')
        ]);

       return $this->templateFilter->filter((string)$result);

    }


}