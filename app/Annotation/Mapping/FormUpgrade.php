<?php declare(strict_types=1);


namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class FormUpgradeModel
 * @since 2.0
 * @Annotation
 * @Target("CLASS")
 * @Attributes({
 *     @Attribute("name", type="string")
 * })
 */
class FormUpgrade {

    /**
     * @var string
     */
    private $name = '';

    /**
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
    }

    /**
     * @param string $name
     * @return string
     */
    public function setName(string $name): string{
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
