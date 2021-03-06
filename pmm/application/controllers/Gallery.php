<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
		$this->load->helper(['url','html','form']);
		$this->load->database();
		$this->load->library(['form_validation','session']);
	}

	public function index()
	{
		$data = [
			'images'	=> $this->Gallery_model->all()
		];
		$this->load->view('gallery/index', $data);
	}
	
	public function lists($list)
	{
		$data = [
			'images'	=> $this->Gallery_model->lists($list)
		];
		$this->load->view('gallery/lists', $data);
	}
	
	public function admeen()
	{
		$data = [
			'images'	=> $this->Gallery_model->all()
		];
		$this->load->view('gallery/admeen', $data);
	}
	
	public function view($id){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'author',
				                'label' => 'Author',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'lists',
				                'label' => 'List',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'category',
				                'label' => 'Category',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description',
				                'rules' => 'required'
				        ]
					];

		$this->form_validation->set_rules($rules);
		$image = $this->Gallery_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('gallery/view',['image'=>$image]);
		}
	}
	
	public function add(){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'author',
				                'label' => 'Author',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'lists',
				                'label' => 'List',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'category',
				                'label' => 'Category',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description',
				                'rules' => 'required'
				        ]
					];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('gallery/add_image');
		}
		else
		{

			/* Start Uploading File */
			$config =	[
							//records uploaded image in a folder
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			//'max_size'      => 100,
	            			//'max_width'     => 1024,
	            			//'max_height'    => 768
            			];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('gallery/add_image', $error);
            }
            else
            {
                    $file = $this->upload->data();
                    //print_r($file);
                    $data = [
                    			'file' 			=> 'uploads/' . $file['file_name'],
                    			'caption'		=> set_value('caption'),
                    			'author'		=> set_value('author'),
                    			'lists'			=> set_value('lists'),
                    			'category'		=> set_value('category'),
                    			'description'	=> set_value('description')
                    		];
                    $this->Gallery_model->create($data);
					$this->session->set_flashdata('message','New image has been added..');
					redirect('gallery');
            }
		}
	}

	public function edit($id){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'author',
				                'label' => 'Author',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'lists',
				                'label' => 'List',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'category',
				                'label' => 'Category',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description',
				                'rules' => 'required'
				        ]
					];

		$this->form_validation->set_rules($rules);
		$image = $this->Gallery_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('gallery/edit_image',['image'=>$image]);
		}
		else
		{
			if(isset($_FILES["userfile"]["name"]))
			{
				/* Start Uploading File */
				$config =	[
								'upload_path'	=> './uploads/',
		            			'allowed_types' => 'gif|jpg|png',
		            			//'max_size'      => 100,
		            			//'max_width'     => 1024,
		            			//'max_height'    => 768
	            			];

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload())
	            {
	                    $error = array('error' => $this->upload->display_errors());
						$this->load->view('gallery/edit_image',['image'=>$image,'error'=>$error]);
	            }
	            else
	            {
	                    $file = $this->upload->data();
	                    $data['file'] = 'uploads/' . $file['file_name'];
						unlink($image->file);
	            }
			}

			$data['caption']		= set_value('caption');
            $data['author']			= set_value('author');
            $data['lists']			= set_value('lists');
            $data['category']		= set_value('category');
			$data['description']	= set_value('description');
			
			$this->Gallery_model->update($id,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('gallery');
		}
	}


	public function delete($id)
	{
		$this->Gallery_model->delete($id);
		$this->session->set_flashdata('message','Image has been deleted..');
		redirect('gallery');
	}
}
