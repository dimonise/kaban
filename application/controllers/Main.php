<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     *
     */
    public function index()
    {
        $this->load->model('lang_model');
        $data['lang'] = $this->lang_model->index();

        $this->load->model('main_model');

        $data['first_cat'] = $this->main_model->select_first_five_category();
        $data['sub_cat_parent'] = $this->main_model->select_first_subcat();
        $data['geo'] = $this->main_model->select_city();

        $this->load->view('layouts/header');
        $this->load->view('home_page', $data);
        $this->load->view('layouts/footer');
    }
}
