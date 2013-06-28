<pre><?php

header('Content-Type: text/html; charset=utf-8');



function __autoload($class_name) {
    require_once $class_name . '.php';
}


/**
 *
 * @author eric okorie
 * @uses Shijie Nihao (hello world) -- hello_world.php
 * 
 * @link http://pzphp.googlecode.com
 *
 * @todo add pznumbers_ demos
 * @todo add pzkelvin_ demos
 * @todo add pzcedict_ demos .. DONE
 *
 */

echo "<pre><font size=6>";


$pzt = new HanziTools();

// prints 'hello world' in Chinese
echo $hello_world = "世界你好";

echo "<p>";

// prints 'hello world' in hanyu pinyin -- shi4 jie4 ni3 hao3 
echo $got_pinyin = $pzt->pzhanzi_hanzi_to_pinyin($hello_world);

echo "<p>";
echo $pzt->getShortPinyin('世界你好');

echo "<p>";

// prints 'hello world' in hanyu pinyin with tone marks -- shì jiè nĭ hăo 
echo $got_tonemarks = $pzt->pzpinyin_tonedisplay_convert_to_mark($got_pinyin);

echo "<p>";

// prints 'hello world' in zhuyin fuhao -- ㄕˋ ㄐㄧㄝˋ ㄋㄧˇ ㄏㄠˇ 
echo $got_zhuyin = $pzt->pzpinyin_pinyintype_hanyu_pinyin_to_zhuyin($got_pinyin);

echo "<p>";

// prints 'hello world' in tongyong pinyin -- shih4 jie4 ni3 hao3 
echo $got_tongyong = $pzt->pzpinyin_pinyintype_hanyu_pinyin_to_tongyong_pinyin($got_pinyin);


echo "<p>";

// prints 'hello world' in mandarin yale -- shr4 jye4 ni3 hau3
echo $got_zhuyin = $pzt->pzpinyin_pinyintype_hanyu_pinyin_to_yale($got_pinyin);


echo "<p>";

// prints 'happy to meet you' in Traditional Chinese -- 很高興認識你
echo $happy_to_meet_you = "很高興認識你";

echo "<p>";

// prints 'happy to meet you' in Simplified Chinese -- 很高兴认识你
echo $pzt->pzhanzi_traditional_to_simplified($happy_to_meet_you);

echo "<p>";




# sample line from CEDICT file
$line = "安頓 安顿 [an1 dun4] /find a place for/help settle down/arrange for/undisturbed/peaceful/";

print_r($pzt->pzcedict_entry_getvalues($line, TRUE));








// positive and negative numbers
echo "<p>";echo $pzt->pznumbers_go("33"); // 三十三
echo "<p>";echo $pzt->pznumbers_go("-58"); // 負五十八
echo "<p>";echo $pzt->pznumbers_go("8888"); // 八千八百八十八
echo "<p>";echo $pzt->pznumbers_go("10538"); // 一萬〇五百三十八
echo "<p>";echo $pzt->pznumbers_go("-99291"); //  負九萬九千二百九十一


// big positive and negative numbers
echo "<p>";echo $pzt->pznumbers_go("100000000"); // 一億
echo "<p>";echo $pzt->pznumbers_go("888384848"); // 八億八千八百三十八萬四千八百四十八
echo "<p>";echo $pzt->pznumbers_go("8800980088"); // 八十八億九十八萬〇八十八


// long dates
echo "<p>";echo $pzt->pznumbers_go("August 8, 2008"); // 二〇〇八年八月八日
echo "<p>";echo $pzt->pznumbers_go("October 1, 1949"); // 一九四九年十月一日


// short dates dates MM/DD/YYYY or YYYY/MM/DD
echo "<p>";echo $pzt->pznumbers_go("2008/01/20"); // 二〇〇八年一月二十日
echo "<p>";echo $pzt->pznumbers_go("08-20-2005"); // 二〇〇五年八月二十日
echo "<p>";echo $pzt->pznumbers_go("08.20.2005"); // 二〇〇五年八月二十日


// just translating the year alone
echo "<p>";echo $pzt->pznumbers_go("year 2008"); // 二〇〇八年
echo "<p>";echo $pzt->pznumbers_go("year 1932"); // 一九三二年
echo "<p>";echo $pzt->pznumbers_go("year 2012"); // 二〇一二年


// money, money, money
echo "<p>";echo $pzt->pznumbers_go("$2.22"); // 兩塊兩毛兩分
echo "<p>";echo $pzt->pznumbers_go("$0.25"); // 兩毛五分
echo "<p>";echo $pzt->pznumbers_go("$888,888.32"); // 八十八萬八千八百八十八塊三毛兩分
echo "<p>";echo $pzt->pznumbers_go("$89985.62"); // 八萬九千九百八十五塊六毛兩分


// time, tick! tock!
echo "<p>";echo $pzt->pznumbers_go("5:09"); // 上午五點九分
echo "<p>";echo $pzt->pznumbers_go("8:32"); // 上午八點三十二分
echo "<p>";echo $pzt->pznumbers_go("13:59"); // 下午一點五十九分

// time with AM or PM 
echo "<p>";echo $pzt->pznumbers_go("2:09 am"); // 上午兩點九分 ** space is ok between time and am/pm
echo "<p>";echo $pzt->pznumbers_go("2:12pm"); // 下午兩點十二分



// fractions
echo "<p>";echo $pzt->pznumbers_go("3/5"); // 五分之三
echo "<p>";echo $pzt->pznumbers_go("8/9"); // 九分之八
echo "<p>";echo $pzt->pznumbers_go("-3/8"); // 負八分之三


// decimals
echo "<p>";echo $pzt->pznumbers_go("8.29"); // 八點二九
echo "<p>";echo $pzt->pznumbers_go("3.14"); // 三點一四
echo "<p>";echo $pzt->pznumbers_go("-9.68"); // 負九點六八


// percents
echo "<p>";echo $pzt->pznumbers_go("98%"); // 百分之九十八
echo "<p>";echo $pzt->pznumbers_go("32%"); // 百分之三十二
echo "<p>";echo $pzt->pznumbers_go("-3%"); // 負百分之三





?>