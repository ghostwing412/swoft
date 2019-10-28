<?php


namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class FormVerify
 * @package App\Annotation\Mapping
 * @Target("PROPERTY")
 * @Annotation
 * @Attributes({
 *     @Attribute("type",type="string"),
 *     @Attribute("msg",type="string")
 * })
 */
class FormVerify {
    /**
     * @var string
     */
    private $verify = "";

    /**
     * @var string
     */
    private $msg = "";

    public function __construct(array $values) {
        if(isset($values['type'])){
            $this->type = $values['type'];
        }
        if(isset($values['msg'])){
            $this->msg = $values['msg'];
        }
    }

    /**
     * @return string
     */
    public function getMsg(): string {
        return $this->msg;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }
}
