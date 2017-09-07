<?php
include 'Translator.php';

$browserLocale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$language = array_key_exists('lang', $_GET) ? $_GET['lang'] : null;
$language = $language === null ? Locale::getPrimaryLanguage($browserLocale) : $language;

$translator = new Translator($language);
echo $translator->translate('test_label');