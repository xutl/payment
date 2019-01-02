<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\Payment\Contracts;


/**
 * Interface ChannelInterface
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
interface ChannelInterface
{
    /**
     * 收款
     * @param ChargeInterface $charge
     * @return ChargeInterface
     */
    public function charge(ChargeInterface $charge);

    /**
     * 退款
     * @param RefundInterface $refund
     * @return RefundInterface
     */
    public function refund(RefundInterface $refund);

    /**
     * 关闭支付
     * @param ChargeInterface $charge
     * @return ChargeInterface
     */
    public function close(ChargeInterface $charge);

    /**
     * 查询订单
     * @param ChargeInterface $charge
     * @return ChargeInterface
     */
    public function query(ChargeInterface $charge);

}