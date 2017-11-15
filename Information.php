<?php

	class Information
		{
			private $_destination;
			private $_nbre_place;
			private $_assurance;
			private $_list_info_perso;
			private $_iteration;
			
			public function __construct()
			{
				$this->_destination = "";
				$this->_nbre_place = 0;
				$this->_assurance = "";
				$this->_list_info_perso = [];
				$this->_iteration = 1;				
			}
			
			public function set_destination($destination)
			{
				$this->_destination = $destination;
			}
		
			public function set_nbre_place($nbre_place)
			{
				$this->_nbre_place = $nbre_place;
			}
		
			public function set_assurance($assurance)
			{
				$this->_assurance = $assurance;
			}
		
			public function set_info_perso($list)
			{
				$this->_list_info_perso[] = $list;
			}
					
			public function up_iteration()
			{
				$this->_iteration += 1;
			}
			
			public function down_iteration()
			{
				$this->_iteration -= 1;
			}
		
			public function get_destination()
			{
				return $this->_destination;
			}
		
			public function get_nbre_place()
			{
				return $this->_nbre_place;
			}
		
			public function get_assurance()
			{
				return $this->_assurance;
			}
		
			public function get_info_perso()
			{
				return $this->_list_info_perso;
			}
		
			public function get_ages($client)
			{
				return $this->_ages[$client];
			}
			
			public function get_iteration()
			{
				return $this->_iteration;
			}
	}
?>