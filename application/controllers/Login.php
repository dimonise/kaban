<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.06.2017
 * Time: 21:09
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {

        $this->load->view('layouts/header');
        $this->load->view('login');
        $this->load->view('layouts/footer');
    }

    public function forgot()
    {
        $this->load->view('layouts/header');
        $this->load->view('forgot');
        $this->load->view('layouts/footer');
    }
}