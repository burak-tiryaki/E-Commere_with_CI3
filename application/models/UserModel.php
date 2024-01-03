<?php
class UserModel extends CI_Model{

    public function registerUser($data)
    {
        return $this->db->insert("users",$data);
    }

    public function loginUser($data)
    {
        $where = array(
            "email" => $data["email"],
            "password" => $data["password"]
        );

        $user = $this->db
                ->where($where)
                ->limit(1)
                ->get("users");

        if($user->num_rows() == 1){
            return $user->row();
        }
        else
            return FALSE;
    }

    public function getAllUser($where= array())
    {
        return $this->db
                    ->where($where)
                    ->order_by('user_id')
                    ->get('users')
                    ->result();
    }

    public function getOneUser($where= array())
    {
        return $this->db
                    ->where($where)
                    ->order_by('user_id')
                    ->get('users')
                    ->row();
    }

    public function updateUser($data)
    {
        $this->db
                ->where('user_id',$data["user_id"])
                ->update('users',$data);
    }

    public function deleteUser($userId)
    {
        $this->db
            ->where('user_id',$userId)
            ->delete('users');
    }

    public function userMailCheck($email,$userId)
    {
        return $this->db
                ->where('user_id !=',$userId)
                ->where('email',$email)
                ->count_all_results('users');
    }
}