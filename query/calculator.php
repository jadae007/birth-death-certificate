<?php
$_begin_thai_date = "1956-12-03";
$arr_atikawan_y = [2500, 2506, 2513, 2516, 2522, 2530, 2533, 2540, 2543, 2549, 2552, 2559, 2563, 2568, 2575, 2578, 2586, 2589, 2595];
$_begin_year = 1957;
$_check_year = 2030; // ปีที่จะหาข้อมูล
$day_add = 0; // วันที่เพิ่มแต่ละปี
$arr_year;
for ($i = $_begin_year; $i <= $_check_year; $i++) {
    $is_atikamas = (fmod((($i - 78) - 0.45222), 2.7118886) < 1) ? 1 : 0;
    $is_atikawan = (in_array(($i + 543), $arr_atikawan_y)) ? 1 : 0;
    $day_in_year = 354;
    $day_in_year = ($is_atikamas == 1) ? 384 : $day_in_year;
    $day_in_year = ($is_atikawan == 1) ? 355 : $day_in_year;

    // วันขึ้น 1 ค่ำ เดือน 1 ของแต่ละปี
    $begin_buddhist_day_of_year = date("Y-m-d", strtotime($_begin_thai_date . " +$day_add day")); // 

    $day_add += $day_in_year; // เพิ่มวันแต่ละปี
    // echo $i." - ".$day_in_year." - ".$begin_buddhist_day_of_year."<br>";
    $c_day = 0; // นับวัน
    $c_month = 0; // นับเดือน
    $c_u_day = 0; // นับวันขึ้น
    $c_d_day = 0; // นับวันแรม   
    $current_month = 1; // เดือนเริ่มต้น
    $day_in_month = 0; // วันในแต่ละเดือน
    $month_in_year = 12; // เดือนใน 1 ปี
    $double_month = false; // เดือน 8 สองหนหรือไม่
    $month_in_year = ($is_atikamas == 1) ? 13 : $month_in_year; // มี 13 เดือน
    if ($i == $_check_year) { // วนลูปเฉพาะปีที่จะดู
        for ($v = 0; $v < ($day_in_year + 60); $v++) { // วนลุป วันในปีนั้นๆ +เพิ่มวันเพื่อให้ข้ามปี
            $c_day++;
            $final_d_day = ($current_month % 2 == 1) ? 14 : 15;
            $final_d_day = ($is_atikawan == 1 && $current_month == 7) ? 15 : $final_d_day;
            if ($c_d_day == $final_d_day) { // ถึงวันแรมสุดท้ายของเดือน เริ่มเดือนใหม่
                $current_month++;
                if ($current_month == 13) { // เข้าปีปฏิทินไทยใหม่ นับเดือนใหม่
                    $current_month = 1;
                }
                // ปีที่มีแปด 2 หน
                if ($is_atikamas && $current_month == 9 && $double_month == false) {
                    $current_month--;
                    $double_month = true;
                }
                $c_u_day = 0;
                $c_d_day = 0;
            }
            if ($c_u_day < 15) { // นับวันข้างขึ้น
                $c_u_day++;
            } else {
                if ($c_d_day < $final_d_day) { // นับวันข้างแรม
                    $c_d_day++;
                }
            }
            // แสดงวันที่ในปฏิทิน
            //echo date("Y-m-d",strtotime($begin_buddhist_day_of_year."+ $v day"))." - ";
            // แสดงวันข้างขื้น หรือข้างแรม
            if ($c_d_day > 0) {
                //echo "แรม $c_d_day  เดือน $current_month "."<br>";
                $rows[$_check_year][] =  array("date" => date("Y-m-d", strtotime($begin_buddhist_day_of_year . "+ $v day")), "thaiDay" => "แรม " . $c_d_day, "thaiMonth" => $current_month);
            } else {
                //echo "ขึ้น $c_u_day เดือน $current_month "."<br>";
                $rows[$_check_year][] =  array("day" => date("Y-m-d", strtotime($begin_buddhist_day_of_year . "+ $v day")), "thaiDay" => "ขึ้น " . $c_u_day, "thaiMonth" => $current_month);
            }
        }
    }
}
$toyear = 1997;
$birthyear = $_check_year;
$birthpet = "ฉลู";

$x = ($toyear - $birthyear) % 12;
if (($x == 1) || ($x == -11)) {
    $birthpet = "ชวด";
} else {
    if ($x == 0) {
        $birthpet = "ฉลู";
    } else {
        if (($x == 11) || ($x == -1)) {
            $birthpet = "ขาล";
        } else {
            if (($x == 10) || ($x == -2)) {
                $birthpet = "เถาะ";
            } else {
                if (($x == 9) || ($x == -3)) {
                    $birthpet = "มะโรง";
                } else {
                    if (($x == 8) || ($x == -4)) {
                        $birthpet = "มะเส็ง";
                    } else {
                        if (($x == 7) || ($x == -5)) {
                            $birthpet = "มะแม";
                        } else {
                            if (($x == 6) || ($x == -6)) {
                                $birthpet = "มะเมีย";
                            } else {
                                if (($x == 5) || ($x == -7)) {
                                    $birthpet = "วอก";
                                } else {
                                    if (($x == 4) || ($x == -8)) {
                                        $birthpet = "ระกา";
                                    } else {
                                        if (($x == 3) || ($x == -9)) {
                                            $birthpet = "จอ";
                                        } else {
                                            if (($x == 2) || ($x == -10)) {
                                                $birthpet = "กุน";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
$rows['thaiYear']=$birthpet;
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
