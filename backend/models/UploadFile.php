<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 20],
        ];
    }

    public function upload($path)
    {
        if ($this->validate()) {
            
			if(is_dir( $path ) == '' ) mkdir( $path );
			
			/*echo $path;
			echo  (int)is_dir($path);
			exit;*/
			
			foreach ($this->imageFiles as $file) {

                

                $file->saveAs($path . '/' . $file->baseName . '.' . $file->extension);

            }
            return true;
        } else {
            return false;
        }
    }
}