<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.06.2017
 * Time: 21:02
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function index(){

        $this->load->view('layouts/header');
        $this->load->view('registration');
        $this->load->view('layouts/footer');
    }

    public function creat_user()
    {
        //$data['lang'] = $this->input->post('lang');
       // $this->load->model('lang_model');
        //$this->lang_model->index($data['lang']);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_fname_label'), 'required');
        $this->form_validation->set_rules('nick', $this->lang->line('create_user_lname_label'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_email_label'), 'valid_email|required');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_password_label'), 'min_length[8]|required|alpha_numeric|matches[re_pass]');
        $this->form_validation->set_rules('re_pass', $this->lang->line('create_user_password_confirm_label'), 'min_length[8]|required|alpha_numeric');
        $this->form_validation->set_rules('ruler', $this->lang->line('create_user_check_rules'), 'callback_ruler');

        $this->form_validation->set_rules('hide_bday', $this->lang->line('bdat'), 'required');
        $this->form_validation->set_rules('hide_bmon', $this->lang->line('bmon'), 'required');
        $this->form_validation->set_rules('hide_byear', $this->lang->line('byer'), 'required');

        if ($data['lang'] == 'ru') {
            $this->form_validation->set_message('required', $this->lang->line('form_validation_required'));
            $this->form_validation->set_message('matches', $this->lang->line('form_validation_matches'));

        }


        if ($this->form_validation->run() == FALSE) {

            $error = strip_tags(validation_errors());
            $res['error'] = '1';
            $res['msg'] = "ERROR \n" . $error;
            echo json_encode($res);
        } else {
//User existence check

            $arr = array('side' => $this->uri->segment(2));
            $this->session->set_userdata($arr);
            $side = $this->input->post('side');
            $this->db->where('email', $this->input->post('email'));
            $co = $this->db->count_all_results('users');
            if ($co > 0) {
                $res['error'] = '1';
                $res['msg'] = $this->lang->line('issue');
                echo json_encode($res);
//                $this->load->view('ci_auth/creat_user', $data);
            } else {
                $like_games = '';
                $lgame = $this->input->post('like_game');

                for ($i = 0; $i < count($lgame); $i++) {
                    $like_games .= $lgame[$i] . "/";
                }

                if ($data['lang']) {
                    $this->load->helper('trans_helper');
                    $username = transliterate($this->input->post('nick'));
                } else {
                    $username = $this->input->post('nick');
                }
                $s = "1234567890abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE";
                $g = substr($s, rand(0, strlen($s)), 25);
                $bdate = $this->input->post('hide_bday') . '.' . $this->input->post('hide_bmon') . '.' . $this->input->post('hide_byear');
                if ($bdate != '..') {
                    $a = str_replace('.', '-', $bdate);

                    $new_date_birth = $a . ' 01:00:00';
//            echo $datas['bdate'];
//            die;
                    $new_date_birth = strtotime($new_date_birth);
                    $now = time();
                    $diff = $now - $new_date_birth;
                    $diff = $diff / 2592000;

                    $ag = $diff / 12;
                    $new_date_birth = round($ag, 0, PHP_ROUND_HALF_DOWN) - 1;
                } else {
                    $new_date_birth = 0;
                }

                $opt = array(
                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                    'activation_code' => $g,
                    'first_name' => $this->input->post('first_name'),
                    'sex' => $this->input->post('gender'),
                    'bdate' => $bdate,
                    'age' => $new_date_birth,
                    'country' => $this->input->post('country'),
                    'city' => $this->input->post('city'),
                    'email' => $this->input->post('email'),
                    'descr' => $this->input->post('descr'),
                    'password' => md5($this->input->post('password')),
                    'username' => $username,
                    'like_games' => $like_games,
                    'side' => $side
                );

                $this->db->insert('users', $opt);
                //recive activation code to email user

                $to = $this->input->post('email');
                $code = base_url() . 'auth/activation/' . $g;
                $message = $this->lang->line('email_act_code') . "<br> " . $code;


                $this->email->from('everyplayer@game.com', 'Admin');
                $this->email->to($to);
                $this->email->subject('Activation account');
                $this->email->message($message);

                $this->email->send();
                $res['msg'] = $this->lang->line('go_pass');
                echo json_encode($res);
            }
        }
    }
}