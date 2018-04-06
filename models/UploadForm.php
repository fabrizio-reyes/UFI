<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, svg'],
        ];
    }
    
    public function upload($folder)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($folder.''.$this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
	


    public function uploadFile($modelFile)
    {
        if ($modelFile->validate()) {
            $modelFile->saveAs('archivos/' . $modelFile->baseName . '.' . $modelFile->extension);
            return true;
        } else {
            return false;
        }
    }
}