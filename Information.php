<?php

	class Information
		{
			private $_destination;
			private $_nbre_place;
			private $_assurance;
			private $_list_info_perso;
			private $_iteration;
			private $_montant;
			private $_modify;
			private $_ID;
			private $_ID_vol;

			
			public function __construct()
			{
				$this->_destination = "";
				$this->_nbre_place = 0;
				$this->_assurance = "";
				$this->_iteration = 1;
				$this->_montant = 0;
				$this->_modify = "no";
				$this->_ID = 0;
				$this->_ID_vol = 0;
			}
			
			/*Setter : Allows to modify values of the object*/

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
		
			public function set_info_perso($list,$iteration)
			{
				$this->_list_info_perso[$iteration] = $list;
			}
			
			public function set_montant($montant)
			{
				$this->_montant = $montant;
			}
			
			public function set_modify()
			{
				$this->_modify = "yes";
			}

			public function set_ID($id)
			{
				$this->_ID = $id;
			}

			public function set_ID_vol($id_vol)
			{
				$this->_ID_vol = $id_vol;
			}
					
			public function up_iteration()
			{
				$this->_iteration += 1;
			}
			
			public function reset_iteration()
			{
				$this->_iteration = 1;
			}
			
			/*Getter : Allows to get values of the object*/

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
			
			public function get_iteration()
			{
				return $this->_iteration;
			}
			
			public function get_modify()
			{
				return $this->_modify;
			}

			public function get_ID()
			{
				return $this->_ID;
			}

			public function get_ID_vol()
			{
				return $this->_ID_vol;
			}
			
			public function get_montant()
			{
				$this->_montant = 0;
				foreach ($this->_list_info_perso as $info)
				{
					if ($info[2] <= 12)
					{
						$this->_montant += 10;
					}
					else
					{
						$this->_montant += 15;
					}
				}

				if ($this->_assurance == "OUI")
				{
					$this->_montant += 20;
				}
				return $this->_montant;
			}

			public function is_major()
			{
				foreach ($this->_list_info_perso as $info)
				{
					if ($info[2] >= 18)
					{
						return "yes";
					}
				}
				return "no";
			}
	}
?>