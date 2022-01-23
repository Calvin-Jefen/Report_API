<?php

class controlpanel_model extends CI_Model
{
    public function getdatauser($datauser)
    {
        return $datauser;
    }


    public function getUser($id)
    {
        return $this->db->get_where('users', ['user_id' => $id])->result_array();
    }

    public function getReport($id)
    {
        return $this->db->get_where('report', ['user_id' => $id])->result_array();
    }

    public function deleteFwords($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('fwords');
    }
}
