<?php
namespace Appelle\WhatsappChat\Block;

use Magento\Framework\View\Element\Template;

class Whatsapp extends Template
{
    protected $_template = 'Appelle_WhatsappChat::whatsapp.phtml';

    public function getWhatsappNumber()
    {
        // Replace with your desired WhatsApp number or retrieve from system configuration
        return '+447480486764'; 
    }

    public function getWhatsappMessage()
    {
        // Replace with your desired WhatsApp message or retrieve from system configuration
        return 'Hi';
    }

    public function getWhatsappLink()
    {
        $number = $this->getWhatsappNumber();
        $message = $this->getWhatsappMessage();
        $encodedMessage = rawurlencode($message);
        return "https://wa.me/{$number}?text={$encodedMessage}";
    }
}
