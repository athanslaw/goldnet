<?php
class Page_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
		$this->load->library('email');
    }

	public function contact()
	{
		$date = date("Y-n-d H:i:s", time());
		$cname = $this->input->post('name');
		$customer = $this->input->post('email');
		$phone = $this->input->post('phone');
		$message = $this->input->post('message').' Posted by '.$cname.', Phone: '.$phone;
		$subject = "Enquiry from GoldNet Consult";
		$email = "info@goldnet.com.ng";
		$data1 = array('sender_email' => $customer, 'receiver_email' => $email, 
		'dates' => $date, 'subject' => $subject, 'content' => $message, 'phone' => $phone, 'name' => $cname);
		$query = $this->db->insert("enquiries", $data1);
		$this->alert_mdl->send_alert('admin', "Contact Request posted on ".date('Y-n-d')." by ".$cname, 
			"viewenquiries", 0);

         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($customer, $cname); 
         $this->email->to($email);
         $this->email->subject($subject); 
         $this->email->message($message);
 
         //Send mail 
         if($this->email->send() && $query==1){
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Thanks For adding to our rich customer coverage.!');
		}else{
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Message Posting Failed.!');
		}
	}

	public function contactdelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('enquiries');
		$this->session->set_flashdata('class', 'alert alert-success');
		$this->session->set_flashdata('content', 'Enquiry fully Deleted');
	}
	
	public function createpage()
	{
        $title = trim($this->input->post('title'));
        $slug = strtolower(str_replace(' ','-',$title));
        $content = $this->input->post('content');
        $status = '0';
		
		if($this->input->post("send")!=null){
			$data1 = array('page_title' => $title, 'slug' => $slug, 'content' => $content, 'status' => $status);
			$data['query'] = $this->db->insert("pages", $data1);
			if($data['query']==1){
			   $this->session->set_flashdata('class', 'alert alert-success');
			   $this->session->set_flashdata('content', 'Page Successfully Created!');
			}else{
			   $this->session->set_flashdata('class', 'alert alert-danger');
			   $this->session->set_flashdata('content', 'Operation failed due to internal error!');
			}
		}
	}
	
	public function newsletter()
	{
        $email = trim($this->input->post('email'));
        $status = '1';
		
		if($this->input->post("sends")!=null){
			$data1 = array('email_address' => $email, 'status' => $status);
			$data['query'] = $this->db->insert("newsletter", $data1);
			if($data['query']==1){
			   $this->session->set_flashdata('class1', 'alert alert-success');
			   $this->session->set_flashdata('content1', 'Congrats! Your email has been added successfully');
			}else{
			   $this->session->set_flashdata('class1', 'alert alert-danger');
			   $this->session->set_flashdata('content1', 'Operation failed due to internal error!');
			}
		}
	}
	
	public function editpage($slug=''){
		$title = trim($this->input->post('title')); 
		$content = trim($this->input->post('content')); 
		$data1 = array('page_title' => $title, 'content' => $content);

		$data['query'] = $this->db->update("pages", $data1, array('slug' => ($slug)));
		if($data['query']==1){
			$this->session->set_flashdata('content', 'Pages Successfully Updated!');
			$this->session->set_flashdata('class', 'alert alert-success');
		}else{
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
			$this->session->set_flashdata('class', 'alert alert-danger');
		}
	}

	public function getcms($id)
	{
        $query = $this->db->get_where('cms', array('name' => $id));
        $query = $query->row();
		return $query->content;
	}
	
	public function getenquiries()
	{
		$this->db->order_by('dates DESC');
		$query=$this->db->get('enquiries');
        $query = $query->result();
        return $query;
	}
	
	public function getenquiry($id)
	{
		//$this->db->order_by('id DESC');
		$query=$this->db->get_where('enquiries', array('id'=>$id));
        $query = $query->row();
        return $query;
	}
	
	public function getpagebyslug($slug)
	{
        $query = $this->db->get_where('pages', array('slug' =>$slug));
		return $query->row();
	}
	
	public function getpages($status=0)
	{
		if ($status == 1)
        {
			$query = $this->db->get_where('pages', array('status' => 1));
                return $query->result();
        }
		$query = $this->db->get('pages');
        return $query->result();
	}
	
	public function lga($state)
	{
        $query=$this->db->get_where('lga', array('state' => $state));
        return $query->result();
	}

	public function getlga($state='')
	{
 		$this->db->select('*'); 
		$this->db->order_by("lga","asc");
        $query=$this->db->get('lga');
        $query = $query->result();
		return $query;
	}
	
	public function pagechangestatus($id = "")
	{
		$query = $this->db->get_where('pages', array('slug' => $id));
		$query = $query->row();
		$this->db->where('slug', $id);
		$query1 = $this->db->update('pages', array('status' =>($query->status-1)*(-1)));
		return "Page Successfully Modified";
	}
	
	public function pagechangestatusgroup()
	{
		$no =0;
		if($this->input->post('page_id')!=NULL)
		foreach($this->input->post('page_id') as $id){
			$no+=1;
			$query = $this->db->get_where('pages', array('slug' => $id));
			$query = $query->row();
			$query1=$this->db->where('slug', $id);
			$query1 = $this->db->update('pages', array('status' =>($query->status-1)*(-1)));
		}
		if($no ==0){
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('content', 'No Item Selected. Check the boxes you wish to modify and try again');
			return;
		}
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Pages Successfully Updated');
			return;
	}

	public function pagedelete($id)
	{
		$this->db->where('slug', $id);
		$this->db->delete('pages');
		$this->session->set_flashdata('class', 'alert alert-success');
		$this->session->set_flashdata('content', 'Page Successfully Deleted');
	}
	
	public function pagedeletegroup()
	{if($this->input->post('post_id')!=null)
		foreach($this->input->post('post_id') as $id){
			$this->db->where('slug', $id);
			$this->db->delete('pages');
		}
		$this->session->set_flashdata('class', 'alert alert-success');
		$this->session->set_flashdata('content', 'Pages Successfully Deleted');
	}
	
	public function postreply($id="")
	{
		$email = $this->getenquiry($this->input->post('id'))->sender_email;
		$message = $this->input->post('message').' <br /><i><br><a href="http://www.lathaninfotech.com..ng">Lathan Info Tech Solutions</a></i>';
		$subject = $this->input->post('subject');
		
		//Load email library
		$this->load->library('email');
		$this->email->from("admin@lathaninfotech.com.ng", "Lathan Info Tech Solutions");
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($this->email->send()){
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Email Sent Successfully!');
		}else{
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('content', 'Error in sending Email.!');
		}
	}

	public function social($id)
	{
        $query = $this->db->get_where('social', array('id' => $id));
        $query = $query->row();
        return $query;
	}

	public function sociallinksedit()
	{
        $name = trim($_POST['name']); 
		$link = trim($_POST['name']);
		$status = 0;
		$content = '';
		$data1 = array('name' => $name, 'link'=>$link, 'status' => $status);
		$this->session->set_flashdata('class', 'alert alert-success');
		$this->session->set_flashdata('content', 'Uploaded successfully!');
		$data['query'] = $this->db->insert("social", $data1);
		if($data['query']==1){
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('content', 'Success! Social Link successfully modified!');
		}else{
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('content', 'Operation failed due to internal error!');
		}
	}
	
	public function state($country='')
	{
		if ($country !== "")
        {
			$query = $this->db->get_where('state', array('country' => $country));
                return $query->result();
        }
		$query = $this->db->get('stateoforigin');
        return $query->result();
	}
	
	public function voguepay_check($slug)
	{
		$userid = $this->session->userdata('userid');
		$query = $this->db->get_where('voguepay_parameter', array('book_slug' => $slug, 'userid' => $userid));
        return count($query->result());
	}
	
	public function voguepay_notification(){
			//get the full transaction details as a json from voguepay
			$json = file_get_contents('https://voguepay.com/?v_transaction_id='.$_POST['transaction_id'].'&type=json');
			//create new array to store our transaction detail
			$transaction = json_decode($json, true);
			
			//Now we have the following keys in our $transaction array
			$merchant_id=$transaction['merchant_id'];
			$transaction_id=$transaction['transaction_id'];
			$email=$transaction['email'];
			$total=$transaction['total'];
			$merchant_ref=$transaction['merchant_ref']; 
			$memo=$transaction['memo'];
			$status=$transaction['status'];
			$date=$transaction['date'];
			$referrer=$transaction['referrer'];
			$method=$transaction['method'];
			$userid = $this->session->userdata('userid');
			
			if($transaction['total'] == 0) return $merchant_ref;
			if($transaction['status'] != 'Approved') return $merchant_ref;
			
				$data1 = array('transaction_id' => $transaction_id, 'merchant_id' => $merchant_id, 
				'memo' => $memo, 'email' => $email, 'status' => $status, 'amount' => $total,
				'referrer' => $referrer, 'method' => $method, 'book_slug' => $merchant_ref, 'transaction_date' => $date, 'userid' => $userid);
				$query = $this->db->insert("voguepay_parameter", $data1);
		
			return $merchant_ref;
	}

}