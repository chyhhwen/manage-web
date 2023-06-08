<?php
    include "plugins.php";
    $s = k($GLOBALS['time']);
    if(@s('index'))
    {
        switch(@g('page'))
        {
            case "access":
                echo
                '
                    <html>
                    <head>
                        <link rel="stylesheet" href="index.css">
                        <meta charset="UTF-8">
                        <title>專案管理系統</title>
                    </head>
                    <body>
                    <nav>
                        <span>'. $_COOKIE['name'] .'</span>
                    </nav>
                    <div class="view">
                        <aside>
                            <h2><a href="index.php?page=access">存取資料</a></h2>
                            <h2><a href="index.php?page=list">待辦事項</a></h2>
                            <h2><a href="index.php?page=memo">備忘錄</a></h2>
                            <h2><a href="#">樓層資料</a></h2>
                        </aside>
                    <main>
                ';
                $val = require "require.php";
                $pdo = conn($val['db']);
                $sql = "SELECT * FROM `". $val['table1'] ."`";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            $array = array(array());
                $check = false;
                $name = "";
                echo'<table><tbody>';
                $i = 0;
	            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	            {
                    $i += 1;
	            	echo
                    '
                        <tr>
                            <td style="width:5vw"><h2>'. $i .'</h2></td>
                            <td style="width:10vw"><h2>'. $row[$val['na']] .'</h2></td>
                            <td style="width:75vw"><h2>'. $row[$val['we']] .'</h2></td>
                        </tr>
                    ';
	            }
                echo'</table></tbody>';
	            unset($pdo);
                echo'                
                    </main>
                    </div>
                    </body>
                    </html>
                ';
            break;
            case "list":
                echo
                '
                    <html>
                    <head>
                        <link rel="stylesheet" href="index.css">
                        <meta charset="UTF-8">
                        <title>專案管理系統</title>
                    </head>
                    <body>
                    <nav>
                        <span>'. $_COOKIE['name'] .'</span>
                    </nav>
                    <div class="view">
                        <aside>
                            <h2><a href="index.php?page=access">存取資料</a></h2>
                            <h2><a href="index.php?page=list">待辦事項</a></h2>
                            <h2><a href="index.php?page=memo">備忘錄</a></h2>
                            <h2><a href="#">樓層資料</a></h2>
                        </aside>
                    <main>
                ';
                $val = require "require.php";
                $pdo = conn($val['db']);
                $sql = "SELECT * FROM `". $val['table2'] ."`";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            $array = array(array());
                $check = false;
                $name = "";
                echo'<table><tbody>';
                $i = 0;
	            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	            {
                    $i += 1;
	            	echo
                    '
                        <tr>
                            <td style="width:5vw"><h2>'. $i .'</h2></td>
                            <td style="width:85vw"><h2>'. $row[$val['th']] .'</h2></td>
                        </tr>
                    ';
	            }
                echo'</table></tbody>';
	            unset($pdo);
                echo'                
                    </main>
                    </div>
                    </body>
                    </html>
                ';
            break;
            case "memo":
                echo
                '
                    <html>
                    <head>
                        <link rel="stylesheet" href="index.css">
                        <meta charset="UTF-8">
                        <title>專案管理系統</title>
                    </head>
                    <body>
                    <nav>
                        <span>'. $_COOKIE['name'] .'</span>
                    </nav>
                    <div class="view">
                        <aside>
                            <h2><a href="index.php?page=access">存取資料</a></h2>
                            <h2><a href="index.php?page=list">待辦事項</a></h2>
                            <h2><a href="index.php?page=memo">備忘錄</a></h2>
                            <h2><a href="#">樓層資料</a></h2>
                        </aside>
                    <main>
                ';
                $val = require "require.php";
                $pdo = conn($val['db']);
                $sql = "SELECT * FROM `". $val['table3'] ."`";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            $array = array(array());
                $check = false;
                $name = "";
                echo'<table><tbody>';
                $i = 0;
	            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	            {
                    $i += 1;
	            	echo
                    '
                        <tr>
                            <td style="width:5vw"><h2>'. $i .'</h2></td>
                            <td style="width:85vw"><h2>'. $row[$val['th']] .'</h2></td>
                        </tr>
                    ';
	            }
                echo'</table></tbody>';
	            unset($pdo);
                echo'                
                    </main>
                    </div>
                    </body>
                    </html>
                ';
            break;
            default:
                echo
                '
                    <html>
                    <head>
                        <link rel="stylesheet" href="index.css">
                        <meta charset="UTF-8">
                        <title>專案管理系統</title>
                    </head>
                    <body>
                        <nav>
                            <span>'. $_COOKIE['name'] .'</span>
                        </nav>
                        <div class="view">
                            <aside>
                                <h2><a href="index.php?page=access">存取資料</a></h2>
                                <h2><a href="index.php?page=list">待辦事項</a></h2>
                                <h2><a href="index.php?page=memo">備忘錄</a></h2>
                                <h2><a href="#">樓層資料</a></h2>
                            </aside>
                            <main>
                                <h1>歡迎使用本系統</h1>
                            </main>
                        </div>
                    </body>
                    </html>
                ';
            break;
        }
    }
    else
    {
        if(@p('fix'))
        {
            $val = require "require.php";
            $u = p('username');
            $p = p('password');
            $pdo = conn($val['db']);
            $sql = "SELECT * FROM `". $val['table'] ."`";
	        $stmt = $pdo->prepare($sql);
	        $stmt->execute();
	        $array = array(array());
            $check = false;
            $name = "";
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	        {
	        	if($u == $row[$val['un']] && k($p) == $row[$val['pa']])
                {
                    $check = true;
                    $name =$row[$val['na']]; 
                    break;
                }
	        }
	        unset($pdo);
            if($check)
            {
                setcookie("name",$name);
                set_s(['index',true]);
            }
            ref([0,'index.php']);
        }
        else
        {
            echo
            '
                <html>
                <head>
                    <link rel="stylesheet" href="index.css">
                    <meta charset="UTF-8">
                    <title>專案管理系統</title>
                </head>
                <body>
                    <nav>
                        <span>專案管理</span>
                    </nav>
                    <form action="" method="POST">
                    <div class="login">
                        <div class="item">
                            <h1 style="margin-left: 5%;">帳號</h1>
                            <input type = "text" name = "username">
                        </div>
                        <div class="item">
                            <h1 style="margin-left: 5%;">密碼</h1>
                            <input type = "password" name = "password">
                        </div>
                        <div class="item">
                            <input type = "submit" value = "確定" name = "fix">
                        </div>
                    </div>
                    </form>
                </body>
                </html>
            ';
        }
    }
?>