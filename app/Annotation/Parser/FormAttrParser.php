<?php declare(strict_types=1);


namespace App\Annotation\Parser;


use App\Annotation\Register\FormUpgradeRegister;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use App\Annotation\Mapping\FormAttr;

/**
 * Class FormAttrParser
 * @package App\Annotation\Parser
 * @since 2.0
 * @AnnotationParser(annotation=FormAttr::class)
 */
class FormAttrParser extends Parser {


    /**
     * @param int $type
     * @param FormAttr $annotationObject
     * @return array
     * @throws \App\Exception\FormUpgradeException
     * @throws \ReflectionException
     */
    public function parse(int $type, $annotationObject): array {
        if($type === self::TYPE_PROPERTY){
            FormUpgradeRegister::registerFormAttr($this->className, $this->propertyName, $annotationObject, $annotationObject->getAttr());
        }
        return [];
    }
}
