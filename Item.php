<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("student", ['STDID' => $id])->row_array();
        }else{
            $data = $this->db->get("student")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
       
        $this->response($input,REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put()
    {
       // $input = $this->put();
      //$this->db->update('items', $input, array('id'=>$id));
      //$this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
      $this->load->helper("security");
      $stream = $this->security->xss_clean( $this->input->raw_input_stream );
      $new_account = json_decode(trim($stream), true);
      $this->response($new_account, REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}