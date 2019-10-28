<?php declare(strict_types=1);


namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class FormAttr
 * @package App\Annotation\Mapping
 * @Annotation
 * @Target("PROPERTY")
 * @Attributes({
 *      @Attribute("attr", type="array")
 * })
 */
class FormAttr {
    /**
     * @var array
     */
    private $attr = [];

    public function __construct(array $values) {
        if(isset($values['attr'])){
            $this->attr = (array) $values['attr'];
        }
    }

    /**
     * @return array
     */
    public function getAttr(): array {
        return $this->attr;
    }
}
