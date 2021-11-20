<?php

namespace Kuusamo\Plugin\Smtp;

use Kuusamo\Plugin\Smtp\Exception\ConfigException;
use ArrayAccess;

class SmtpConfig implements ArrayAccess
{
    /**
     * A list of valid options and whether they are mandatory.
     *
     * @var array
     */
    private $options = [
        'senderAddress' => true,
        'senderName' => true,
        'senderReplyAddress' => false,
        'host' => true,
        'port' => true,
        'username' => true,
        'password' => true
    ];

    /**
     * Values supplied.
     *
     * @var array
     */
    private $values;

    /**
     * Constructor. Pass in a list of options.
     *
     * @param array $config Config options.
     */
    public function __construct(array $config = [])
    {
        foreach ($config as $key => $val) {
            if (!array_key_exists($key, $this->options)) {
                throw new ConfigException(sprintf('%s is not a valid option', $key));
            }
        }

        foreach ($this->options as $key => $mandatory) {
            if ($mandatory) {
                if (!array_key_exists($key, $config)) {
                    throw new ConfigException(sprintf('%s is mandatory', $key));
                }
            }
        }

        $this->values = $config;
    }

    public function offsetExists($offset)
    {
        return isset($this->values[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->values[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new ConfigException('Cannot set options');
    }

    public function offsetUnset($offset)
    {
        throw new ConfigException('Cannot delete options');
    }
}
