<?php
require_once 'vendor/autoload.php';

// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $companyName = $_POST['company-name'];
    $taxCode = $_POST['company-taxcode'];
    $companyAddress = $_POST['company-address'];
    $email = $_POST['company-email'];
    $representative = $_POST['company-director'];
    $position = $_POST['company-position'];
    $idCard = $_POST['id-card'];

    // Đường dẫn đến tệp mẫu Word của bạn
    $templateFilePath = '/Applications/XAMPP/xamppfiles/htdocs/PhpOffice/hiloca.docx';

    // Sử dụng đường dẫn tệp để tạo văn bản
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templateFilePath);

    // Đặt các giá trị vào mẫu
    $templateProcessor->setValues([
        'ten' => $companyName,
        'masothue' => $taxCode,
        'diachi' => $companyAddress,
        'email' => $email,
        'nguoidaidienphapluat' => $representative,
        'chucvu' => $position,
        'CCCD' => $idCard
    ]);

    // Lưu tài liệu
    $pathToSave = 'result_surat.docx';
    $templateProcessor->saveAs($pathToSave);

    // Tuỳ chọn: bạn có thể gửi phản hồi trở lại cho máy khách
    echo json_encode(['success' => true, 'message' => 'Tài liệu được tạo thành công']);
    exit;
}
?>
