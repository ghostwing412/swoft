<?php declare(strict_types=1);


namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class FormBase
 * @package App\Annotation\Mapping
 * @Target("PROPERTY")
 * @Annotation
 * @Attributes({
 *     @Attribute("name",type="string"),
 *     @Attribute("title",type="string"),
 *     @Attribute("isInline",type="bool")
 * })
 */
class FormBase {
    /**
     * @var string
     */
    private $name ='';
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var bool
     */
    private $isInline = false;

    /**
     * FormBase constructor.
     * @param array $values
     */
    public function __construct(array $values) {
        if(isset($values['name'])){
            $this->name = $values['name'];
        }
        if(isset($values['title'])){
            $this->title = $values['title'];
        }
        if(isset($values['isInline'])){
            $this->isInline = $values['isInline'];
        }
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isInline(): bool {
        return $this->isInline;
    }
}
