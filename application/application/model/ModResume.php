<?php

class ModResume
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    } 
	
	
	/**
     * Add candidates to database 
     * @param array $post Artist [ Array of all element ]
	 * @return int  $return [ Last insert ID ] 
    */
    public function addCandidates($post)
    {   
		$returnMessageArray = array();
			 
			try {
			 
			$this->db->beginTransaction();
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  
			$sql = "INSERT INTO candidates 
			(last_name,first_name,middle_name,address,city,state,zip,phone_home,phone_work,mobile,email,date_of_birth,gender,source,source_name,if_selected_when_join,can_relocate,current_pay,date_created,date_modified,best_fit,intersting_about_you) 
			VALUES 
			(:last_name, :first_name, :middle_name , :address, :city, :state, :zip  , :phone_home, :phone_work,  :mobile, :email , :date_of_birth , :gender, :source , :source_name ,  :if_selected_when_join , :can_relocate, :current_pay,  :date_created, :date_modified, :best_fit, :intersting_about_you)";
			
			$query = $this->db->prepare($sql);
			$parameters = array(
							':last_name' => $post['last_name'],
							':first_name' => $post['first_name'],
							':middle_name' => $post['middle_name'],	
							':address' => $post['address'],
							':city' => $post['city'],
							':state' => $post['state'],
							':zip' => $post['zip'],	
							':phone_home' => $post['phone_home'],
							':phone_work' => $post['phone_work'],							
							':mobile' => $post['mobile'], 
							':email' => $post['email'],  						 
							':date_of_birth' => (!empty($post['date_of_birth'])) ? date("Y-m-d",strtotime($post['date_of_birth'])) : NULL,	
							':gender' => $post['gender'],
							':source' => $post['source'],	
							':source_name' => (!empty($post['source_name'])) ? $post['source_name'] : NULL,	
							':if_selected_when_join' => (!empty($post['if_selected_when_join'])) ? date("Y-m-d",strtotime($post['if_selected_when_join'])) : NULL,	
							':can_relocate' => (isset($post['can_relocate']) && !empty($post['can_relocate'])) ? $post['can_relocate'] : NULL,				
							':current_pay' => (!empty($post['current_pay'])) ? $post['current_pay'] : NULL,
							':date_created' => CURRENT_DATE,
							':date_modified' => CURRENT_DATE,
							':best_fit' => (!empty($post['best_fit'])) ? $post['best_fit'] : NULL,
							':intersting_about_you' => (!empty($post['intersting_about_you'])) ? $post['intersting_about_you'] : NULL
						);
			$query->execute($parameters); 
			$lastInsertedId = $this->db->lastInsertId('candidate_id');
			
			
			
			// Enter data in Candidates Languages			
			 for($i=1;$i<=3;$i++){				
				if(isset($post['languages_'.$i]) && !empty($post['languages_'.$i])){
					
					$l_name 	=  $post['languages_'.$i];
					$l_speak 	=  isset($post['speak_'.$i]) ? $post['speak_'.$i] : NULL;
					$l_read 	=  isset($post['read_'.$i])  ? $post['read_'.$i] : NULL ;
					$l_write 	=  isset($post['write_'.$i]) ? $post['write_'.$i] : NULL ;
					
					$sql_lng = "INSERT INTO candidates_languages 
					(candidate_id,name,l_speak,l_read,l_write) 
					VALUES 
					(:candidate_id, :name , :l_speak, :l_read, :l_write)";
					
					$query_lng = $this->db->prepare($sql_lng);
					
					$parameters_lng = array(
										':candidate_id' => $lastInsertedId,
										':name' => $l_name,
										':l_speak' => $l_speak,	
										':l_read' => $l_read,
										':l_write' => $l_write
									);
									
					$query_lng->execute($parameters_lng);					
				}
		} 
		
		// Enter data in education table		
			 for($i=0;$i<=2;$i++){				
				if(isset($post['college_name'][$i]) && !empty($post['college_name'][$i])){
					
					$college_name = $post['college_name'][$i];
					$major = isset($post['major'][$i]) ? $post['major'][$i] : NULL;
					$university = isset($post['university'][$i]) ? $post['university'][$i] : '';
					$graduation_year = isset($post['graduation_year'][$i]) ? $post['graduation_year'][$i] : NULL; 
					$durationTo = isset($post['durationTo'][$i]) ? $post['durationTo'][$i] : NULL;
					$percentage = isset($post['percentage'][$i]) ? $post['percentage'][$i] : NULL;
					
					
					$sql_edu = "INSERT INTO candidates_educational 
					(candidate_id,college_name,major,university,graduation_year) 
					VALUES 
					(:candidate_id, :college_name , :major, :university, :graduation_year)";
					
					$query_edu = $this->db->prepare($sql_edu);
					
					$parameters_edu = array(
										':candidate_id' => $lastInsertedId,
										':college_name' => $college_name,
										':major' => $major,	
										':university' => $university,
										':graduation_year' => $graduation_year 
									);
									
					$query_edu->execute($parameters_edu);
					
					
				}
			} 

		//Enter data in candidates_extracurricular_activity table
			  for($i=0;$i<=2;$i++){				
				if(isset($post['extracurricular_activity'][$i]) && !empty($post['extracurricular_activity'][$i])){
					
					$extracurricular_activity = $post['extracurricular_activity'][$i];
					$activity_type = isset($post['type'][$i]) ? $post['type'][$i] : NULL;
					$position_hold = isset($post['position_hold'][$i]) ? $post['position_hold'][$i] : '';
					$awards = isset($post['awards'][$i]) ? $post['awards'][$i] : NULL;  
					
					
					$sql_edu = "INSERT INTO candidates_extracurricular_activity 
					(candidate_id,extracurricular_activity,activity_type,position_hold,awards) 
					VALUES 
					(:candidate_id, :extracurricular_activity , :activity_type, :position_hold, :awards)";
					
					$query_edu = $this->db->prepare($sql_edu);
					
					$parameters_edu = array(
										':candidate_id' => $lastInsertedId,
										':extracurricular_activity' => $extracurricular_activity,
										':activity_type' => $activity_type,	
										':position_hold' => $position_hold,
										':awards' => $awards 
										
									);
									
					$query_edu->execute($parameters_edu);
					
					
				}
			}  
		
		  //Enter data in candidates_previous_employment table
			  for($i=0;$i<=2;$i++){				
					if(isset($post['organization'][$i]) && !empty($post['organization'][$i])){
						
						$organization = $post['organization'][$i];
						$designation = isset($post['designation'][$i]) ? $post['designation'][$i] : NULL; 
						$pre_emp_from = isset($post['jobFrom'][$i]) ? $post['jobFrom'][$i] : NULL;  
						$pre_emp_to = isset($post['jobTo'][$i]) ? $post['jobTo'][$i] : NULL;
						$reason_for_leaving = isset($post['leaving'][$i]) ? $post['leaving'][$i] : NULL;
						
					 
						$sql_pre_emp = "INSERT INTO candidates_previous_employment 
						(candidate_id,organization,designation,pre_emp_from,pre_emp_to,reason_for_leaving) 
						VALUES 
						(:candidate_id, :organization , :designation, :pre_emp_from, :pre_emp_to , :reason_for_leaving)";
						
						$query_pre_emp = $this->db->prepare($sql_pre_emp);
						
						$parameters_pre_emp = array(
											':candidate_id' => $lastInsertedId,
											':organization' => $organization,
											':designation' => $designation,											 
											':pre_emp_from' => $pre_emp_from,
											':pre_emp_to' => $pre_emp_to,
											':reason_for_leaving' => $reason_for_leaving
										);
										
						$query_pre_emp->execute($parameters_pre_emp);  
					}
				} 

			//Enter data in candidates_refer table
			  for($i=0;$i<=1;$i++){				
				if(isset($post['ref_name'][$i]) && !empty($post['ref_name'][$i])){
					
					$ref_name = $post['ref_name'][$i];
					$ref_designation = isset($post['ref_designation'][$i]) ? $post['ref_designation'][$i] : NULL;
					$ref_email = isset($post['ref_email'][$i]) ? $post['ref_email'][$i] : '';
					$ref_phone = isset($post['ref_phone'][$i]) ? $post['ref_phone'][$i] : NULL; 
					
				 
					$sql_pre_emp = "INSERT INTO candidates_refer 
					(candidate_id,ref_name,ref_designation,ref_email,ref_phone) 
					VALUES 
					(:candidate_id, :ref_name , :ref_designation, :ref_email , :ref_phone)";
					
					$query_pre_emp = $this->db->prepare($sql_pre_emp);
					
					$parameters_pre_emp = array(
										':candidate_id' => $lastInsertedId,
										':ref_name' => $ref_name,
										':ref_designation' => $ref_designation,	
										':ref_email' => $ref_email,
										':ref_phone' => $ref_phone
									);
									
					$query_pre_emp->execute($parameters_pre_emp);  
				}
			}  

			// Start document upload and add data in document table					
			 $filePath = "document/";
			if(!empty($_FILES['documentFile']['name'])){				
				for($f=0;$f<sizeof($_FILES['documentFile']['name']);$f++){ 
					if(isset($_FILES['documentFile']['name'][$f]) && !empty($_FILES['documentFile']['name'][$f])){
						
						$fileName = preg_replace("/[^a-zA-Z0-9.]/", "",$_FILES['documentFile']['name'][$f]);
						$fileName = time()."_".rand(0,999999)."_".$fileName; 
						move_uploaded_file($_FILES['documentFile']['tmp_name'][$f],$filePath.$fileName);
												 
						$documentTitle 		=  isset($post['documenTitle'][$f]) ? $post['documenTitle'][$f] : NULL;
						$documentFileName 	=  isset($fileName)  ? $fileName : NULL ;
						 
						$sql_doc = "INSERT INTO candidates_document 
						(candidate_id,title,document) 
						VALUES 
						(:candidate_id, :title , :document)";
						
						$query_doc = $this->db->prepare($sql_doc);
						
						$parameters_doc = array(
											':candidate_id' => $lastInsertedId,
											':title' => $documentTitle,
											':document' => $documentFileName 
										);
										
						$query_doc->execute($parameters_doc);
					}  
				}
			} 
			// End document upload and add data in document table

			
			$this->db->commit();
			$returnMessageArray = array('status'=>"true","lastInsertedId"=>$lastInsertedId,"message"=>"done");
		}
		catch(PDOException $e){			
				$this->db->rollback();  					 
				$returnMessageArray = array('status'=>"false","lastInsertedId"=>0,"message"=>$e->getMessage());
		}  
		  
		return json_encode($returnMessageArray);
		
    } 
	
	
	/**
     * Add candidates to database 
     * @param array $post Artist [ Array of all element ]
	 * @return int  $return [ Last insert ID ] 
    */
    public function editCandidates($post)
    {   
		$returnMessageArray = array(); 
		try {
			 
			
			$this->db->beginTransaction();
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  
			/*  Delete candidates_educational data */
			$sqlCE = "DELETE FROM candidates_educational WHERE candidate_id = :candidate_id";
			$queryCE = $this->db->prepare($sqlCE);
			$delete_parametersCE = array(':candidate_id' =>(int)$post['candidate_id']);
			$queryCE->execute($delete_parametersCE);
			
			/*  Delete candidates_extracurricular_activity data */
			$sqlCEA = "DELETE FROM candidates_extracurricular_activity WHERE candidate_id = :candidate_id";
			$queryCEA = $this->db->prepare($sqlCEA);
			$delete_parametersCEA = array(':candidate_id' =>(int)$post['candidate_id']);
			$queryCEA->execute($delete_parametersCEA);
			
			
			/*  Delete candidates_languages data */
			$sqlCL = "DELETE FROM candidates_languages WHERE candidate_id = :candidate_id";
			$queryCL = $this->db->prepare($sqlCL);
			$delete_parametersCL = array(':candidate_id' =>(int)$post['candidate_id']);
			$queryCL->execute($delete_parametersCL);
			
			
			/*  Delete candidates_previous_employment data */
			$sqlCPE = "DELETE FROM candidates_previous_employment WHERE candidate_id = :candidate_id";
			$queryCPE = $this->db->prepare($sqlCPE);
			$delete_parametersCPE = array(':candidate_id' =>(int)$post['candidate_id']);
			$queryCPE->execute($delete_parametersCPE);
			
			/*  Delete candidates_refer data */
			$sqlCR = "DELETE FROM candidates_refer WHERE candidate_id = :candidate_id";
			$queryCR = $this->db->prepare($sqlCR);
			$delete_parametersCR = array(':candidate_id' =>(int)$post['candidate_id']);
			$queryCR->execute($delete_parametersCR);
			
			
			
			
			$sql = "UPDATE candidates SET
			last_name = :last_name,first_name = :first_name,middle_name = :middle_name,
			address = :address,city = :city,state = :state,zip = :zip,phone_home = :phone_home,
			phone_work = :phone_work,mobile = :mobile,email = :email,
			date_of_birth = :date_of_birth,
			gender = :gender,source = :source,
			source_name = :source_name,
			if_selected_when_join = :if_selected_when_join,
			can_relocate = :can_relocate,
			current_pay = :current_pay,
			date_modified = :date_modified,
			best_fit = :best_fit,
			intersting_about_you = :intersting_about_you
			WHERE candidate_id = :candidate_id";
			
			$query = $this->db->prepare($sql);
			$parameters = array(
							':last_name' => $post['last_name'],
							':first_name' => $post['first_name'],
							':middle_name' => $post['middle_name'],	
							':address' => $post['address'],
							':city' => $post['city'],
							':state' => $post['state'],
							':zip' => $post['zip'],	
							':phone_home' => $post['phone_home'],
							':phone_work' => $post['phone_work'],							
							':mobile' => $post['mobile'], 
							':email' => $post['email'],					 
							':date_of_birth' => (!empty($post['date_of_birth'])) ? date("Y-m-d",strtotime($post['date_of_birth'])) : NULL,	
							':gender' => $post['gender'],
							':source' => $post['source'],	
							':source_name' => (!empty($post['source_name'])) ? $post['source_name'] : NULL,							
							':if_selected_when_join' => (!empty($post['if_selected_when_join'])) ? date("Y-m-d",strtotime($post['if_selected_when_join'])) : NULL,	
							':can_relocate' => (isset($post['can_relocate']))? $post['can_relocate'] :  NULL,
							':current_pay' => (!empty($post['current_pay'])) ? $post['current_pay'] : NULL,
							':date_modified' => CURRENT_DATE,
							':best_fit' => (!empty($post['best_fit'])) ? $post['best_fit'] : NULL,	
							':intersting_about_you' => (!empty($post['intersting_about_you'])) ? $post['intersting_about_you'] : NULL,	
							':candidate_id' =>(int)$post['candidate_id']
						);
						
			$query->execute($parameters);
			$lastInsertedId = (int)$post['candidate_id'];
			
			// Enter data in Candidates Languages			
			 for($i=1;$i<=3;$i++){				
				if(isset($post['languages_'.$i]) && !empty($post['languages_'.$i])){
					
					$l_name 	=  $post['languages_'.$i];
					$l_speak 	=  isset($post['speak_'.$i]) ? $post['speak_'.$i] : NULL;
					$l_read 	=  isset($post['read_'.$i])  ? $post['read_'.$i] : NULL ;
					$l_write 	=  isset($post['write_'.$i]) ? $post['write_'.$i] : NULL ;
					
					$sql_lng = "INSERT INTO candidates_languages 
					(candidate_id,name,l_speak,l_read,l_write) 
					VALUES 
					(:candidate_id, :name , :l_speak, :l_read, :l_write)";
					
					$query_lng = $this->db->prepare($sql_lng);
					
					$parameters_lng = array(
										':candidate_id' => $lastInsertedId,
										':name' => $l_name,
										':l_speak' => $l_speak,	
										':l_read' => $l_read,
										':l_write' => $l_write
									);
									
					$query_lng->execute($parameters_lng);					
				}
		} 
		
		// Enter data in education table		
			 for($i=0;$i<=2;$i++){				
				if(isset($post['college_name'][$i]) && !empty($post['college_name'][$i])){
					
					$college_name = $post['college_name'][$i];
					$major = isset($post['major'][$i]) ? $post['major'][$i] : NULL;
					$university = isset($post['university'][$i]) ? $post['university'][$i] : '';
					$graduation_year = isset($post['graduation_year'][$i]) ? $post['graduation_year'][$i] : NULL; 
					$durationTo = isset($post['durationTo'][$i]) ? $post['durationTo'][$i] : NULL;
					$percentage = isset($post['percentage'][$i]) ? $post['percentage'][$i] : NULL;
					
					
					$sql_edu = "INSERT INTO candidates_educational 
					(candidate_id,college_name,major,university,graduation_year) 
					VALUES 
					(:candidate_id, :college_name , :major, :university, :graduation_year)";
					
					$query_edu = $this->db->prepare($sql_edu);
					
					$parameters_edu = array(
										':candidate_id' => $lastInsertedId,
										':college_name' => $college_name,
										':major' => $major,	
										':university' => $university,
										':graduation_year' => $graduation_year 
									);
									
					$query_edu->execute($parameters_edu);
					
					
				}
			} 

		//Enter data in candidates_extracurricular_activity table
			  for($i=0;$i<=2;$i++){				
				if(isset($post['extracurricular_activity'][$i]) && !empty($post['extracurricular_activity'][$i])){
					
					$extracurricular_activity = $post['extracurricular_activity'][$i];
					$activity_type = isset($post['type'][$i]) ? $post['type'][$i] : NULL;
					$position_hold = isset($post['position_hold'][$i]) ? $post['position_hold'][$i] : '';
					$awards = isset($post['awards'][$i]) ? $post['awards'][$i] : NULL;  
					
					
					$sql_edu = "INSERT INTO candidates_extracurricular_activity 
					(candidate_id,extracurricular_activity,activity_type,position_hold,awards) 
					VALUES 
					(:candidate_id, :extracurricular_activity , :activity_type, :position_hold, :awards)";
					
					$query_edu = $this->db->prepare($sql_edu);
					
					$parameters_edu = array(
										':candidate_id' => $lastInsertedId,
										':extracurricular_activity' => $extracurricular_activity,
										':activity_type' => $activity_type,	
										':position_hold' => $position_hold,
										':awards' => $awards 
										
									);
									
					$query_edu->execute($parameters_edu);
					
					
				}
			}  
		
		  //Enter data in candidates_previous_employment table
			  for($i=0;$i<=2;$i++){				
					if(isset($post['organization'][$i]) && !empty($post['organization'][$i])){
						
						$organization = $post['organization'][$i];
						$designation = isset($post['designation'][$i]) ? $post['designation'][$i] : NULL; 
						$pre_emp_from = isset($post['jobFrom'][$i]) ? $post['jobFrom'][$i] : NULL;  
						$pre_emp_to = isset($post['jobTo'][$i]) ? $post['jobTo'][$i] : NULL;
						$reason_for_leaving = isset($post['leaving'][$i]) ? $post['leaving'][$i] : NULL;
						
					 
						$sql_pre_emp = "INSERT INTO candidates_previous_employment 
						(candidate_id,organization,designation,pre_emp_from,pre_emp_to,reason_for_leaving) 
						VALUES 
						(:candidate_id, :organization , :designation, :pre_emp_from, :pre_emp_to , :reason_for_leaving)";
						
						$query_pre_emp = $this->db->prepare($sql_pre_emp);
						
						$parameters_pre_emp = array(
											':candidate_id' => $lastInsertedId,
											':organization' => $organization,
											':designation' => $designation,											 
											':pre_emp_from' => $pre_emp_from,
											':pre_emp_to' => $pre_emp_to,
											':reason_for_leaving' => $reason_for_leaving
										);
										
						$query_pre_emp->execute($parameters_pre_emp);  
					}
				} 

			//Enter data in candidates_refer table
			  for($i=0;$i<=1;$i++){				
				if(isset($post['ref_name'][$i]) && !empty($post['ref_name'][$i])){
					
					$ref_name = $post['ref_name'][$i];
					$ref_designation = isset($post['ref_designation'][$i]) ? $post['ref_designation'][$i] : NULL;
					$ref_email = isset($post['ref_email'][$i]) ? $post['ref_email'][$i] : '';
					$ref_phone = isset($post['ref_phone'][$i]) ? $post['ref_phone'][$i] : NULL; 
					
				 
					$sql_pre_emp = "INSERT INTO candidates_refer 
					(candidate_id,ref_name,ref_designation,ref_email,ref_phone) 
					VALUES 
					(:candidate_id, :ref_name , :ref_designation, :ref_email , :ref_phone)";
					
					$query_pre_emp = $this->db->prepare($sql_pre_emp);
					
					$parameters_pre_emp = array(
										':candidate_id' => $lastInsertedId,
										':ref_name' => $ref_name,
										':ref_designation' => $ref_designation,	
										':ref_email' => $ref_email,
										':ref_phone' => $ref_phone
									);
									
					$query_pre_emp->execute($parameters_pre_emp);  
				}
			}  

			// Start document upload and add data in document table					
			 $filePath = "document/";
			if(!empty($_FILES['documentFile']['name'])){				
				for($f=0;$f<sizeof($_FILES['documentFile']['name']);$f++){ 
					if(isset($_FILES['documentFile']['name'][$f]) && !empty($_FILES['documentFile']['name'][$f])){
						
						$fileName = preg_replace("/[^a-zA-Z0-9.]/", "",$_FILES['documentFile']['name'][$f]);
						$fileName = time()."_".rand(0,999999)."_".$fileName; 
						move_uploaded_file($_FILES['documentFile']['tmp_name'][$f],$filePath.$fileName);
												 
						$documentTitle 		=  isset($post['documenTitle'][$f]) ? $post['documenTitle'][$f] : NULL;
						$documentFileName 	=  isset($fileName)  ? $fileName : NULL ;
						 
						$sql_doc = "INSERT INTO candidates_document 
						(candidate_id,title,document) 
						VALUES 
						(:candidate_id, :title , :document)";
						
						$query_doc = $this->db->prepare($sql_doc);
						
						$parameters_doc = array(
											':candidate_id' => $lastInsertedId,
											':title' => $documentTitle,
											':document' => $documentFileName 
										);
										
						$query_doc->execute($parameters_doc);
					}  
				}
			} 
			
			 		
			$this->db->commit();
			$returnMessageArray = array('status'=>"true","lastInsertedId"=>$lastInsertedId,"message"=>"done");
		}
		catch(PDOException $e){			
				$this->db->rollback();
				$returnMessageArray = array('status'=>"false","lastInsertedId"=>0,"message"=>$e->getMessage());
		} 
		 
		return json_encode($returnMessageArray);
		
    } 
	
	/**
     * Get all songs from database
     */
    public function getAllCandidates()
    {
		try {
			$sql = "SELECT candidate_id, CONCAT(`last_name`,' ',`first_name`,' ',`middle_name`) as name , city , state , mobile , email FROM candidates ORDER BY candidate_id DESC";
			$query = $this->db->prepare($sql);
			$query->execute(); 
			return $query->fetchAll();
		}
		catch(PDOException $e){ 
			return 0;
		} 
    }
	
	 /**
     * Check value in database
     * @param1 Table name
	 * @param2 Table Column name
	 * @param3 Check value
	 * @param4 PK Column Name
	 * @param5 PK Column Value
	 * @return int  return number of value exist n database.
     */
	public function checkValueExist($tableName,$columnName,$value,$pkColumn,$pkColumnValue){		
		try 
		{
			
			$sql = "SELECT count($columnName) as totalCount	 FROM $tableName WHERE $columnName = :value && $pkColumn != :pkColumnValue";
			$query = $this->db->prepare($sql);
			$parameters = array(':value' => $value , ':pkColumnValue' => $pkColumnValue ); 
			$query->execute($parameters);
			return $query->fetch()->totalCount;
			
		} catch(PDOException $e) { 
			return 0;
		}
		 
	}
	
	/**
     * Get a candidates from database
     */
    public function getCandidate($candidate_id)
    {
		try 
		{
			
			$sql = "SELECT * FROM candidates WHERE candidate_id = :candidate_id LIMIT 1";
			$query = $this->db->prepare($sql);
			$parameters = array(':candidate_id' => $candidate_id); 
			$query->execute($parameters); 
			return $query->fetch();
			
		} catch(PDOException $e) { 
			return 0;
		}
    }
	
	/**
     * Get a candidates_languages from database
     */
    public function getCandidateLanguages($candidate_id)
    {
        $sql = "SELECT * FROM candidates_languages WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Get a candidates_educational from database
     */
    public function getCandidateEducational($candidate_id)
    {
        $sql = "SELECT * FROM candidates_educational WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Get a candidates_extracurricular_activity from database
     */
    public function getCandidateExtracurricularActivity($candidate_id)
    {
        $sql = "SELECT * FROM candidates_extracurricular_activity WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Get a candidates_previous_employment from database
     */
    public function getCandidatePreviousEmployment($candidate_id)
    {
        $sql = "SELECT * FROM candidates_previous_employment WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Get a candidates_refer from database
     */
    public function getCandidateRefer($candidate_id)
    {
        $sql = "SELECT * FROM candidates_refer WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Get a candidates_document from database
     */
    public function getCandidateDocument($candidate_id)
    {
        $sql = "SELECT * FROM candidates_document WHERE candidate_id = :candidate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':candidate_id' => $candidate_id); 
        $query->execute($parameters); 
        return $query->fetchAll();
    }
	
	/**
     * Delete Document.
     */
	public function deleteDocument($documentId){
		
		$sqlCD = "DELETE FROM candidates_document WHERE candidates_document_id = :candidates_document_id";
		$queryCD = $this->db->prepare($sqlCD);
		$delete_parametersCD = array(':candidates_document_id' =>(int)$documentId);
		$queryCD->execute($delete_parametersCD);
	}
	
}
