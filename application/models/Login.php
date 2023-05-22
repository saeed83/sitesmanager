<?php
class Login extends CI_Model
{
    function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $dbpassword = $row->password;
                $decrypted_password = $this->encryption->decrypt($dbpassword);
                if ($decrypted_password == $password) {
                    $this->session->set_userdata('id', $row->id);
                    $this->session->set_userdata('role', $row->role);
                    return 'done';
                }
            }
        } else {
            return 'faild';
        }
    }


    // public function manuelesregistrieren()
    // {
    //     $user = array(
    //         'userName' => 'user1',
    //         'password' => 'pass@123',
    //         'role' => '1'
    //     );
    //     $password = "pass@123";
    //     $ciphertext = $this->encryption->encrypt($password);

    //     echo "ciphertex : " . $ciphertext;
    //     echo "<br>";
    //     // Outputs: This is a plain-text message!
    //     echo $this->encryption->decrypt($ciphertext);
      
    // }
}
