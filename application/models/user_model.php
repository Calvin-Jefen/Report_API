<?php

class user_model extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('users', ['user_email' => $email])->result_array();
    }

    function getUserId($email)
    {
        return $this->db->query("SELECT user_id FROM users WHERE user_email ='$email'")->result_array();
    }

    public function createUser($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function deleteMahasiswa($id)
    {
        $this->db->delete('mahasiswa', ['id' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    public function createMahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id)
    {
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
