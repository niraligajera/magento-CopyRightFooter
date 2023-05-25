<?php
/**
 * @category NG
 * @package  NG_CopyRightFooter
 * @license  Proprietary
 *
 * @author   Nirali Gajera <niraligajera8@gmail.com>
 */

namespace NG\CopyRightFooter\Plugin\Footer;

use Magento\Framework\App\Config\ScopeConfigInterface;


class AppConfigPlugin
{
    /**
     * @var templateFilter
     */
    protected $LoggerInterface;

    /**
     * @var templateFilter
     */
    private $templateFilter;


    public function __construct(       
        \Magento\Framework\Filter\Template $templateFilter
    ) {
        $this->templateFilter  = $templateFilter;
    }


    /**
     * update year value
     * 
     * @param ScopeConfigInterface $scope
     * @param $result
     * @param $path
     * @return mixed
     */
    public function afterGetValue(ScopeConfigInterface $scope, $result,$path = null,
        $scoped = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        $scopeCode = null
    )
    {

        if($path === 'design/footer/copyright') {            
            $this->templateFilter->setVariables([
                'date_Y'      => date('Y')
            ]);
            $result = $this->templateFilter->filter((string)$result);

        }
        return $result;
    }
}