<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{
    /**
     * Created by PhpStorm.
     * User: димон
     * Date: 03.06.2017
     * Time: 8:11
     */

    public function select_first_five_category()
    {
        $this->db->limit(5);
        $query = $this->db->get('category');
        return $query->result();
    }

    public function select_first_subcat()
    {
        $this->db->where('parents', 0);
        $this->db->limit(6);
        $query = $this->db->get("sub_category");
        return $query->result();

    }

    public function select_children_subcat($id_parent = null)
    {
        $this->db->where('parents', $id_parent);
        $this->db->limit(5);
        $query = $this->db->get("sub_category");
        return $query->result();
    }

    public function select_city(){
        $query = $this->db->get("city");
        return $query->result();
    }
}