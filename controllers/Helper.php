<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\controllers;

/**
 * Description of Helper
 *
 * @author hiramani
 */
class Helper {

    public function actionNepaliDate() {
        date_default_timezone_set('Asia/Kathmandu');
        $nepdate = new NepaliCalender();
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $today = $nepdate->eng_to_nep($year, $month, $day);
//print_r($cal->nep_to_eng(2065,8,8));
        //$nepali_date1 = $today['year'] . '-' . $today['month'] . '-' . $today['date'];

        $nepali_date2 = strlen($today['month']);
        $nepali_date1 = strlen($today['date']);
        if ($nepali_date2 == 1) {
            $month1 = '0' . $today['month'];
        } else {
            $month1 = $today['month'];
        }
        if ($nepali_date1 == 1) {
            $date1 = '0' . $today['date'];
        } else {
            $date1 = $today['date'];
        }
        $nepali_today = $today['year'] . '-' . $month1 . '-' . $date1;
        return $nepali_today;
    }

    //put your code here
    public function getUserId() {
        $user = \Yii::$app->user->id;
        return $user;
    }

    public function getOrganization() {
        $user = \app\models\Users::findOne(['id' => $this->getUserId()]);
        return $user->fk_organization_id;
    }
    public function getUserbranch() {
        $user = \app\models\Users::findOne(['id' => $this->getUserId()]);
        return $user->fk_branch_id;
    }

    public function getBranch() {
        $branch = \app\models\Branch::findOne(['fk_organization_id' => $this->getOrganization()]);
        return $branch->id;
    }
    function money_format_nep($number, $is_unicode = true) {
        //number_format($number,".");

        if (strstr($number, "-")) {
            $number = str_replace("-", "", $number);
            $negative = "-";
        }

        $split_number = @explode(".", $number);

        $rupee = $split_number[0];
        $paise = @$split_number[1];
        $thousands = '';
        $lakhs = '';
        if (@strlen($rupee) > 3) {
            $hundreds = substr($rupee, strlen($rupee) - 3);
            $thousands_in_reverse = strrev(substr($rupee, 0, strlen($rupee) - 3));
            $length = (strlen($thousands_in_reverse));
            // var_dump($thousands_in_reverse);die;
            for ($i = 0; $i < (strlen($thousands_in_reverse)); $i++) {

                // var_dump(strlen($thousands_in_reverse));die;

                $thousands .= $thousands_in_reverse[$i];
                if ($i % 2) {
                    $thousands .= ',';
                }
            }
            $thousands = strrev(trim($thousands, ","));
            $formatted_rupee = $thousands . "," . $hundreds;
        } else {
            $formatted_rupee = $rupee;
        }

        if ((int) $paise > 0) {
            $formatted_paise = "." . substr($paise, 0, 2);
        } else {
            $formatted_paise = "." . substr("00", 0, 2);
        }

        if ($is_unicode) {
            return $this->get_nep($formatted_rupee . $formatted_paise);
        } else {
            return $formatted_rupee . $formatted_paise;
        }
    }

    public function numbersToNepali($number) {

        if (strstr($number, "-")) {
            $number = str_replace("-", "", $number);
            $negative = "-";
        }

        $split_number = @explode(".", $number);

        $rupee = $split_number[0];
        $paise = @$split_number[1];
        $thousands = '';
        $lakhs = '';
        if (@strlen($rupee) > 3) {
            $hundreds = substr($rupee, strlen($rupee) - 3);
            $thousands_in_reverse = strrev(substr($rupee, 0, strlen($rupee) - 3));
            $length = (strlen($thousands_in_reverse));
            // var_dump($thousands_in_reverse);die;
            for ($i = 0; $i < (strlen($thousands_in_reverse)); $i++) {

                // var_dump(strlen($thousands_in_reverse));die;

                $thousands .= $thousands_in_reverse[$i];
                if ($i % 2) {
                    $thousands .= ',';
                }
            }
            $thousands = strrev(trim($thousands, ","));
            $formatted_rupee = $thousands . "," . $hundreds;
        } else {
            $formatted_rupee = $rupee;
        }

        if ((int) $paise > 0) {
            $formatted_paise = "." . substr($paise, 0, 2);
        } else {
            $formatted_paise = "." . substr("00", 0, 2);
        }
        //$money = $formatted_rupee . $formatted_paise;
        $hajarSeperate = explode(',', $formatted_rupee);
        // var_dump($hajarSeperate);die;
        $nepaliAkxar = '';
        $sayaNumberNepali = '';
        $rupeeValueNepali = '';
        $hajarNumber = '';
        $LakhNumber = '';
        $CroreNumber = '';
        $ArabNumber = '';
        $KharabNumber = '';
        $paisaNepali = $this->engNumbersToEnlish(substr($formatted_paise, 1, 3));

        foreach (array_reverse($hajarSeperate) as $key => $hajar) {
            if ($key == 0) {
                $sayaNumber = substr($hajar, 0, -2);
                $sayaNumberNepali = $this->engNumbersToEnlish($sayaNumber);
                //  var_dump($sayaNumberNepali);die;
                $rupeeValue = substr($hajar, 1, 2);
                $rupeeValueNepali = $this->engNumbersToEnlish($rupeeValue);
                //  var_dump($rupeeValueNepali);die;
            } else if ($key == 1) {

                $hajarNumber = $this->engNumbersToEnlish($hajar);
                //var_dump($hajarNumber);die;
            } else if ($key == 2) {
                $LakhNumber = $this->engNumbersToEnlish($hajar);
            } else if ($key == 3) {
                $CroreNumber = $this->engNumbersToEnlish($hajar);
            } else if ($key == 4) {
                $ArabNumber = $this->engNumbersToEnlish($hajar);
            } else if ($key == 5) {
                $KharabNumber = $this->engNumbersToEnlish($hajar);
            }
        }

        if ($KharabNumber) {
            $nepaliAkxar .= $KharabNumber . 'खरब ';
        }
        if ($ArabNumber) {
            $nepaliAkxar .= $ArabNumber . ' अरब ';
        }
        if ($CroreNumber) {
            $nepaliAkxar .= $CroreNumber . ' करोड ';
        }
        if ($LakhNumber) {
            $nepaliAkxar .= $LakhNumber . ' लाख ';
        }
        if ($hajarNumber) {
            $nepaliAkxar .= $hajarNumber . ' हजार ';
        }
        if (!empty($sayaNumberNepali)) {
            $nepaliAkxar .= $sayaNumberNepali . ' सय ';
        }
        if ($rupeeValueNepali) {
            $nepaliAkxar .= $rupeeValueNepali . ' रुपैयाँ ';
        }
        if ($paisaNepali) {
            $nepaliAkxar .= $paisaNepali . 'पैसा';
        }
        return $nepaliAkxar.' मात्र ' ;
    }

    function get_nep($eng_str) {
        $replace = array("१", "२", "३", "४", "५", "६", "७", "८", "९", "०");
        $find = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $nep_str = str_replace($find, $replace, $eng_str);
        return $nep_str;
    }

    private function engNumbersToEnlish($number) {

        if ($number == 99) {
            return "उन्नान्सय";
        } else if ($number == 1) {
            return "एक";
        } else if ($number == 2) {
            return "दुई";
        } else if ($number == 3) {
            return "तिन";
        } else if ($number == 4) {
            return "चार";
        } else if ($number == 5) {
            return "पाँच";
        } else if ($number == 6) {
            return "छ";
        } else if ($number == 7) {
            return "सात";
        } else if ($number == 8) {
            return "आठ";
        } else if ($number == 9) {
            return "नौ";
        } else if ($number == 10) {
            return "दश";
        } else if ($number == 11) {
            return "एघार";
        } else if ($number == 12) {
            return "बाह्र";
        } else if ($number == 13) {
            return "तेह्र";
        } else if ($number == 14) {
            return "चौध";
        } else if ($number == 15) {
            return "पन्ध्र";
        } else if ($number == 16) {
            return "सोह्र";
        } else if ($number == 17) {
            return "सत्र";
        } else if ($number == 18) {
            return "अठार";
        } else if ($number == 19) {
            return "उन्नाइस";
        } else if ($number == 20) {
            return "बिस";
        } else if ($number == 21) {
            return "एक्काइस";
        } else if ($number == 22) {
            return "बाइस";
        } else if ($number == 23) {
            return "तेइस";
        } else if ($number == 24) {
            return "चौबिस";
        } else if ($number == 25) {
            return "पच्चीस";
        } else if ($number == 26) {
            return "छब्बीस";
        } else if ($number == 27) {
            return "सत्ताइस";
        } else if ($number == 28) {
            return "अठ्ठाइस";
        } else if ($number == 29) {
            return "उनन्तीस";
        } else if ($number == 30) {
            return "तीस";
        } else if ($number == 31) {
            return "एकतीस";
        } else if ($number == 32) {
            return "बत्तीस";
        } else if ($number == 33) {
            return "तेत्तीस";
        } else if ($number == 34) {
            return "चौतिस";
        } else if ($number == 35) {
            return "पैतिस";
        } else if ($number == 36) {
            return "छत्तिस";
        } else if ($number == 37) {
            return "सर्तिस";
        } else if ($number == 38) {
            return "अर्तिस";
        } else if ($number == 39) {
            return "उन्चालिस";
        } else if ($number == 40) {
            return "चालिस";
        } else if ($number == 41) {
            return "एकचालीस";
        } else if ($number == 42) {
            return "बयालीस";
        } else if ($number == 43) {
            return "त्रिचालिस";
        } else if ($number == 44) {
            return "चवालिस";
        } else if ($number == 45) {
            return "पैतालिस";
        } else if ($number == 46) {
            return "छयालीस";
        } else if ($number == 47) {
            return "सर्चालिस";
        } else if ($number == 48) {
            return "अर्चालिस";
        } else if ($number == 49) {
            return "उन्पचास";
        } else if ($number == 50) {
            return "पचास";
        } else if ($number == 51) {
            return "एकाउन्न";
        } else if ($number == 52) {
            return "बाउन्न";
        } else if ($number == 53) {
            return "त्रिपन्न";
        } else if ($number == 54) {
            return "चउन्न";
        } else if ($number == 55) {
            return "पचपन्न";
        } else if ($number == 56) {
            return "छेपन्न";
        } else if ($number == 57) {
            return "सन्ताउन्न";
        } else if ($number == 58) {
            return "अन्ठाउन्न";
        } else if ($number == 59) {
            return "उन्साठी";
        } else if ($number == 60) {
            return "साठी";
        } else if ($number == 61) {
            return "एकसठ्ठी";
        } else if ($number == 62) {
            return "बैसठ्ठी";
        } else if ($number == 63) {
            return "त्रिसठ्ठी";
        } else if ($number == 64) {
            return "चौसठ्ठी";
        } else if ($number == 65) {
            return "पैसठ्ठी";
        } else if ($number == 66) {
            return "छैसठ्ठी";
        } else if ($number == 67) {
            return "सरसठ्ठी";
        } else if ($number == 68) {
            return "अर्सठ्ठी";
        } else if ($number == 69) {
            return "उन्सत्तरी";
        } else if ($number == 70) {
            return "सत्तरी";
        } else if ($number == 71) {
            return "एकहत्तर";
        } else if ($number == 72) {
            return "बहत्तर";
        } else if ($number == 73) {
            return "त्रिहत्तर";
        } else if ($number == 74) {
            return "चौहत्तर";
        } else if ($number == 75) {
            return "पचहत्तर";
        } else if ($number == 76) {
            return "छैहेत्तर";
        } else if ($number == 77) {
            return "सतहत्तर";
        } else if ($number == 78) {
            return "अठहत्तर";
        } else if ($number == 79) {
            return "उनासी";
        } else if ($number == 80) {
            return "असि";
        } else if ($number == 81) {
            return "एकासी";
        } else if ($number == 82) {
            return "बयासी";
        } else if ($number == 83) {
            return "त्रियासी";
        } else if ($number == 84) {
            return "चौरासी";
        } else if ($number == 85) {
            return "पचासी";
        } else if ($number == 86) {
            return "छेयासी";
        } else if ($number == 87) {
            return "सतासी";
        } else if ($number == 88) {
            return "अठासी";
        } else if ($number == 89) {
            return "उनानब्बे";
        } else if ($number == 90) {
            return "नब्बे";
        } else if ($number == 91) {
            return "एकानब्बे";
        } else if ($number == 92) {
            return "बयानब्बे";
        } else if ($number == 93) {
            return "त्रियानब्बे";
        } else if ($number == 94) {
            return "चौरानब्बे";
        } else if ($number == 95) {
            return "पन्चानब्बे";
        } else if ($number == 96) {
            return "छेयानाब्बे";
        } else if ($number == 97) {
            return "सन्तानब्बे";
        } else if ($number == 98) {
            return "अन्ठानब्बे";
        }
    }

}
