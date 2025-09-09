<?php
// معالجة النموذج
$uploadedFile = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $currency = htmlspecialchars($_POST['currency']);
    $wallet = htmlspecialchars($_POST['wallet']);
    $amount = htmlspecialchars($_POST['amount']);
    $payment = htmlspecialchars($_POST['payment']);
    $extra = htmlspecialchars($_POST['extra'] ?? '');

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    if (isset($_FILES['proof']) && $_FILES['proof']['error'] == 0) {
        $fileName = basename($_FILES['proof']['name']);
        $uploadedFile = $uploadDir . time() . "_" . $fileName;
        move_uploaded_file($_FILES['proof']['tmp_name'], $uploadedFile);
    }

    $to = "youremail@example.com";
    $subject = "طلب تحويل USDT إلى كاش جديد";
    $message = "
الاسم: $name
البريد الإلكتروني: $email
العملة: $currency
عنوان المحفظة: $wallet
المبلغ: $amount
طريقة الاستلام: $payment
ملاحظات إضافية: $extra
ملف الإثبات: $uploadedFile
";
    $headers = "From: noreply@yourdomain.com";
    mail($to, $subject, $message, $headers);

    $success = "✅ تم إرسال طلبك بنجاح، سنتواصل معك قريبًا";
}

// تحديد اللغة والوضع
$dir = 'rtl';
$lang = 'ar';
$theme = 'light-mode';

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $dir = $lang == 'ar' ? 'rtl' : 'ltr';
}

if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];
}

// ترجمات اللغات
$translations = [
    'ar' => [
        'title' => 'تحويل USDT إلى كاش - استلم فلوسك بنفس اللحظة',
        'sidebar_title' => 'Crypto Exchange',
        'home' => 'الرئيسية',
        'wallet' => 'محفظة',
        'sell_currency' => 'بيع عملة',
        'buy_currency' => 'شراء عملة',
        'transfer_currency' => 'تحويل عملة',
        'exchange' => 'تبادل',
        'history' => 'السجل',
        'settings' => 'الإعدادات',
        'dark_mode' => 'الوضع الليلي',
        'language' => 'اللغة',
        'arabic' => 'العربية',
        'english' => 'English',
        'main_title' => 'منصة تحويل USDT إلى كاش',
        'welcome' => 'مرحباً، محمد',
        'usdt_balance' => 'رصيد USDT',
        'kwd_balance' => 'رصيد الدينار',
        'last_exchange' => 'آخر صرف',
        'form_title' => 'نموذج تحويل USDT إلى كاش',
        'success_message' => '✅ تم إرسال طلبك بنجاح، سنتواصل معك قريبًا',
        'full_name' => 'الاسم الكامل',
        'email' => 'البريد الإلكتروني',
        'select_currency' => 'اختر العملة',
        'wallet_address' => 'عنوان المحفظة USDT',
        'amount_required' => 'المبلغ المطلوب (USDT)',
        'payment_method' => 'طريقة الاستلام',
        'cash' => 'كاش',
        'bank_transfer' => 'تحويل بنكي',
        'pickup_location' => 'مكان الاستلام (الكويت):',
        'bank_details' => 'بيانات الحساب البنكي:',
        'upload_proof' => 'رفع إثبات الدفع (اختياري)',
        'submit_request' => 'إرسال الطلب',
        'recent_transactions' => 'آخر المعاملات',
        'date' => 'التاريخ',
        'type' => 'النوع',
        'amount' => 'المبلغ',
        'status' => 'الحالة',
        'sell_usdt' => 'بيع USDT',
        'buy_usdt' => 'شراء USDT',
        'currency_transfer' => 'تحويل عملة',
        'completed' => 'مكتمل',
        'processing' => 'قيد المعالجة',
        'proof_image' => 'صورة الإثبات:',
        'proof_file' => 'ملف الإثبات:',
        'equivalent' => 'يعادل:'
    ],
    'en' => [
        'title' => 'USDT to Cash Conversion - Get Your Money Instantly',
        'sidebar_title' => 'Crypto Exchange',
        'home' => 'Home',
        'wallet' => 'Wallet',
        'sell_currency' => 'Sell Currency',
        'buy_currency' => 'Buy Currency',
        'transfer_currency' => 'Transfer Currency',
        'exchange' => 'Exchange',
        'history' => 'History',
        'settings' => 'Settings',
        'dark_mode' => 'Dark Mode',
        'language' => 'Language',
        'arabic' => 'العربية',
        'english' => 'English',
        'main_title' => 'USDT to Cash Conversion Platform',
        'welcome' => 'Welcome, Muhammad',
        'usdt_balance' => 'USDT Balance',
        'kwd_balance' => 'KWD Balance',
        'last_exchange' => 'Last Exchange',
        'form_title' => 'USDT to Cash Conversion Form',
        'success_message' => '✅ Your request has been sent successfully, we will contact you soon',
        'full_name' => 'Full Name',
        'email' => 'Email',
        'select_currency' => 'Select Currency',
        'wallet_address' => 'USDT Wallet Address',
        'amount_required' => 'Required Amount (USDT)',
        'payment_method' => 'Payment Method',
        'cash' => 'Cash',
        'bank_transfer' => 'Bank Transfer',
        'pickup_location' => 'Pickup Location (Kuwait):',
        'bank_details' => 'Bank Account Details:',
        'upload_proof' => 'Upload Payment Proof (Optional)',
        'submit_request' => 'Submit Request',
        'recent_transactions' => 'Recent Transactions',
        'date' => 'Date',
        'type' => 'Type',
        'amount' => 'Amount',
        'status' => 'Status',
        'sell_usdt' => 'Sell USDT',
        'buy_usdt' => 'Buy USDT',
        'currency_transfer' => 'Currency Transfer',
        'completed' => 'Completed',
        'processing' => 'Processing',
        'proof_image' => 'Proof Image:',
        'proof_file' => 'Proof File:',
        'equivalent' => 'Equivalent:'
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="تحويل USDT إلى كاش في الكويت ودول الخليج بأمان وسرعة. بيع USDT بالدينار الكويتي (KWD) والدولار ($) واليورو (€) والجنيه الإسترليني (£).">
    <meta name="keywords" content="تحويل USDT إلى كاش, بيع USDT, دينار كويتي, KWD, تحويل عملات, الكويت, دول الخليج">
    <meta name="author" content="منصة تحويل USDT">
    <title><?php echo $translations[$lang]['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #64748b;
            --accent-color: #6366f1;
            --success-color: #10b981;
            --dark-bg: #0f172a;
            --dark-secondary: #1e293b;
            --light-bg: #f8fafc;
            --light-secondary: #ffffff;
        }

        body {
            font-family: 'Poppins', 'Noto Sans Arabic', sans-serif;
            transition: all 0.4s ease;
            background: var(--light-bg);
            color: #334155;
        }

        body.light-mode {
            background-color: var(--light-bg);
            color: #1e293b;
        }

        body.dark-mode {
            background-color: var(--dark-bg);
            color: #e2e8f0;
        }

        .dark-mode .sidebar {
            background: var(--dark-secondary);
            border-left: 1px solid #334155;
        }

        .dark-mode .card {
            background: var(--dark-secondary);
            color: #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .dark-mode input,
        .dark-mode select,
        .dark-mode textarea {
            background-color: #1e293b;
            color: #e2e8f0;
            border-color: #475569;
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            top: 0;
            right: 0;
            background: var(--light-secondary);
            box-shadow: 0 0 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow-y: auto;
        }

        .main-content {
            margin-right: 280px;
            padding: 25px;
            transition: margin-right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed+.main-content {
            margin-right: 80px;
        }

        .sidebar.collapsed .sidebar-text {
            display: none;
        }

        /* Adjust sidebar and main content for English (LTR) */
        body[dir="ltr"] .sidebar {
            right: auto;
            left: 0;
            border-left: none;
            border-right: 1px solid #e2e8f0;
        }

        body[dir="ltr"] .main-content {
            margin-right: 0;
            margin-left: 280px;
        }

        body[dir="ltr"] .sidebar.collapsed+.main-content {
            margin-left: 80px;
        }

        body[dir="ltr"] .dark-mode .sidebar {
            border-right: 1px solid #334155;
            border-left: none;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .dark-mode .sidebar-header {
            border-bottom: 1px solid #334155;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-item {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            cursor: pointer;
            margin: 8px 15px;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }

        .sidebar-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--primary-color);
            opacity: 0;
            transition: all 0.3s;
        }

        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
            transform: translateX(5px);
        }

        .sidebar-item:hover:before {
            opacity: 1;
        }

        .dark-mode .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.2);
        }

        .sidebar-icon {
            margin-left: 12px;
            width: 24px;
            text-align: center;
            font-size: 18px;
            color: var(--primary-color);
            transition: all 0.3s;
        }

        .sidebar-item:hover .sidebar-icon {
            color: var(--accent-color);
            transform: scale(1.1);
        }

        .theme-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .theme-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #cbd5e1;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        input:checked+.slider {
            background: var(--primary-color);
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .lang-switch {
            display: flex;
            border-radius: 12px;
            overflow: hidden;
            width: 120px;
            background: #f1f5f9;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .lang-switch {
            background: #1e293b;
        }

        .lang-option {
            padding: 8px 12px;
            cursor: pointer;
            text-align: center;
            flex: 1;
            transition: all 0.3s;
            font-weight: 500;
        }

        .lang-option.active {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .card {
            background: var(--light-secondary);
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .dark-mode .card {
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                transform: translateX(0);
            }

            .sidebar .sidebar-text {
                display: none;
            }

            .main-content {
                margin-right: 80px;
            }

            .sidebar.expanded {
                width: 280px;
                transform: translateX(0);
            }

            .sidebar.expanded .sidebar-text {
                display: inline;
            }

            .sidebar.expanded+.main-content {
                margin-right: 280px;
            }

            body[dir="ltr"] .sidebar {
                transform: translateX(0);
            }

            body[dir="ltr"] .sidebar.expanded+.main-content {
                margin-left: 280px;
            }
        }

        .form-control {
            transition: all 0.3s ease;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 14px 20px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            background: #2563eb;
        }

        .btn-primary:hover:before {
            left: 100%;
        }

        .header-glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
        }

        .pulse {
            animation: pulseAnimation 2s infinite;
        }

        @keyframes pulseAnimation {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        .floating {
            animation: floatingAnimation 3s ease-in-out infinite;
        }

        @keyframes floatingAnimation {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        .transaction-row {
            transition: all 0.3s ease;
            border-radius: 12px;
        }

        .transaction-row:hover {
            background: rgba(59, 130, 246, 0.1);
            transform: translateX(5px);
        }

        .dark-mode .transaction-row:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .futuristic-nav {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .dark-mode .futuristic-nav {
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .icon-circle {
            background: #eef2ff;
            color: var(--primary-color);
        }
        
        .dark-mode .icon-circle {
            background: #1e293b;
            color: #93c5fd;
        }
    </style>
</head>

<body class="<?php echo $theme; ?>">
    <!-- خلفية الجسيمات المتحركة -->
    <div id="particles-js"></div>

    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Crypto Exchange</h2>
                <button id="sidebar-toggle" class="md:hidden">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-home"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['home']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-wallet"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['wallet']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-money-bill-wave"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['sell_currency']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-shopping-cart"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['buy_currency']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-exchange-alt"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['transfer_currency']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-coins"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['exchange']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-history"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['history']; ?></span>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-icon"><i class="fas fa-cog"></i></div>
                <span class="sidebar-text"><?php echo $translations[$lang]['settings']; ?></span>
            </div>
        </div>

        <div class="px-5 py-6">
            <div class="mb-6">
                <label class="flex items-center justify-between mb-3">
                    <span class="sidebar-text"><?php echo $translations[$lang]['dark_mode']; ?></span>
                    <label class="theme-switch">
                        <input type="checkbox" id="theme-toggle" <?php echo $theme == 'dark-mode' ? 'checked' : ''; ?>>
                        <span class="slider"></span>
                    </label>
                </label>
            </div>

            <div class="mb-4">
                <span class="sidebar-text block mb-3"><?php echo $translations[$lang]['language']; ?></span>
                <div class="lang-switch">
                    <div class="lang-option <?php echo $lang == 'ar' ? 'active' : ''; ?>" data-lang="ar"><?php echo $translations[$lang]['arabic']; ?></div>
                    <div class="lang-option <?php echo $lang == 'en' ? 'active' : ''; ?>" data-lang="en"><?php echo $translations[$lang]['english']; ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <header class="futuristic-nav p-5 mb-8 flex justify-between items-center floating">
            <h1 class="text-3xl font-bold text-blue-600 header-glow"><?php echo $translations[$lang]['main_title']; ?></h1>
            <div class="flex items-center">
                <div class="mr-5">
                    <span class="font-medium"><?php echo $translations[$lang]['welcome']; ?></span>
                </div>
                <div class="w-12 h-12 rounded-full icon-circle flex items-center justify-center text-blue-600 shadow-lg pulse">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card dark:bg-gray-800">
                <div class="flex items-center">
                    <div class="icon-circle p-4 rounded-full mr-5 floating">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm"><?php echo $translations[$lang]['usdt_balance']; ?></p>
                        <h3 class="text-2xl font-bold text-blue-600">5,000.00</h3>
                    </div>
                </div>
            </div>

            <div class="card dark:bg-gray-800">
                <div class="flex items-center">
                    <div class="icon-circle p-4 rounded-full mr-5 floating">
                        <i class="fas fa-donate text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm"><?php echo $translations[$lang]['kwd_balance']; ?></p>
                        <h3 class="text-2xl font-bold text-blue-600">1,500.00</h3>
                    </div>
                </div>
            </div>

            <div class="card dark:bg-gray-800">
                <div class="flex items-center">
                    <div class="icon-circle p-4 rounded-full mr-5 floating">
                        <i class="fas fa-exchange-alt text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm"><?php echo $translations[$lang]['last_exchange']; ?></p>
                        <h3 class="text-2xl font-bold text-blue-600">1 USDT = 0.30 د.ك</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- نموذج تحويل USDT -->
        <div class="card dark:bg-gray-800">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600"><?php echo $translations[$lang]['form_title']; ?></h2>

            <?php if (!empty($success)) { ?>
                <div class="bg-green-100 text-green-800 p-5 rounded-xl text-center mb-8 floating">
                    <i class="fas fa-check-circle text-3xl mb-3"></i>
                    <p class="text-lg"><?php echo $success; ?></p>
                </div>
                <?php if (!empty($uploadedFile)) {
                    $ext = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png'])) { ?>
                        <div class="text-center my-8 max-w-md mx-auto">
                            <strong class="block mb-3 text-lg font-medium"><?php echo $translations[$lang]['proof_image']; ?></strong>
                            <img src="<?php echo $uploadedFile; ?>" alt="إثبات الدفع" class="mx-auto rounded-xl shadow-lg max-w-full h-auto floating">
                        </div>
                    <?php } else { ?>
                        <div class="text-center my-8">
                            <strong class="block mb-3 text-lg font-medium"><?php echo $translations[$lang]['proof_file']; ?></strong>
                            <a href="<?php echo $uploadedFile; ?>" target="_blank" class="text-blue-500 hover:underline font-medium">
                                <i class="fas fa-file-download mr-2"></i><?php echo basename($uploadedFile); ?>
                            </a>
                        </div>
            <?php }
                }
            } ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-5">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['full_name']; ?></label>
                        <input type="text" id="name" name="name" class="form-control w-full p-4 border rounded-xl focus:outline-none" required>
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['email']; ?></label>
                        <input type="email" id="email" name="email" class="form-control w-full p-4 border rounded-xl focus:outline-none" required>
                    </div>

                    <div class="mb-5">
                        <label for="currency" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['select_currency']; ?></label>
                        <div class="flex">
                            <select id="currency" name="currency" class="form-control w-full p-4 border rounded-l-xl rounded-r-none focus:outline-none" required>
                                <option value="USDT">Tether (USDT)</option>
                            </select>
                            <span class="inline-flex items-center px-4 bg-blue-600 text-white border border-l-0 rounded-r-xl" id="currencyPrice">0.00</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="wallet" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['wallet_address']; ?></label>
                        <input type="text" id="wallet" name="wallet" class="form-control w-full p-4 border rounded-xl focus:outline-none" required>
                    </div>

                    <div class="mb-5">
                        <label for="usdAmount" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['amount_required']; ?></label>
                        <input type="number" id="usdAmount" name="amount" class="form-control w-full p-4 border rounded-xl focus:outline-none" required>
                        <div id="cryptoAmount" class="mt-3 text-sm text-blue-500 font-medium"></div>
                    </div>

                    <div class="mb-5">
                        <label for="payment" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['payment_method']; ?></label>
                        <select id="payment" name="payment" class="form-control w-full p-4 border rounded-xl focus:outline-none" required>
                            <option value="كاش"><?php echo $translations[$lang]['cash']; ?></option>
                            <option value="تحويل بنكي"><?php echo $translations[$lang]['bank_transfer']; ?></option>
                        </select>
                    </div>

                    <div id="extraCash" class="extra-field md:col-span-2">
                        <label for="extraCashInput" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['pickup_location']; ?></label>
                        <input type="text" id="extraCashInput" name="extra" class="form-control w-full p-4 border rounded-xl focus:outline-none" placeholder="العنوان أو النقطة">
                    </div>
                    <div id="extraBank" class="extra-field md:col-span-2">
                        <label for="extraBankInput" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['bank_details']; ?></label>
                        <input type="text" id="extraBankInput" name="extra" class="form-control w-full p-4 border rounded-xl focus:outline-none" placeholder="رقم الحساب أو البنك">
                    </div>

                    <div class="mb-5 md:col-span-2">
                        <label for="proof" class="block text-gray-700 dark:text-gray-300 font-medium mb-2"><?php echo $translations[$lang]['upload_proof']; ?></label>
                        <div class="flex items-center justify-center w-full">
                            <label for="proof" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 transition-all">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG, PDF (MAX. 5MB)</p>
                                </div>
                                <input id="proof" name="proof" type="file" class="hidden" accept=".jpg,.jpeg,.png,.pdf">
                            </label>
                        </div> 
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full text-white p-4 rounded-xl font-semibold text-lg mt-8">
                    <i class="fas fa-paper-plane mr-2"></i><?php echo $translations[$lang]['submit_request']; ?>
                </button>
            </form>
        </div>

        <div class="mt-8">
            <div class="card dark:bg-gray-800">
                <h2 class="text-xl font-bold mb-5 text-blue-600"><?php echo $translations[$lang]['recent_transactions']; ?></h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-right border-b border-gray-200 dark:border-gray-700">
                                <th class="p-4 font-semibold"><?php echo $translations[$lang]['date']; ?></th>
                                <th class="p-4 font-semibold"><?php echo $translations[$lang]['type']; ?></th>
                                <th class="p-4 font-semibold"><?php echo $translations[$lang]['amount']; ?></th>
                                <th class="p-4 font-semibold"><?php echo $translations[$lang]['status']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="transaction-row">
                                <td class="p-4">12/05/2023</td>
                                <td class="p-4"><?php echo $translations[$lang]['sell_usdt']; ?></td>
                                <td class="p-4">-500 USDT</td>
                                <td class="p-4"><span class="status-badge bg-green-100 text-green-800"><?php echo $translations[$lang]['completed']; ?></span></td>
                            </tr>
                            <tr class="transaction-row">
                                <td class="p-4">10/05/2023</td>
                                <td class="p-4"><?php echo $translations[$lang]['buy_usdt']; ?></td>
                                <td class="p-4">+300 USDT</td>
                                <td class="p-4"><span class="status-badge bg-green-100 text-green-800"><?php echo $translations[$lang]['completed']; ?></span></td>
                            </tr>
                            <tr class="transaction-row">
                                <td class="p-4">08/05/2023</td>
                                <td class="p-4"><?php echo $translations[$lang]['currency_transfer']; ?></td>
                                <td class="p-4">-0.5 BTC</td>
                                <td class="p-4"><span class="status-badge bg-yellow-100 text-yellow-800"><?php echo $translations[$lang]['processing']; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // تهيئة الجسيمات المتحركة
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 100,
                        density: {
                            enable: true,
                            value_area: 1000
                        }
                    },
                    color: {
                        value: "#3b82f6"
                    },
                    shape: {
                        type: "circle",
                        stroke: {
                            width: 0,
                            color: "#000000"
                        }
                    },
                    opacity: {
                        value: 0.5,
                        random: true,
                        anim: {
                            enable: true,
                            speed: 1,
                            opacity_min: 0.1,
                            sync: false
                        }
                    },
                    size: {
                        value: 3,
                        random: true,
                        anim: {
                            enable: true,
                            speed: 3,
                            size_min: 0.1,
                            sync: false
                        }
                    },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: "#3b82f6",
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 3,
                        direction: "none",
                        random: true,
                        straight: false,
                        out_mode: "out",
                        bounce: false,
                        attract: {
                            enable: true,
                            rotateX: 600,
                            rotateY: 1200
                        }
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: {
                            enable: true,
                            mode: "bubble"
                        },
                        onclick: {
                            enable: true,
                            mode: "push"
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 140,
                            line_linked: {
                                opacity: 1
                            }
                        },
                        bubble: {
                            distance: 200,
                            size: 6,
                            duration: 2,
                            opacity: 0.8,
                            speed: 3
                        },
                        push: {
                            particles_nb: 4
                        },
                        remove: {
                            particles_nb: 2
                        }
                    }
                },
                retina_detect: true
            });

            // تبديل الوضع الليلي
            const themeToggle = document.getElementById('theme-toggle');
            themeToggle.addEventListener('change', function() {
                const newTheme = this.checked ? 'dark-mode' : 'light-mode';
                document.body.classList.remove('light-mode', 'dark-mode');
                document.body.classList.add(newTheme);
                
                // حفظ التفضيل في localStorage
                localStorage.setItem('theme', newTheme);
            });

            // تحميل السمة المحفوظة
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.classList.remove('light-mode', 'dark-mode');
                document.body.classList.add(savedTheme);
                document.getElementById('theme-toggle').checked = (savedTheme === 'dark-mode');
            }

            // تبديل اللغة
            const langOptions = document.querySelectorAll('.lang-option');
            langOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    window.location.href = `?lang=${lang}&theme=${document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode'}`;
                });
            });

            // تبديل القائمة الجانبية في الجوال
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('expanded');
                });
            }

            // إظهار/إخفاء الحقول الإضافية بناءً على طريقة الدفع
            const paymentSelect = document.getElementById('payment');
            const extraCash = document.getElementById('extraCash');
            const extraBank = document.getElementById('extraBank');

            paymentSelect.addEventListener('change', function() {
                extraCash.style.display = 'none';
                extraBank.style.display = 'none';

                if (this.value === 'كاش') {
                    extraCash.style.display = 'block';
                } else if (this.value === 'تحويل بنكي') {
                    extraBank.style.display = 'block';
                }
            });

            // تشغيل التغيير الأولي
            paymentSelect.dispatchEvent(new Event('change'));

            // تحديث سعر العملة والمبلغ المعادل
            let currentPrice = 1;

            async function fetchCurrencyPrice(currency) {
                try {
                    // محاكاة لسعر العملة (يمكن استبدالها بطلب API حقيقي)
                    const mockPrices = {
                        'usdt': 1.00
                    };
                    
                    currentPrice = mockPrices[currency.toLowerCase()] || 1.00;
                    document.getElementById('currencyPrice').textContent = `$${currentPrice.toFixed(2)}`;
                    updateCryptoAmount();
                } catch (error) {
                    console.error('Error fetching currency price:', error);
                    document.getElementById('currencyPrice').textContent = '$1.00';
                }
            }

            document.getElementById('currency').addEventListener('change', function() {
                fetchCurrencyPrice(this.value);
            });

            document.getElementById('usdAmount').addEventListener('input', updateCryptoAmount);

            function updateCryptoAmount() {
                const usd = parseFloat(document.getElementById('usdAmount').value);
                if (!isNaN(usd) && currentPrice > 0) {
                    const crypto = usd;
                    document.getElementById('cryptoAmount').textContent = `${translations['<?php echo $lang; ?>']['equivalent']} ${crypto.toFixed(2)} USDT`;
                } else {
                    document.getElementById('cryptoAmount').textContent = '';
                }
            }

            fetchCurrencyPrice(document.getElementById('currency').value);

            // إضافة تأثيرات للعناصر عند التمرير
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // مراقبة العناصر لإضافة تأثيرات التمرير
            document.querySelectorAll('.card, .sidebar-item, .btn-primary').forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(el);
            });
        });
    </script>
</body>

</html>