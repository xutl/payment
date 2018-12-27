<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\Payment;

use Closure;
use InvalidArgumentException;
use XuTL\Payment\Contracts\GatewayInterface;

/**
 * Class PaymentManage
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class PaymentManage
{
    /**
     * The array of resolved services drivers.
     *
     * @var GatewayInterface[]
     */
    protected $gateways = [];

    public $http = [];

    /**
     * PaymentManage constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            foreach ($config as $name => $value) {
                $this->$name = $value;
            }
        }
    }

    /**
     * 设置支付网关实例
     *
     * @param  string $id
     * @param  mixed $gateway
     * @return $this
     */
    public function set($id, $gateway)
    {
        $this->gateways[$id] = $gateway;
        return $this;
    }

    /**
     * 获取支付渠道实例
     *
     * @param  string $id
     * @return GatewayInterface
     * @throws \ReflectionException
     */
    public function get($id)
    {
        if (!array_key_exists($id, $this->gateways)) {
            throw new InvalidParamException("Unknown gateway '{$id}'.");
        }
        if (!is_object($this->gateways[$id])) {
            $this->gateways[$id] = $this->createGateway($id, $this->gateways[$id]);
        }
        return $this->gateways[$id];
    }

    /**
     * 创建网关实例
     * @param string $class
     * @param array $params
     * @return object|GatewayInterface
     * @throws \ReflectionException
     */
    public function createGateway($class, array $params = [])
    {
        $class = ltrim($class, '\\');
        return (new \ReflectionClass($class))->newInstanceArgs($params);
    }
}