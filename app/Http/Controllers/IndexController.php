<?php

namespace App\Http\Controllers;

use Nextform\Config\XmlConfig as FormConfig;
use Nextform\Renderer\Renderer as FormRenderer;
use Nextform\Validation\Validation as FormValidation;
use Nextform\Validation\CsrfToken\CsrfToken;

class IndexController extends Controller
{
    /**
     * @var FormConfig
     */
    private $formConfig;

    /**
     * @var FormValidation
     */
    private $formValidation;

    /**
     *
     */
    public function __construct()
    {
        $config = realpath(__DIR__ . '/../../../resources/config/forms/index/register.xml');

        $this->formConfig = new FormConfig($config);
        $this->formValidation = new FormValidation($this->formConfig);

        $this->formConfig->enableCsrfToken(true);
    }

    /**
     *
     */
    public function indexAction()
    {
        $renderer = new FormRenderer($this->formConfig);

        return view('pages.index')->with('form', $renderer);
    }

    /**
     *
     */
    public function validateAction()
    {
        if ($this->formConfig->isCsrfTokenEnabled() && ! $this->formConfig->checkCsrfToken()) {
            return response('', 500);
        }

        $this->formValidation->addData(array_merge(
            $_GET, $_POST, $_FILES
        ));

        return $this->formValidation->validate();
    }
}