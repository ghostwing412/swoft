<?php declare(strict_types=1);


namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class FormText
 * @package App\Annotation\Mapping
 * @Target("PROPERTY")
 * @Annotation
 * @Attributes()
 */
class FormText {
    /**
     * @var array
     */
    private $type = 'text';


    /**
     * @return array
     */
    public function getType(): array {
        return $this->type;
    }
}
