<?php

/**
 * Class Home
 *
 */
class Resume extends Controller
{  
    /**
     * PAGE: index
     * Index method is use for view list of candidate with paging and search.
     */
    public function index()
    {
		$candidates = $this->ModResume->getAllCandidates();
        
		// load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/resume/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Method: add Candidates
     * View candidate add form
     */
    public function add()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/resume/add.php';
        require APP . 'view/_templates/footer.php';
    }
	
	 /**
     * Method: Save Data
     * AjaxSave method is use for save data using ajax call.
     */
    public function ajaxSave()
    {
		
	  if ($_SERVER['REQUEST_METHOD'] === 'POST') {		
	  
			if(isset($_POST['candidate_id']) && !empty($_POST['candidate_id']) && $_POST['candidate_id'] > 0)
				$statusArray = $this->ModResume->editCandidates($_POST);			 
			else
				$statusArray = $this->ModResume->addCandidates($_POST);
			 
			 
			 $statusArray = json_decode($statusArray);
			 $statusArray = (array)$statusArray; 
		 
			if($statusArray['lastInsertedId'] > 0)
				$array = array("status"=>"sucess","insetedId"=>$statusArray['lastInsertedId']);
			else
				$array = array("status"=>"error","message"=>$statusArray['message'],"insetedId"=>$statusArray['lastInsertedId']);
			
			echo json_encode($array);
	  }else {
		 $array = array("status"=>"error","message"=>"Please use post method");
		 echo json_encode($array);
	  }		
      
    } 
	
	/**
     * Method: checkValueExist
     * Below function is user for check value exist in table or not
     */
    public function checkValueExist(){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {		
			 $numberOfRow = $this->ModResume->checkValueExist(
													$_POST['tableName'],
													$_POST['columnName'],
													$_POST['value'],
													$_POST['pkColumn'],
													$_POST['pkColumnValue']
												);
			 $array = array("status"=>"sucess","numberOfexist"=>$numberOfRow);
			 echo json_encode($array);
	  }else {
		 $array = array("status"=>"error","message"=>"Please use post method");
		 echo json_encode($array);
	  }		
      
    } 
	
	/**
     * ACTION: edit Candidates
     * Funcation is user for dispaly selected candidate data
     * @param int $candidate_id Id of the to-edit candidate
    */
    public function editCandidate($candidate_id)
    {
        // if we have an id of a candidate that should be edited
        if (isset($candidate_id)) {
            // do getCandidate() in model/ModResume.php
            $candidate = $this->ModResume->getCandidate($candidate_id);
			
			// Get candidate Languages list
			$candidateLanguages = $this->ModResume->getCandidateLanguages($candidate_id); 
			$finalCandidateLanguages = array();
			foreach($candidateLanguages as $CLK=>$CLV){
				$tArray = (array)$CLV;
				$finalCandidateLanguages[] = $tArray; 
			}
			
			// Get candidate educational list
			$candidateEducational= $this->ModResume->getCandidateEducational($candidate_id);			
			$finalCandidateEducational = array();
			foreach($candidateEducational as $CEK=>$CEV){
				$cevArray = (array)$CEV;
				$finalCandidateEducational[] = $cevArray; 
			}
			
			// Get candidate extracurricular activity
			$candidateExtracurricular= $this->ModResume->getCandidateExtracurricularActivity($candidate_id);			
			$finalCandidateExtracurricular = array();
			foreach($candidateExtracurricular as $CK=>$CV){
				$cevArray = (array)$CV;
				$finalCandidateExtracurricular[] = $cevArray; 
			}
			
			// Get candidates_previous_employment
			$candidatePreviousEmployment= $this->ModResume->getCandidatePreviousEmployment($candidate_id);			
			$finalPreviousEmployment = array();
			foreach($candidatePreviousEmployment as $CPEK=>$CPEV){
				$cpeArray = (array)$CPEV;
				$finalPreviousEmployment[] = $cpeArray; 
			}
			
			// Get candidates_refer
			$candidateRefer= $this->ModResume->getCandidateRefer($candidate_id);			
			$finalCandidateRefer = array();
			foreach($candidateRefer as $CRK=>$CRV){
				$crArray = (array)$CRV;
				$finalCandidateRefer[] = $crArray; 
			} 
			
			// Get candidates_document
			$candidateDocument= $this->ModResume->getCandidateDocument($candidate_id);			
			$finalCandidateDocument = array();
			foreach($candidateDocument as $CD=>$CRD){
				$crArray = (array)$CRD;
				$finalCandidateDocument[] = $crArray; 
			} 
			
			 
			
            // load views. within the views we can echo out $candidate easily
            require APP . 'view/_templates/header.php';
			require APP . 'view/resume/edit.php';
			require APP . 'view/_templates/footer.php';
			
        } else {
            // redirect user to candidate index page (as we don't have a candidate_id)
            header('location: ' . URL);
        }
    }
	
	
	 /**
     * Method: Success Page 
     * 
     */
    public function success()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/resume/success.php';
        require APP . 'view/_templates/footer.php';
    }
    
	/*
	 * Delete document	
	*/
	public function ajaxDeleteDocument(){
		if(isset($_POST['documentID']) && !empty($_POST['documentID'])){
			$this->ModResume->deleteDocument($_POST['documentID']);
			$path = ROOT."public/document/".$_POST['documentName'];
			unlink($path);
			$array = array("status"=>"sucess","message"=>"Document deleted successfully");
			echo json_encode($array);
		}else{
			$array = array("status"=>"error","message"=>"Error in delete data");
			echo json_encode($array);
		}
		
	}
	
}
