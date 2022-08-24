<?php

namespace Zedium\FormControls;

class CheckBoxControl extends GeneralControl implements \Zedium\Interfaces\IRenderable
{

    private $is_checked;

    public function __construct($type = '', $id = '', $name = '', $label = '', $value = '', $placeholder = '', $disabled = '', $section ='')
    {
        parent::__construct($type, $id, $name, $label, $value, $placeholder, $disabled, $section);

    }

    public function render()
    {


        $this->setValue( get_option($this->getName(),null) ?? '' );
        $this->setIsChecked( get_option($this->getName(),null) ?? '' );

        $output = (!empty($this->getId()) && !empty($this->getLabel()))?"<label for='{$this->getId()}'>{$this->getLabel()}</label>":'';
        $output .= "<input type='checkbox' ";
        $output .= (!empty($this->getId()))?"id='{$this->getId()}' ":'';
        $output .= !empty($this->getName())?"name='{$this->getName()}' ":'';
        $output .= !empty($this->getValue())?"value='{$this->getValue()}' ":'';
        $output .= !empty($this->getDisabled())?"disabled='disabled' ":'';
        $output .= !empty($this->getIsChecked())?"checked='checked' ":'';
        $output .= '/>';

        echo $output;

    }


    /**
     * @return mixed
     */
    public function getIsChecked()
    {
        return $this->is_checked;
    }

    /**
     * @param mixed $is_checked
     */
    public function setIsChecked($is_checked): void
    {
        $this->is_checked = $is_checked;
    }
}
