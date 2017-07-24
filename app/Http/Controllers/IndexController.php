<?php

namespace App\Http\Controllers;

use Nextform\Config\XmlConfig as FormConfig;
use Nextform\Renderer\Renderer as FormRenderer;
use Nextform\Validation\Validation as FormValidation;

class IndexController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->formConfig = new FormConfig(
            realpath(__DIR__ . '/../../../resources/config/forms/register.xml')
        );
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
        $validation = new FormValidation($this->formConfig);

        if (isset($_POST) && ! empty($_POST)) {
            $validation->addData($_POST);
        }

        return $validation->validate();
    }
}