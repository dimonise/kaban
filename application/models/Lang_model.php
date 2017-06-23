<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lang_model extends CI_Model
{

    function index($language = null)
    {
        if ($language != null) {
            $lang = $language;
        } else {
            $lang = $this->uri->segment(1);
        }
        if (isset($lang) and $lang == 'en') {
            $this->language = $lang;
        } else {
            $lang = 'ru';
        }

        // подгружаем нужный язык

        switch ($lang) {

            case 'en':

                $this->lang->load('main_lang', 'english');
                $this->config->set_item('language', 'english');
                break;

            default:
                $this->lang->load('main_lang', 'russian');
                $this->config->set_item('language', 'russian');
                break;
        }
        return $lang;
    }

}

