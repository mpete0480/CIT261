<?php
$ot_array = array();

function breakText($str)
{
    global $ot_array;
    $text_break = $str;
    if (strlen($text_break) > 0) {
        $break_array = array();
        //weren‘t
        $text_break = str_replace("’", "'", trim($text_break));
        $word_break_array1 = array('!', '(', ')', '[', ']', '—', ': ', ';', '..', '...', '?', '\n', ' \n', '\n ', ' \n ', '\r', ' \r', '\r ', ' \r ', ' “', '“ ', '\r“', '\n“', " . ",  " .", " , ", ", ", ',\n', ",\r", '---', ' --- '); 
        $word_break_array_1 = array('/ (and) /i', '/ (after) /i', '/ (because) /i', '/ (before) /i', '/ (but) /i', '/ (even) /i', '/ (however) /i', '/(instead) /i', ' /so$/', '/(then) /i', '/(when) /i', '/(where) /i', '/(wherever) /i', '/(which) /i', '/(whichever) /i');
        $reg = array(
            'COMMA_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\,+] ([a-zA-Z0-9])/',
            'COMMA_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\,+]([a-zA-Z0-9])/',
            'COMMA_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\,+]([a-zA-Z])/',
            'COLON_NUMBER_AFTER_SPACE' => '/([0-9]+)[\,+] ([a-zA-Z])/',
            'COLON_NUMBER_BEFORE_SPACE' => '/([0-9]+) [\,+]([a-zA-Z])/',
            'COLON_NUMBER_AFTER_BEFORE_SPACE' => '/([0-9]+) [\,+] ([a-zA-Z0-9])/',
            'DOT_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\.+] ([a-zA-Z0-9])/',
            // 'DOT_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\.+]([a-zA-Z0-9])/',
            'DOT_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\.+]([a-zA-Z])/',
            'COLON_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\:+] ([a-zA-Z0-9])/',
            'COLON_WITH_BEFORE_SPACE' => '/([a-zA-Z]+) [\:+]([a-zA-Z0-9])/',
            'COLON_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\:+]([a-zA-Z0-9])/',
            'COLON_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\:+]([a-zA-Z])/',
            'COMMA_WITH_AFTER_word' => '/(") /i',
            'COMMA_WITH_AFTER_wor' => '/(‘) /i',
            #'SPACE_REMOVE' => '!\s+!',
            #'SPACE_REMOVE_ONE' => '/\s+/',
            #'SPACE_REMOVE_TWO' => '/(\s\s+|\t|\n)/',
            #'COLON_TAB' => '/\t/',
            #   'COLON_TAB_ONE' => '/\t+/',
            #'COLON_TAB_TWO' => '/[\t|\s{2,}]/',
            #'COLON_TAB_TWO' => '/\t/g',
        );

        foreach ($reg as $k => $v) {
            $text_break = preg_replace($v, "$1 --- $2", $text_break);
        }
        //  foreach ($degree as $k => $v) {
        //      $text_break = preg_replace($v,"$v ---", $text_break);
        //  }
       $letters = array('Dr ---', 'Mr ---','Mrs ---','Mrs ---');
        $degree = array('Dr.', 'Mr.','Mrs.','Ms.');
        $text_break = str_replace($letters, $degree, $text_break);
       
        foreach ($word_break_array_1 as $k => $v) {
            $text_break = preg_replace($v, "\n $1 ", $text_break);
        }
        //
        $output = multiexplode($word_break_array1, $text_break);
       // return $output;
        // print_R($output );
        // die();
        #echo "<br> Count => ".count($output );
        $output = array_filter($output);
        $output = array_map('trim', $output);
        #echo "<pre>";print_r($output );exit;
        #echo "<br> Count => ".count($output );
        foreach ($output as $OK => $OV) {
            if (trim($OV) != '') {
                array_push($ot_array, trim(double_qu(trim($OV))));
            }
        }
        $ot_array = $ot_array;
        $ot_array = array_filter($ot_array);
        $ot_array = array_values($ot_array);
        $abc_array = array();
        if (count($ot_array) > 0) {
            foreach ($ot_array as $k => $v) {
                $temp_array = explode("\n", $v);
                if (count($temp_array) > 0) {
                    foreach ($temp_array as $tk => $tv) {
                        #$tv = str_replace('–','-',trim($tv));
                        $abc_array[] = trim($tv);
                    }
                }
            }
        }
        // echo "<pre>";
        // print_r($abc_array);exit;
        #echo "<pre>";print_r($ot_array);
        //        echo "<pre>";print_r($ot_array);exit;
        return $abc_array;
    }
    //     return $abc_array;
}

function breakTexto($str)
{
    global $ot_array;
    $text_break = $str;
    if (strlen($text_break) > 0) {
        $break_array = array();
        //weren�t
        $text_break = str_replace("�", "'", trim($text_break));
        #$word_break_array1 = array('after', ' and', 'because', 'before', 'but', 'even', 'however', 'instead', ' so ', 'then', 'when', 'where', 'wherever', 'which', 'whichever', '!', '(', ')', '[', ']', '�', ': ', ';', '..', '...', '?', '\n', ' \n', '\n ', ' \n ', '\r', ' \r', '\r ', ' \r ', ' �', '\r�', '\n�', " . ", ". ", " , ", ", ", ',\n', ",\r", '---', ' --- ');//".", ","
        $word_break_array1 = array('!', '(', ')', '[', ']', '�', ': ', ';', '..', '...', '?', '\n', ' \n', '\n ', ' \n ', '\r', ' \r', '\r ', ' \r ', ' �', '� ', '\r�', '\n�', " . ", ". ", " .", " , ", ", ", ',\n', ",\r", '---', ' --- '); //".", ","
        $word_break_array_1 = array('/ (and) /i', '/ (after) /i', '/ (because) /i', '/ (before) /i', '/ (but) /i', '/ (even) /i', '/ (however) /i', '/(instead) /i', ' /so$/', '/(then) /i', '/(when) /i', '/(where) /i', '/(wherever) /i', '/(which) /i', '/(whichever) /i');
        $reg = array(
            'COMMA_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\,+] ([a-zA-Z0-9])/',
            'COMMA_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\,+]([a-zA-Z0-9])/',
            'COMMA_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\,+]([a-zA-Z])/',
            'COLON_NUMBER_AFTER_SPACE' => '/([0-9]+)[\,+] ([a-zA-Z])/',
            'COLON_NUMBER_BEFORE_SPACE' => '/([0-9]+) [\,+]([a-zA-Z])/',
            'COLON_NUMBER_AFTER_BEFORE_SPACE' => '/([0-9]+) [\,+] ([a-zA-Z0-9])/',
            'DOT_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\.+] ([a-zA-Z0-9])/',
//            'DOT_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\.+]([a-zA-Z0-9])/',
            'DOT_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\.+]([a-zA-Z])/',
            'COLON_WITH_AFTER_SPACE' => '/([a-zA-Z]+)[\:+] ([a-zA-Z0-9])/',
            'COLON_WITH_BEFORE_SPACE' => '/([a-zA-Z]+) [\:+]([a-zA-Z0-9])/',
            'COLON_WITH_OUT_AFTER_SPACE' => '/([a-zA-Z]+)[\:+]([a-zA-Z0-9])/',
            'COLON_BEFORE_NUMBER_AFTER_ALPHA' => '/([0-9]+)[\:+]([a-zA-Z])/',
            'COMMA_WITH_AFTER_word' => '/(") /i',
            'COMMA_WITH_AFTER_wor' => '/(�) /i',
            #'SPACE_REMOVE' => '!\s+!',
            #'SPACE_REMOVE_ONE' => '/\s+/',
            #'SPACE_REMOVE_TWO' => '/(\s\s+|\t|\n)/',
            #'COLON_TAB' => '/\t/',
            #   'COLON_TAB_ONE' => '/\t+/',
            #'COLON_TAB_TWO' => '/[\t|\s{2,}]/',
            #'COLON_TAB_TWO' => '/\t/g',
        );
        $degree = array("dr" => "Dr.");

        foreach ($reg as $k => $v) {
            $text_break = preg_replace($v, "$1 --- $2", $text_break);
        }
        foreach ($degree as $k => $v) {
            $text_break = preg_replace($v, "$1 . $2", $text_break);
        }
        print_r($text_brea);
        die();

        foreach ($word_break_array_1 as $k => $v) {
            $text_break = preg_replace($v, "\n $1 ", $text_break);
        }
        $output = multiexplode($word_break_array1, $text_break);

        #echo "<br> Count => ".count($output );
        $output = array_filter($output);
        $output = array_map('trim', $output);
        #echo "<pre>";print_r($output );exit;
        #echo "<br> Count => ".count($output );
        foreach ($output as $OK => $OV) {
            if (trim($OV) != '') {
                array_push($ot_array, trim(double_qu(trim($OV))));
            }
        }
        $ot_array = $ot_array;
        $ot_array = array_filter($ot_array);
        $ot_array = array_values($ot_array);
        $abc_array = array();
        if (count($ot_array) > 0) {
            foreach ($ot_array as $k => $v) {
                $temp_array = explode("\n", $v);
                if (count($temp_array) > 0) {
                    foreach ($temp_array as $tk => $tv) {
                        #$tv = str_replace('–','-',trim($tv));
                        $abc_array[] = trim($tv);
                    }
                }
            }
        }
        #echo "<pre>";print_r($abc_array);exit;
        #echo "<pre>";print_r($ot_array);
        //        echo "<pre>";print_r($ot_array);exit;
        return $ot_array;
    }
//     return $abc_array;
}


function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);

    $launch = explode($delimiters[0], $ready);
    return $launch;
}

function double_qu($string)
{
    global $ot_array;
    $pos = strpos($string, ' "');
    if ($pos === false) {
        #return $string;
        //        print_r((trim($string)));
        array_push($ot_array, $string);
    } else {
        $temp_dt_temp = explode(' "', $string);
        if (count($temp_dt_temp) > 0) {
            #echo " <br> IN 5 => ".$string;
            $ctr = 1;
            foreach ($temp_dt_temp as $DK1 => $DV1) {
                #echo " <br> IN 6  => ".$ctr. " => ".$DV1;
                double_qu($DV1);
            }
        } else {
            #echo " <br> IN 7 => ".$string;
            array_push($ot_array, (trim($string)));
            #return $string;
        }
    }
}
?>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1> D.M code</h1>
        <label >Text input:</label>
        <form action="" method="post">
            <textarea name="text" rows="10" cols="100">This is a test paragraph for Textbreaker. It has various punctuation, such as a semi-colon; and a colon: which should lead to a question mark? And not forgetting an exclamation mark! At all of these punctuation marks, there should be a break. However, there should be no break for Dr. Marshall, or for $1,333,039.00, or for https://access.thebraincat.com/  Also the word also should not be broken as it currently is.
            my email id is jonwardconsulting@gmail.com.</textarea>
            <input name="submit" type="submit" value="Submit">
        </form>
        <?php
if (isset($_POST['submit'])) {
    $str = $_POST['text'];

    $output = breakText($str);
    //$output = break6code($str);
    // $output =  sameascopy($str);
    ?>
            <label >Text output:</label>
            <table>
            <?php foreach ($output as $o) {?>
                    <tr><td><?php print_r($o);?></td></tr>
            <?php }?>
            </table>

    <?php
}
?>
    </body>
</html>
