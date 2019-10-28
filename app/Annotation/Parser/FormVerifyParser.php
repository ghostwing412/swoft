<?php


namespace App\Annotation\Parser;


use App\Annotation\Mapping\FormVerify;
use App\Annotation\Register\FormUpgradeRegister;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;

/**
 * Class FormVerifyParser
 * @package App\Annotation\Parser
 * @AnnotationParser(annotation=FormVerify::class)
 */
class FormVerifyParser extends Parser {


    /**
     * @param int $type
     * @param FormVerify $annotationObject
     * @return array
     * @throws \App\Exception\FormUpgradeException
     * @throws \ReflectionException
     */
    public function parse(int $type, $annotationObject): array {
        if($type === self::TYPE_PROPERTY){
            FormUpgradeRegister::registerFormItem($this->className, $this->propertyName, $annotationObject);
        }
        return [];
    }
}
