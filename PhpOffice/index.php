<?php
    require_once 'vendor/autoload.php';


    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('temple.docx');

    $templateProcessor->setValues(
        [
            'nomorsurat' => 'HO DUY KHANG',
        ]
        );
        $pathToSave = 'result_surat.docx';
        $templateProcessor->saveAs($pathToSave);
?>