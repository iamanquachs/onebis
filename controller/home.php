<?php
require('includes/jwt.php');
//! không được require lại các class đã khai báo trong home
$active = 99;
if (isset($_COOKIE['token']) && $_COOKIE['token'] != "") {
    $token = $_COOKIE['token'];
    $json_authorization = JWT::decode($token, sha1('TPS@1719'), true);
    $data_encode =  json_encode($json_authorization);
    $data_decode = json_decode($data_encode);
    $msdv = $data_decode->msdv;
    $msdn = $data_decode->msdn;
    $chucvu = $data_decode->chucvu;
    if ($msdv != $_COOKIE['msdv'] || $msdn != $_COOKIE['msdn'] || $chucvu != $_COOKIE['chucvu'] || user_check_block($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'])[0]->rowid > 0) {
        header('location:Logout');
    }
    if ($_COOKIE['ngaydangnhap'] != date('d/m/Y')) {
        $filename = 'home';
        setcookie("ngaydangnhap", date('d/m/Y'), time() + 30758400, "/");
    }
}
$msdn = $_COOKIE['msdn'];

switch ($components) {
        //Hồ sơ đơn vị
    case 'LandingPage':
        require_once CONTROLS . 'landing_page_public.php';
        break;
        //Hồ sơ đơn vị
    case 'Agency':
        if ($_COOKIE['msdv'] == 'ONEBIS') {
            require_once CONTROLS . 'hosodonvi.php';
        }
        break;
        //Chat box
    case 'ChatAI':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'chatai.php';
            }
        }
        break;
        //CRM
    case 'CRM':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'crm.php';
            }
        }
        break;
        //Landing page
    case 'ManageLandingPage':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'landing_page.php';
            }
        }
        break;
        //Khách hàng
    case 'Customer':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'khachhang.php';
            }
        }
        break;
        //Tiếp nhận
    case 'Reception':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'tiepnhan.php';
            }
        }
        break;
        //Tư vấn
    case 'Advise':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'tuvan.php';
            }
        }
        break;
        //Dịch vụ
    case 'Service':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'dichvu.php';
            }
        }
        break;
        //Sản phẩm
    case 'Product':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'sanpham.php';
            }
        }
        break;
        //Sử dụng tài sản
    case 'AssetManagement':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'quanlytaisan.php';
            }
        }
        break;
        //Nhóm khách hàng
    case 'Member':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'member.php';
            }
        }
        break;
        // Ví khách hàng
    case 'Wallet':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'wallet.php';
            }
        }
        break;
        //Danh mục
    case 'Category':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'danhmuc.php';
            }
        }
        break;
        //Nhân viên
    case 'Employee':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'nhanvien.php';
            }
        }
        break;
        //Tham số hệ thống
    case 'Parameter':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'thamso.php';
            }
        }
        break;
        //Thực hiện
    case 'Journal':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'nhatky.php';
            }
        }
        break;
    case 'ServiceTooth':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'Journal')[0]->msdn == 1) {
                require_once CONTROLS . 'dichvu_rang.php';
            }
        }
        break;
        //Khuyến mãi
    case 'Vouchers':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'voucher.php';
            }
        }
        break;
    case 'Promotions':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'ctkm.php';
            }
        }
        break;
        //Thu chi
    case 'Accouting':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'thuchi.php';
            }
        }
        break;
        //Báo cáo
    case 'ReportAccouting':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocaothuchi.php';
            }
        }
        break;
    case 'ReportRate':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocao_hieuqua_nhanvien.php';
            }
        }
        break;
    case 'ReportProductAndServices':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocao_hanghoa_dichvu.php';
            }
        }
        break;
    case 'ReportPerformServices':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocao_bangluong.php';
            }
        }
        break;
    case 'ReportActivity':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocaohoatdong.php';
            }
        }
        break;
    case 'ReportCreditSummary':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocaocongno_tonghop.php';
            }
        }
        break;
    case 'ReportCreditDetail':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'baocaocongno_chitiet.php';
            }
        }
        break;
        //Đơn hàng
    case 'Sale':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListSale')[0]->msdn == 1) {
                require_once CONTROLS . 'banhang.php';
            }
        }
        break;
    case 'SaleEdit':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListSale')[0]->msdn == 1) {
                require_once CONTROLS . 'banhang_edit.php';
            }
        }
        break;
    case 'ListSale':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'danhsachdonhang.php';
            }
        }
        break;
        //Đặt hen.
    case 'ListOrder':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'danhsachdathen.php';
            }
        }
        break;
        //Nhập kho
    case 'Import':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListImport')[0]->msdn == 1) {
                require_once CONTROLS . 'nhapkho.php';
            }
        }
        break;
    case 'EditImport':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListImport')[0]->msdn == 1) {
                require_once CONTROLS . 'nhapkho_edit.php';
            }
        }
        break;
    case 'ListImport':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'danhsachnhapkho.php';
            }
        }
        break;
        //Xuất kho
    case 'ListExport':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'danhsachxuatkho.php';
            }
        }
        break;
    case 'Export':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListExport')[0]->msdn == 1) {
                require_once CONTROLS . 'xuatkho.php';
            }
        }
        break;
    case 'EditExport':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, 'ListExport')[0]->msdn == 1) {
                require_once CONTROLS . 'xuatkho_edit.php';
            }
        }
        break;
        //Tồn kho
    case 'ListWareHouse':
        if (count(ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan')) == 0) {
            if (ktra_admin($_COOKIE['mshs'], $msdv, $msdn)[0]->admin == 1 || kiemtra_phanquyen_user($msdn, $components)[0]->msdn == 1) {
                require_once CONTROLS . 'tonkho.php';
            }
        }
        break;
        //Đăng xuất
    case 'Logout':
        if (isset($active) && $active == 99) {
            require_once CONTROLS . 'logout.php';
        }
        break;
    case 'Api':
        require_once CONTROLS . 'api.php';
        break;
    default:
        if (isset($_COOKIE['mshs'])) {
            $load_home = load_home($_COOKIE['mshs'], $_COOKIE['msdv']);
        }
        $filename = 'home';
        break;
}
