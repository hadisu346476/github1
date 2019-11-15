 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Dash extends CI_Controller {  
      //functions  
      public function index(){  
      if (!$this->session->userdata('logged_in')) 
    {
      redirect(base_url().'auth/index');
    }
           $this->load->model("User");  
           $data["fetch_data"] = $this->User->fetch_data();
            $this->load->view('include/header', $data);
          $this->load->view('include/navbar');  
           //$this->load->view("AddNewsForm");  
           $this->load->view("AddNewsForm", $data); 
           $this->load->view('include/footer'); 
      }  
      public function form_validation()  
      {  
           //echo 'OK';  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules("title", "Title", 'required');  
           $this->form_validation->set_rules("details", "Details", 'required');   
           if($this->form_validation->run())  
           {  
                //true  
                $this->load->model("User");  
                $data = array(  
                     "title"     =>$this->input->post("title"),  
                     "details"          =>$this->input->post("details")  
                );  
                if($this->input->post("update"))  
                {  
                     $this->User->update_data($data, $this->input->post("hidden_id"));  
                     redirect(base_url() . "Dash/updated");  
                }  
                if($this->input->post("insert"))  
                {  
                     $this->User->insert_data($data);  
                     redirect(base_url() . "Dash/inserted");  
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
      }  
      public function inserted()  
      {  
           $this->index();  
      }  
      public function delete_data(){  
           $id = $this->uri->segment(3);  
           $this->load->model("User");  
           $this->User->delete_data($id);  
           redirect(base_url() . "Dash/deleted");  
      }  
      public function deleted()  
      {  
           $this->index();  
      }  
      public function update_data(){  
           $user_id = $this->uri->segment(3);  
           $this->load->model("User");  
           $data["user_data"] = $this->User->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->User->fetch_data();  
           $this->load->view("AddNewsForm", $data);  
      }  
      public function updated()  
      {  
           $this->index();  
      }  
 } 
