<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\Aliyun;

use XuTL\Payment\Contracts\ChargeInterface;
use XuTL\Payment\Contracts\RefundInterface;

/**
 * Class Payment
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
abstract class Payment
{

    abstract public function charge(ChargeInterface $charge);

    abstract public function refund(RefundInterface $refund);

    abstract public function query();

    abstract public function cancel();

    abstract public function close();
}