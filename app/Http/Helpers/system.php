<?php
function uploadFile($nameFolder, $file){
    $fileName = time().''.$file->getClinetOriginalName();
    return $file->storeAS($nameFolder,$fileName,'public');
}
