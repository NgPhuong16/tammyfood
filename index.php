<?php
session_start();
include_once("app/models/pdo.php");
include_once("public/link.php");
include_once("app/models/user/userModel.php");
include_once("app/models/admin/userModel.php");
include_once("app/models/user/productModel.php");
include_once("app/models/user/orderModel.php");
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['idRole_user'] == 1) {
        if (isset($_GET['type'])) {
            include_once("app/controllers/user/headerController.php");
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/user/homeController.php");
                    break;
                case 'listproduct':
                    include_once("app/controllers/user/listproductController.php");
                    break;
                case 'detailproduct':
                    include_once("app/controllers/user/detailproductController.php");
                    break;
                case 'cart':
                    include_once("app/controllers/user/cartController.php");
                    break;
                case 'checkout':
                    include_once("app/controllers/user/checkoutController.php");
                    break;
                case 'changeinfor':
                    include_once("app/controllers/user/changeinforController.php");
                    break;
                    case 'checkorder':
                        include_once("app/controllers/user/orderController.php");
                        break;

                default:
                    include_once("app/controllers/user/homeController.php");
                    include_once("app/controllers/user/footerController.php");
                    break;
            }
            include_once("app/controllers/user/footerController.php");
        } else {
            include_once("app/controllers/user/headerController.php");
            include_once("app/controllers/user/homeController.php");
            include_once("app/controllers/user/footerController.php");
        }
    } else if ($_SESSION['user']['idRole_user'] == 2) {
        if (isset($_GET['type'])) {
            include_once("app/controllers/staff/headerController.php");
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/staff/homeController.php");
                    break;
                    case 'order':
                        include_once("app/controllers/staff/orderController.php");
                        break;
                        case 'takeorder':
                            include_once("app/controllers/staff/takeorderController.php");
                            break;
                default:
                include_once("app/controllers/staff/homeController.php");
                    break;
            }
        } else {
            include_once("app/controllers/staff/headerController.php");
        }
    } else if ($_SESSION['user']['idRole_user'] == 3) {
        if (isset($_GET['type'])) {
            include_once("app/controllers/shop/headerController.php");
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/admin/homeController.php");
                    break;
                    case 'order':
                        include_once("app/controllers/shop/orderController.php");
                        break;
                    case 'order1':
                        include_once("app/controllers/admin/orderController.php");
                        break;
                    case 'product':
                        include_once("app/controllers/admin/productController.php");
                        break;
                        case 'addoncate':
                            include_once("app/controllers/admin/addoncateController.php");
                            break;
                default:
                    include_once("app/controllers/shop/homeController.php");
                    break;
            }
        } else {
            include_once("app/controllers/shop/headerController.php");
            include_once("app/controllers/shop/homeController.php");
        }
    } else if ($_SESSION['user']['idRole_user'] == 4) {
        if (isset($_GET['type'])) {
            include_once("app/controllers/admin/headerController.php");
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/admin/homeController.php");
                    break;
                case 'product':
                    include_once("app/controllers/admin/productController.php");
                    break;
                case 'addoncate':
                    include_once("app/controllers/admin/addoncateController.php");
                    break;
                case 'shop':
                    include_once("app/controllers/admin/shopController.php");
                    break;
                case 'order':
                    include_once("app/controllers/admin/orderController.php");
                    break;
                    case 'order1':
                        include_once("app/controllers/admin/orderController.php");
                        break;
                        case 'order2':
                            include_once("app/controllers/admin/orderController.php");
                            break;
                        case 'user':
                            include_once("app/controllers/admin/userController.php");
                            break;
                            case 'shift':
                                include_once("app/controllers/admin/shiftController.php");
                                break;
                default:
                    include_once("app/controllers/admin/headerController.php");
                    break;
            }
        } else {
            include_once("app/controllers/admin/headerController.php");
            include_once("app/controllers/admin/homeController.php");
        }
    } else {
        if (isset($_GET['type'])) {
            include_once("app/controllers/user/headerController.php");
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/user/homeController.php");
                    break;
                case 'listproduct':
                    include_once("app/controllers/user/listproductController.php");
                    break;
                case 'detailproduct':
                    include_once("app/controllers/user/detailproductController.php");
                    break;
                case 'login':
                    include_once("app/controllers/user/loginController.php");
                    break;
                case 'regis':
                    include_once("app/controllers/user/regisController.php");
                    break;
                case 'cart':
                    include_once("app/controllers/user/cartController.php");
                    break;
                case 'checkout':
                    include_once("app/controllers/user/checkoutController.php");
                    break;
                case 'changeinfor':
                    include_once("app/controllers/user/changeinforController.php");
                    break;

                default:
                    include_once("app/controllers/user/homeController.php");
                    include_once("app/controllers/user/footerController.php");
                    break;
            }
            include_once("app/controllers/user/footerController.php");
        } else {
            include_once("app/controllers/user/headerController.php");
            include_once("app/controllers/user/homeController.php");
            include_once("app/controllers/user/footerController.php");
        }
    }
} else {
    if (isset($_GET['type'])) {
        include_once("app/controllers/user/headerController.php");
        switch ($_GET['type']) {
            case 'home':
                include_once("app/controllers/user/homeController.php");
                break;
            case 'listproduct':
                include_once("app/controllers/user/listproductController.php");
                break;
            case 'detailproduct':
                include_once("app/controllers/user/detailproductController.php");
                break;
            case 'login':
                include_once("app/controllers/user/loginController.php");
                break;
            case 'loginadmin':
                include_once("app/controllers/admin/loginController.php");
                break;
            case 'regis':
                include_once("app/controllers/user/regisController.php");
                break;
            case 'cart':
                include_once("app/controllers/user/cartController.php");
                break;
                case 'resetpass':
                    include_once("app/views/user/resetpassform.view.php");
                    break;
                    case 'newpass':
                        include_once("app/controllers/user/newpassController.php");
                        break;
                        case 'checkout':
                            include_once("app/controllers/user/checkoutController.php");
                            break;
            default:
                include_once("app/controllers/user/homeController.php");
                include_once("app/controllers/user/footerController.php");
                break;
        }
        include_once("app/controllers/user/footerController.php");
    } else {
        include_once("app/controllers/user/headerController.php");
        include_once("app/controllers/user/homeController.php");
        include_once("app/controllers/user/footerController.php");
    }
}
?>
<script src=""></script>