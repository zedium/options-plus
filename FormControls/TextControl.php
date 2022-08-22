<?php

namespace Zedium\FormControls;

class TextControl extends GeneralControl implements \Zedium\Interfaces\IRenderable
{

    public function render(): string
    {

        $output = (!empty($this->getId()) && !empty($this->getLabel()))?"<label for='{$this->getId()}'>{$this->getLabel()}</label>":'';
        $output .= "<input type='text' ";
        $output .= (!empty($this->getId()))?"id='{$this->getId()}' ":'';
        $output .= !empty($this->getName())?"name='{$this->getName()}' ":'';
        $output .= !empty($this->getValue())?"value='{$this->getValue()}' ":'';
        $output .= !empty($this->getPlaceholder())?"placeholder='{$this->getPlaceholder()}' ":'';
        $output .= !empty($this->getDisabled())?"disabled='disabled' ":'';
        $output .= '/>';

        return $output;

    }
}