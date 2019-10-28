<?php declare(strict_types=1);


namespace App\Annotation\Parser;


use App\Annotation\Register\FormUpgradeRegister;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use App\Annotation\Mapping\FormUpgrade;

/**
 * Class FormUpgradeModelParser
 * @package App\Annotation\Parser
 * @since 2.0
 * @AnnotationParser(annotation=FormUpgrade::class)
 */
class FormUpgradeParser extends Parser {


    /**
     * @param int $type
     * @param object $annotationObject
     * @return array
     * @throws \App\Exception\FormUpgradeException
     * @throws \ReflectionException
     */
    public function parse(int $type, $annotationObject): array {

        $beanName = $this->className;
        $annotationName = $annotationObject->getName();
        if(!empty($annotationName)){
            $beanName = $annotationName;
        }
        FormUpgradeRegister::registerFormClass($this->className, $beanName);
        return [];
    }
}
