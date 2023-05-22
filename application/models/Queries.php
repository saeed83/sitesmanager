<?php
class Queries extends CI_Model
{
    function get_news($id = false)
    {
        $this->db->SELECT('id,title,body,image,aktiv,date,created_at');
        $this->db->FROM('articles');
        if ($id != false) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert($data, $table)
    {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function update($id, $data, $tbl_name)
    {
        $this->db->where('id', $id);
        $this->db->update($tbl_name, $data);
        return true;
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('articles');
    }
}
