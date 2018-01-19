<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    protected function main() {
		log_message('error', 'API ACCESS : '.$this->input->server('REQUEST_METHOD').' '.$_SERVER['REQUEST_URI']);
		log_message('error', 'REQUEST : '.json_encode($_POST));
		log_message('error', 'FILES : '.json_encode($_FILES));
		 
        $out = new StdClass();
        $out->is_error = false;
        $out->status_code = 200;
		
		$auth = $this->db->where('api_session_id', get('session_key'))->get('api_session')->row();
		
        if (!(isset($this->is_public_service) && $this->is_public_service) && !$auth) {
            $out->is_error = true;
            $out->status_code = 101;
            $out->status_msg = 'Authentication Failed';
        } else {
            try {
				$request_method = $this->input->server('REQUEST_METHOD');
				
				if(method_exists($this, 'process_'.strtolower($request_method))){				
					switch ($request_method) {
						case 'GET':
							$out->payload = $this->process_get($auth);
							break;
						case 'POST':
							$out->payload = $this->process_post($auth);
							break;
						case 'UPDATE':
						case 'PUT':
							$out->payload = $this->process_update($auth);
							break;
						case 'DELETE':
							$out->payload = $this->process_delete($auth);
							break;
						default:
							$out->is_error = true;
							$out->status_code = 201;
							$out->status_msg = 'Invalid Method';
					}
				}else{
					$out->is_error = true;
					$out->status_code = 202;
					$out->status_msg = 'Method not available for this class';
				}
            } catch (Exception $e) {
                $out->is_error = true;
                $out->status_code = $e->getCode();
                $out->status_msg = $e->getMessage();
            }
        }
		
        echo $this->prettyPrint(json_encode($out));
		
		log_message('error', 'RESPONSE : '.substr($this->prettyPrint(json_encode($out)), 0, 512));
    }
	
	protected function process_search_request($allowed_fields){
		$search = array();
		$search_identifier_len = strlen(API_GET_SEARCH_IDENTIFIER);
		
		foreach($_GET as $key => $val){
			if(strlen($key) > $search_identifier_len && substr($key, 0, $search_identifier_len) == API_GET_SEARCH_IDENTIFIER){
				$field = substr($key, $search_identifier_len);
				if(in_array($field, $allowed_fields)){
					$search[$field] = $val;
				}
			}
		}
		
		return $search;
	}
	
	private function prettyPrint( $json )
	{
		$result = '';
		$level = 0;
		$in_quotes = false;
		$in_escape = false;
		$ends_line_level = NULL;
		$json_length = strlen( $json );
	
		for( $i = 0; $i < $json_length; $i++ ) {
			$char = $json[$i];
			$new_line_level = NULL;
			$post = "";
			if( $ends_line_level !== NULL ) {
				$new_line_level = $ends_line_level;
				$ends_line_level = NULL;
			}
			if ( $in_escape ) {
				$in_escape = false;
			} else if( $char === '"' ) {
				$in_quotes = !$in_quotes;
			} else if( ! $in_quotes ) {
				switch( $char ) {
					case '}': case ']':
						$level--;
						$ends_line_level = NULL;
						$new_line_level = $level;
						break;
	
					case '{': case '[':
						$level++;
					case ',':
						$ends_line_level = $level;
						break;
	
					case ':':
						$post = " ";
						break;
	
					case " ": case "\t": case "\n": case "\r":
						$char = "";
						$ends_line_level = $new_line_level;
						$new_line_level = NULL;
						break;
				}
			} else if ( $char === '\\' ) {
				$in_escape = true;
			}
			if( $new_line_level !== NULL ) {
				$result .= "\n".str_repeat( "\t", $new_line_level );
			}
			$result .= $char.$post;
		}
	
		return $result;
	}
}

?>
