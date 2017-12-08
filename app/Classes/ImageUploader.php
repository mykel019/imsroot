<?php namespace App\Classes;

use App\Http\Requests;
use Illuminate\Http\Request;

use Input;
use DB;
use Auth;
use File;
use Image;
use View;
use Session;
use Response;

use Hash;
use Validator;


class ImageUploader {

    public $img_directory;
    public $thumb_directory;
    public $filename;
    public $resize = Array();
    public $allowedExtensions = ['jpg','png'];


    public function upload(){
        // getting all of the post data
        $file = Input::file('file');

        $height = $this->resize[0];
        $width = $this->resize[1];
                
        if(empty($this->filename)){
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
        }else{
            if($this->validateFilename()){
                $this->unlinkImage();
                $filename = $this->filename;
            }else{
                return json_encode(['status'=>false,'error'=>'Invalid File']);
            }
        }
        $upload_success = $file->move($this->img_directory, $filename);

        File::copy($this->img_directory.'/'.$filename, $this->img_directory.'/'.$filename);        
        Image::make($this->img_directory.'/'.$filename)->resize($height, $width, function ($constraint) use($height, $width) {
                                                                                    if($height == null || $width == null){
                                                                                        $constraint->aspectRatio();
                                                                                    }
                                                                                })->save($this->thumb_directory.'/'.$filename);
        if($upload_success){
            return json_encode(['status'=>true,'error'=>'File has been uploaded' ,'photo'=>$filename]);
        }
      
    }

    private function validateFilename(){
        $file = explode('.', $this->filename);
        if( in_array(strtolower($file[1]), $this->allowedExtensions) ){
            return true;
        }
    }

    private function unlinkImage(){
        if(file_exists($this->img_directory.'/'.$this->filename)){
            unlink($this->img_directory.'/'.$this->filename);
        }       
    }

}
