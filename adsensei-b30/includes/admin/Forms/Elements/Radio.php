<?php
namespace wpadsensei\Forms\Elements;


use wpadsensei\Forms\ElementsWithOptions;

/**
 * Class Radio
 * @package wpadsensei\Forms\Elements
 */
class Radio extends ElementsWithOptions
{

    /**
     * @return string
     */
    protected function prepareOutput()
    {
        $output = '';

        foreach ($this->options as $id => $value)
        {
            $checked = ($this->default && $this->default === $value) ? " checked=''" : '';

            $attributeId = $this->getId($id);

            $output .= "<input type='radio' name='{$this->getId()}' id='{$attributeId}' value='{$id}' {$checked}/>";
            $output .= "<label for='{$attributeId}'>{$value}</label>";
        }

        return $output;
    }

    /**
     * @return string
     */
    public function render()
    {
        return ($this->renderFile) ? @file_get_contents($this->renderFile) : $this->prepareOutput();
    }
}