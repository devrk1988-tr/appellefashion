<?php
namespace Orra\Career\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Escaper;
use Magento\Framework\Controller\Result\JsonFactory;

class Careerapplicationemail extends \Magento\Framework\App\Action\Action
{
    protected $_inlineTranslation;
    protected $_transportBuilder;
    protected $_escaper;
    protected const CAREERAPPLICATION_EMAIL = "career/careerindex/email";
    protected const TRANS_EMAIL = "trans_email/ident_support/email";
    protected const TRANS_NAME = "trans_email/ident_support/name";

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        ScopeConfigInterface $scopeConfigInterface,
        Escaper $_escaper,
        JsonFactory $resultJsonFactory
    ) {
        $this->_storeManager = $storeManager;
        $this->_transportBuilder = $transportBuilder;
        $this->_inlineTranslation = $inlineTranslation;
        $this->_scopeConfig = $scopeConfigInterface;
        $this->escaper=$_escaper;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        $emailIds = $this->_scopeConfig->getValue(self::CAREERAPPLICATION_EMAIL);
        $post = $this->getRequest()->getParams();
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($post);
        $recipientEmail = explode(",", $emailIds);
        $senderEmail = $this->_scopeConfig->getValue(self::TRANS_EMAIL);
        $senderName  = $this->_scopeConfig->getValue(self::TRANS_NAME);
        if (!$senderEmail && !$recipientEmail) {
            return false;
        }
        try {
            $this->_inlineTranslation->suspend();
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            $myname = 'Find the perfact solitaire enquiry';
           
            $sender = [
                'name' => $this->escaper->escapeHtml($myname),
                'email' => $this->escaper->escapeHtml($senderEmail),
            ];
            $transport = $this->_transportBuilder
                ->setTemplateIdentifier(self::CAREERAPPLICATION_EMAIL)// My email template
                ->setTemplateOptions([
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                    'store' => $this->_storeManager->getStore()->getId(),
                ])
                ->setTemplateVars($post)
                ->setFrom($sender)
                ->addTo($recipientEmail, 'Name')
                ->getTransport();
            $transport->sendMessage();
            $this->_inlineTranslation->resume();
            $result = "Thank you for your request.Our consultant team will revert back to you shortly.";

        } catch (\Exception $e) {
            $result = "Some Error Occured! Please try again.";
            $this->_inlineTranslation->resume();
        }
        return $resultJson->setData($result);
    }
}
