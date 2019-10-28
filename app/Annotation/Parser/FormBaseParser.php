<?php declare(strict_types=1);


namespace App\Annotation\Parser;


use App\Annotation\Register\FormUpgradeRegister;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use App\Annotation\Mapping\FormBase;

/**
 * 公共控件属性
 * Class FormBaseParser
 * @package App\Annotation\Parser
 * @since 2.0
 * @AnnotationParser(annotation=FormBase::class)
 */
class FormBaseParser extends Parser {


    /**
     * @param int $type
     * @param FormBase $annotationObject
     * @return array
     * @throws \App\Exception\FormUpgradeException
     * @throws \ReflectionException
     */
    public function parse(int $type, $annotationObject): array {
        if($type !== self::TYPE_PROPERTY){
            return [];
        }
        $setting = [
            'name' => $annotationObject->getName()
            ,'title' => $annotationObject->getTitle()
        ];
        $rc = new \ReflectionClass($this->className);
        $property = $rc->getProperty($this->propertyName);
        $default = $property->getValue(new $this->className);
        if($default){
            $setting['value'] = $default;
        }
        FormUpgradeRegister::registerFormItem($this->className, $this->propertyName, $annotationObject, $setting);
        FormUpgradeRegister::registerItemRelation($this->className, $this->propertyName, $annotationObject->isInline());
        return [];
    }
}
