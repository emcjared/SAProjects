<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EffortOutput_model extends MY_Model{

    public function __construct(){
        parent::__construct('effortoutputs');
        $this->load->model('EffortType_model', 'efforttype');
    }

    public function get_list($efforttypes_id){
        $data = array();

        $this->db->select( 'id', FALSE );
        $this->db->select( 'name', FALSE );
        $this->db->from($this->table);
        $this->db->where(array('efforttypes_id' => $efforttypes_id));
        $this->db->order_by('sortorder', 'ASC');
        $this->db->order_by('name', 'ASC');

        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $data[$row['id']]=$row['name'];
        }

        return $data;

    }

    public function get($where){
        $this->db->select( $this->table.'.*', FALSE );

        $this->db->from($this->table);
        $this->db->where($where);

        $this->db->order_by('sortorder', 'ASC');
        $this->db->order_by('name', 'ASC');

        $sql = $this->db->get_compiled_select(null, FALSE);

        $query = $this->db->get();
        return $query->result_array();
    }

}