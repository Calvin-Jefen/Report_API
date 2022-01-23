<?php

class fWords_model extends CI_Model
{
    public function getfWords($id)
    {
        return $this->db->get_where('fwords', ['user_id' => $id])->result_array();
    }

    function getUserId($email)
    {
        return $this->db->query("SELECT user_id FROM users WHERE user_email ='$email'")->result_array();
    }

    public function inserFwords($data)
    {
        $this->db->insert('fwords', $data);
        return $this->db->affected_rows();
    }

    public function checkfwords($data)
    {
        $query = $this->db
            ->where('user_id', $data['user_id'])
            ->where('fwords', $data['fwords'])
            ->get('fwords')
            ->num_rows();
        return $query;
    }
}
