<?php declare(strict_types=1);


namespace App\Annotation\Parser;


use App\Annotation\Register\FormUpgradeRegister;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use App\Annotation\Mapping\FormText;

/**
 * 文本框解析
 * Class FormTextParser
 * @package App\Annotation\Parser
 * @AnnotationParser(annotation=FormText::class)
 */
class FormTextParser extends Parser {

    /**
     * @param int $type
     * @param FormText $annotationObject
     * @return array
     * @throws \App\Exception\FormUpgradeException
     * @throws \ReflectionException
     */
    public function parse(int $type, $annotationObject): array {
        if($type !== self::TYPE_PROPERTY){
            return [];
        }
        FormUpgradeRegister::registerFormItem($this->className, $this->propertyName, $annotationObject, ['type' => $annotationObject->getType()]);

        return [];
    }
}
