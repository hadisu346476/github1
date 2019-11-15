
<?php  
class User extends CI_Model  
{  
	function test_main()  
	{  
		echo "This is model function";  
	}  
	function insert_data($data)  
	{  
		$this->db->insert("news", $data);  
	}  
	function fetch_data()  
	{  
	           //$query = $this->db->get("news");  
	           //select * from news  
	           //$query = $this->db->query("SELECT * FROM news ORDER BY id DESC");  
		$this->db->select("*");  
		$this->db->from("news");  
		$query = $this->db->get();  
		return $query;  
	}  
	function delete_data($id){  
		$this->db->where("id", $id);  
		$this->db->delete("news");  
	           //DELETE FROM news WHERE id = $id  
	}  
	function fetch_single_data($id)  
	{  
		$this->db->where("id", $id);  
		$query = $this->db->get("news");  
		return $query;  
	           //Select * FROM news where id = '$id'  
	}  
	function update_data($data, $id)  
	{  
		$this->db->where("id", $id);  
		$this->db->update("news", $data);  
	           //UPDATE news SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
	}

	public function login_val($u)
	{
		$this->db->where('auth_username', $u);
		$sql = $this->db->get('auth');
		return $sql->result();
	}  
}  



