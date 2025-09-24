<?php
namespace Orra\Career\Controller\Index;
 
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Upload extends \Magento\Framework\App\Action\Action
{
    
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
        UploaderFactory   $uploaderFactory,
        AdapterFactory    $adapterFactory,
        Filesystem        $filesystem,
    ) {
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;

    }
    public function execute()
    {
        $fileup = $this->getRequest()->getFiles('upload_file');

        try {
            $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'upload_file']); 
            $uploaderFactory->setAllowedExtensions(['docx', 'doc']); // you can add more extension which need
            $fileAdapter = $this->adapterFactory->create();
            $uploaderFactory->setAllowRenameFiles(true);
            $uploaderFactory->setFilesDispersion(true);
            $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
            $destinationPath = $mediaDirectory->getAbsolutePath('cv');
            $result = $uploaderFactory->save($destinationPath);
            if (!$result) {
                throw new LocalizedException(
                    __('File cannot be saved to path: $1', $destinationPath)
                );
            }
            // save file name 
            $File_upoad = $result['cv'];
        }  catch (\Exception $e) {
            $this->messageManager->addError(__('File not Uplaoded, Please try Agrain'));
        }
    }

}