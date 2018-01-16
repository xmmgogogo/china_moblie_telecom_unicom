<?php

/**
 * 传入手机号，匹配到当前手机号运营商 - 支持虚拟运营商
 * 更新时间 - 2018-1-8 官网
 * @param $phone_no
 * @return int|string
 */
function getPhoneNoSmsService($phone_no) {
    $hao_ma = $xu_ni_hao = [];

    // 【常规运营商 - 号码段】
    // 移动
    $hao_ma['yi_dong'] = ['134','135','136','137','138','139','147','150','151','152','157','158','159','178','182','183','184','187','188'];

    // 联通
    $hao_ma['lian_tong'] = ['186', '185', '156', '131', '130', '155', '132', '176'];

    // 电信
    $hao_ma['dian_xin'] = ['189', '181', '180', '153', '133', '177', '173', '199'];

    // 【虚拟运营商 - 号码段】
    // 移动
    $xu_ni_hao['yi_dong'] = ['1703', '1705','1706'];

    // 联通
    $xu_ni_hao['lian_tong'] = ['1704', '1707', '1708', '1709', '1710', '1711', '1712', '1713', '1714', '1715', '1716', '1717', '1718', '1719'];

    // 电信
    $xu_ni_hao['dian_xin'] = ['1700', '1701','1702'];

    // 传入手机号，然后根据号码段，匹配到当前手机号，属于哪个运营商。
    $sub_phone_3 = substr($phone_no, 0, 3);
    $sub_phone_4 = substr($phone_no, 0, 4);

    // 运营商类型
    $yys_type = '';
    foreach ($hao_ma as $type => $lineInfo) {
        if(in_array($sub_phone_3, $lineInfo)) {
            $yys_type = $type;
            break;
        }
    }

    foreach ($xu_ni_hao as $type => $lineInfo) {
        if(in_array($sub_phone_4, $lineInfo)) {
            $yys_type = $type;
            break;
        }
    }

    return $yys_type;
}


// 测试
echo getPhoneNoSmsService('13524316599'); // 移动
echo getPhoneNoSmsService('18024316599'); // 电信
