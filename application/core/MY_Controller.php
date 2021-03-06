<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	* @property $config MY_Config
	* @property $load CI_Loader
	* @property $session CI_Session
	* @property $current_user User_model
	* @property $user_model User_model
	* @property $facebook Facebook
	* @property $cache CI_Cache
	* @property $comment_model Comment_model
	* @property $question_model Question_model
	* @property $answer_model Answer_model
	* @property $quiz_model Quiz_model
	* @property $badge_model Badge_model
	* @property $vocabulary_model Vocabulary_model
	* @property $sentence_model Sentence_model
	* @property $badge_model Badge_model
	* @property $blog_model Blog_model
	* @property $point_model Point_model
	* @property $input CI_Input
	*/
	class MY_Controller extends CI_Controller
	{
		public $current_user;

		public function __construct()
		{
			parent::__construct();                                 

			//TODO : Use autoload for these.
			$this->load->database();
			$this->load->library('facebook',$this->config->facebook);
			$this->load->driver('session');
			$this->load->library('session');
			$this->load->driver('cache',array('adapter' => 'apc' , 'backup' => 'file'));

			$this->load->model('user_model');
			$this->load->model('vocabulary_model');
			$this->load->model('sentence_model');
			$this->load->model('badge_model');
			$this->load->model('blog_model');
			$this->load->model('quiz_model');
			$this->load->model('lesson_model');
			$this->load->model('point_model');

			$this->load->helper('url');

			if($this->is_logged_in())
			{
				$this->current_user =  $this->user_model->by_id($this->session->userdata('user_id'));

				if($this->session->userdata('is_group_member') == null)
				{
					$info = $this->facebook->api( '/'.$this->current_user->fb_username.'/groups', 'GET',array('access_token' => $this->facebook->getAccessToken()));
					if(!$info['data'])
					{
						$login_params = array('scope' =>'email,user_groups,user_games_activity,friends_groups,publish_stream');
						$login_url = $this->facebook->getLoginUrl($login_params);
						redirect($login_url);
						die();
					}
					foreach($info['data'] as $group)
					{
						if($group['id'] == $this->config->item('group_id'))
							return $this->session->set_userdata('is_group_member',true);

					}

					die("Sorry. You are not a member of our facebook group. Bye.");
				}


				//get to-do list or notifications.

			}

		}

		public function is_logged_in()
		{  
			return ($this->session->userdata('user_id') !== null);
		}

		public function force_to_login()
		{
			if($this->is_logged_in())
			{             
				if(!$this->current_user)
				{
					//visitor has a session user_id but we dont have it in db.
					$this->session->set_userdata("user_id",null);

					$this->goToLogin();
				}
			}
			else
			{       
				$this->goToLogin();

			}
		}

		public function goToLogin()
		{
			redirect(site_url('home')  . "?redirect_to="  . str_replace('/index.php','' ,$_SERVER['REQUEST_URI'] ));
			die();    
		}

		//for these metods (check_{permission}) we can create a "no permission" page.
		public function check_admin()
		{
			if(!$this->current_user->is_admin)
			{      
				redirect(site_url('home'));
				die();
			}
		}

		public function check_moderator()
		{
			if(!$this->current_user->is_moderator)
			{      
				redirect(site_url('home'));
				die();
			}
		}

		public function header()
		{
			return $this->load->view('common/header',null,true);
		}

		public function footer()
		{
			return $this->load->view('common/footer',null,true);
		}

		public function sidebar()
		{
			return $this->load->view('common/sidebar',null,true);
		}

		public function common_data($controller_data = array())
		{
			$data = array();
			$data['current_user'] = &$this->current_user;
			$data['controller'] = &$this;
			$data['random_word'] = $this->vocabulary_model->get_random();


			if($this->is_logged_in())
			{
				//if($this->current_user->is_student)

				$data['todolist'] = $this->quiz_model->get_non_markeds($this->current_user->user_id);
				$data['points'] = $this->point_model->get_by_user_id($this->current_user->user_id);
			}


			return array_merge($data,$controller_data);
		}

		/* fuck you codeigniter!
		public function __get($property_name)
		{
		if(strpos($property_name,'_model') > 0)
		{
		$this->load->model($property_name);
		return $this->{$property_name};
		}
		else
		return get_instance()->$property_name;   
		}*/
}