<?php

session_start();


function savedOrNot($nameC, $valueC) {
    if(isset($_COOKIE[$nameC])) {
        setcookie($nameC, $valueC, time()-3600);
        $_SESSION[$nameC] = "Add To Cart";
    } else {
        setcookie($nameC, $valueC);
        $_SESSION[$nameC] = 'Remove From Cart';
    }
 }

if(isset($_COOKIE['catToy'])) {$_SESSION["catToy"] = "Remove From Cart";} else {$_SESSION['catToy'] = "Add To Cart";}
if(isset($_COOKIE['dogToy'])) {$_SESSION["dogToy"] = "Remove From Cart";} else {$_SESSION['dogToy'] = "Add To Cart";}
if(isset($_COOKIE['dolphinToy'])) {$_SESSION["dolphinToy"] = "Remove From Cart";} else {$_SESSION['dolphinToy'] = "Add To Cart";}
if(isset($_COOKIE['frogToy'])) {$_SESSION["frogToy"] = "Remove From Cart";} else {$_SESSION['frogToy'] = "Add To Cart";}
if(isset($_COOKIE['fishToy'])) {$_SESSION["fishToy"] = "Remove From Cart";} else {$_SESSION['fishToy'] = "Add To Cart";}
if(isset($_COOKIE['eagleToy'])) {$_SESSION["eagleToy"] = "Remove From Cart";} else {$_SESSION['eagleToy'] = "Add To Cart";}



$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }




 switch ($action){
    case 'addcatToy': 
        savedOrNot('catToy', 'Cat Toy');
        header('Location: /web/wk3/');
        break;
    case 'removecatToy':
        if(isset($_COOKIE['catToy'])) {
            setcookie('catToy', 'Cat Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'adddogToy': 
        savedOrNot('dogToy', 'Dog Toy');
        header('Location: /web/wk3/');
        break;
    case 'removedogToy':
        if(isset($_COOKIE['dogToy'])) {
            setcookie('dogToy', 'Dog Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'adddolphinToy': 
        savedOrNot('dolphinToy', 'Dolphin Toy');
        header('Location: /CSE341-PHP/web/wk3/');
        break;
    case 'removedolphinToy':
        if(isset($_COOKIE['dolphinToy'])) {
            setcookie('dolphinToy', 'Dolphin Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'addfrogToy': 
        savedOrNot('frogToy', 'Frog Toy');
        header('Location: /CSE341-PHP/web/wk3/');
        break;
    case 'removefrogToy':
        if(isset($_COOKIE['frogToy'])) {
            setcookie('frogToy', 'Frog Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'addfishToy': 
        savedOrNot('fishToy', 'Fish Toy');
        header('Location: /CSE341-PHP/web/wk3/');
        break;
    case 'removefishToy':
        if(isset($_COOKIE['fishToy'])) {
            setcookie('fishToy', 'Fish Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'addeagleToy': 
        savedOrNot('eagleToy', 'Eagle Toy');
        header('Location: /CSE341-PHP/web/wk3/');
        break;
    case 'removeeagleToy':
        if(isset($_COOKIE['eagleToy'])) {
            setcookie('eagleToy', 'Eagle Toy', time()-3600, '/CSE341-PHP/web/wk3');
        } else {
            echo "Error: Cookie not found.";
        }
        header('Location: /wk3/index.php/?action=cart');
        break;
    case 'cart':
        $_SESSION['cartItem'] = "";
        foreach ($_COOKIE as $key=>$val) {
            if (strpos($val, "Toy")) {
                //echo $key.' is '.$val."<br>\n";
                $cartItem = '<div class="cartItem">' . $val . '<form><input type="submit" class="removeItem" value="Remove From Cart">
                            <input type="hidden" name="action" value="remove'. $key .'"></form></div>';

                $_SESSION['cartItem'] .= $cartItem;
            }
        }
        if ($_SESSION['cartItem'] == "") {
            $_SESSION['cartItem'] = "You have no items in your cart.";
        }
        include 'cart.php';
        break;    
    case 'checkoutPage':
        include 'checkout.php';
        break;
    case 'processTransaction':
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        
       $_SESSION['display'] = $address . '<br>' . $city . ',' . $state . ' ' . $zipcode; 
        $_SESSION['finalCart'] = '<h3>Cart:</h3><ul>';
       foreach ($_COOKIE as $key=>$val) {
        if (strpos($val, "Toy")) {
            $cartItem = '<li>' . $val . '</li>';
            $_SESSION['finalCart'] .= $cartItem;
        }
    }
    $_SESSION['finalCart'] .= "</ul>";

        /*process transaction code here */
        include 'confirmation.php';
        break;
    default:
        include 'store.php';
        break;
    }
    


?>
