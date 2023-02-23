<?php

namespace App\Constants;

class Common
{
    // 貸出ステータス
    const IS_CHECKED_OUT = '1';
    const IS_RETURNED = '2';

    // アカウントステータス
    const ALL_ACCOUNT = '0';
    const IS_ACTIVE = '1';
    const IS_NOT_ACTIVE = '2';

    // 著者ステータス
    const ALL_AUTHOR = '0';
    const IS_ACTIVE_AUTHOR = '1';
    const IS_NOT_ACTIVE_AUTHOR = '2';

    // 延滞ステータス
    const ALL_LENDING = '0';
    const HAS_OVERDUE = '1';
    const NOT_HAS_OVERDUE = '2';
}
