<?php 
$config=['signup_rules'=>[
	  						[
	  							'field' => 'first_name',
								'label' => 'First Name',
								'rules' => 'required|alpha_numeric_spaces|trim'
	  						],
	  						[
	  							'field' => 'last_name',
								'label' => 'Last Name',
								'rules' => 'required|alpha_numeric_spaces|trim'
	  						],
	  						[
	  							'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|trim|valid_email|is_unique[users.email]'
	  						],
	  						[
	  							'field' => 'password',
								'label' => 'Password',
								'rules' => 'required|trim|min_length[6]|max_length[15]|matches[confirmpassword]'
	  						],
	  						[
		  							'field' => 'confirmpassword',
									'label' => 'Confirm Password',
									'rules' => 'required|trim'
		  					],
		  					[
	  							'field' => 'aadhar_no',
								'label' => 'Aadhar Number',
								'rules' => 'required|alpha_numeric_spaces|trim|is_unique[users.aadhar_no]'
	  						]
	  					],
	    'admin_signup_rules'=>
	  					[
	  						[
	  							'field' => 'hotel_name',
								'label' => 'Hotel Name',
								'rules' => 'required|alpha_numeric_spaces|trim'
	  						],
	  						[
	  							'field' => 'location',
								'label' => 'Location',
								'rules' => 'required|alpha_numeric_spaces|trim'
	  						],
	  						[
	  							'field' => 'description',
								'label' => 'Hotel Description',
								'rules' => 'alpha_numeric_spaces|trim'
	  						],
	  					],
	    'login_rules'=>
						[
							[
	  							'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_email'
	  						],
	  						[
	  							'field' => 'password',
								'label' => 'Password',
								'rules' => 'required'
	  						]
						]
		];



 ?>