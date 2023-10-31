<?php

namespace FacturaScripts\Core\Template;

abstract class SectionTab extends UIComponent
{
    /** @var string */
    public $icon;

    /** @var string */
    public $counter = 0;

    /** @var string */
    public $label;

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}