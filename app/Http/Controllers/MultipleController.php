<?php

namespace App\Http\Controllers;

use Nextform\Config\XmlConfig as FormConfig;
use Nextform\Renderer\Renderer as FormRenderer;
use Nextform\Validation\Validation as FormValidation;
use Nextform\Session\Session as FormSession;
use Nextform\FileHandler\FileHandler as FormFileHandler;
use Nextform\Session\Exception\NoValidationFoundException;

class MultipleController extends Controller
{
     /**
     * @var FormConfig
     */
    private $profileForm = null;

    /**
     * @var FormConfig
     */
    private $addressForm = null;

    /**
     * @var null
     */
    private $formSession = null;

    /**
     * @var null
     */
    private $profileValidation = null;

    /**
     * @var null
     */
    private $addressValidation = null;

    /**
     * @var FormFileHandler
     */
    private $profileFileHandler = null;

    /**
     *
     */
    public function __construct()
    {
        $this->profileForm = new FormConfig(
            realpath(__DIR__ . '/../../../resources/config/forms/multiple/profile.xml')
        );

        $this->addressForm = new FormConfig(
            realpath(__DIR__ . '/../../../resources/config/forms/multiple/address.xml')
        );

        $this->profileValidation = new FormValidation($this->profileForm);
        $this->addressValidation = new FormValidation($this->addressForm);
        $this->profileFileHandler = new FormFileHandler(
            $this->profileForm,
            realpath(__DIR__ . '/../../../resources/temp/uploads')
        );

        $this->formSession = new FormSession('multiple', $this->profileForm, $this->addressForm);
        $this->formSession->enableSeparatedFileUploads(true);
        $this->formSession->enableCsrfToken(true);

        $this->formSession->addValidation($this->profileValidation, $this->addressValidation);
        $this->formSession->addFileHandler($this->profileFileHandler);

        $this->formSession->onComplete(function($data, &$result){
            // print_r($data);
        });
    }

    /**
     *
     */
    public function submitAction()
    {
        return $this->formSession->process();
    }

    /**
     *
     */
    public function indexAction()
    {
        $profileRenderer = new FormRenderer($this->profileForm);
        $addressRenderer = new FormRenderer($this->addressForm);

        return view('pages.multiple')
                ->with('profileForm', $profileRenderer)
                ->with('addressForm', $addressRenderer);
    }
}