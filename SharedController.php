<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * hasil_nilai_option_list Model Action
     * @return array
     */
	function hasil_nilai_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT keterangan AS value , keterangan AS label FROM menu ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_hasil Model Action
     * @return Value
     */
	function getcount_hasil(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM hasil";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_tabelhasil Model Action
	* @return array
	*/
	function barchart_tabelhasil(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  p.nama, p.nilai, p.rangking FROM penilaian AS p";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'nilai');
		$dataset_labels =  array_column($dataset1, 'nama');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
