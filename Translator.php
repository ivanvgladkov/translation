<?php

class Translator
{
    private $language;
    private $translations = [];

    public function __construct($language)
    {
        $this->language = $language;
        $this->loadTranslations();
    }

    private function loadTranslations()
    {
        $path = './translations/' . $this->language . '.json';

        if (file_exists($path)) {
            $content = file_get_contents($path);
            $this->translations = json_decode($content, true);
        }
    }

    public function translate($label)
    {
        if (array_key_exists($label, $this->translations)) {
            return $this->translations[$label];
        }

        return $label;
    }
}