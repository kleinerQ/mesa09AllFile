<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kleinerq extends CI_Controller {


	public function index()
	{




        $query=$this->db->query("select * from product");
        $num=$query->num_rows();

        if($this->input->get('x') != null && $this->input->get('y') != null){

            $data['title']="Welcome : {$num}";
            $data['corpname']= "Big QQQ";

            $x= $this->input->get('x');
            $y= $this->input->get('y');
            $result=$x+$y;




            $data['x']=$x;
            $data['y']=$y;
            $data['result']=$result;

            $this->load->view('temps/header');
            $this->load->view('kleinerq',$data);
            $this->load->view('temps/footer');
            //$this->load->view('welcome_message');



        }else{

            $this->load->view('temps/header');
            $this->load->view('kleinerq2');
            $this->load->view('temps/footer');


        }





	}
}
