<?php


namespace App\Annotation\Register;

use App\Exception\FormUpgradeException;
use phpDocumentor\Reflection\Types\Mixed_;

/**
 * Class FormUpgrade
 * @package App\Annotation\Register
 * @since 2.0
 */
class FormUpgradeRegister {
    /**
     * 控件关系属性
     *
     *
     * @var array
     * @example [
     *      className => [
     *          propertyName => [
     *              type => ''
     *              ,name => ''
     *              ,title => ''
     *              ,attr => [
     *                  placeholder => ''
     *                  ,...
     *              ]
     *              ,lay => [
     *                  filter => ''
     *                  ,...
     *              ]
     *          ]
     *          ,propertyName => [
     *              type => ''
     *              ,name => ''
     *              ,title => ''
     *              ,attr => [
     *                  placeholder => ''
     *                  ,...
     *              ]
     *              ,lay => [
     *                  filter => ''
     *                  ,...
     *              ]
     *          ]
     *      ]
     * ]
     */
    static $form_item = [];
    /**
     * @var array
     * @example [
     *      className => [
     *          propertyName
     *          ,[
     *              propertyName,propertyName
     *          ]
     *      ]
     * ]
     */
    static $item_relation = [];

    /**
     * @var array
     */
    static $form_class = [];


    /**
     * @param string $className
     * @param string $annotationClassName
     */
    public static function registerFormClass(string $className, string $annotationClassName): void {
        self::$form_item[$annotationClassName] = [];
        self::$item_relation[$annotationClassName] = [];
        self::$form_class[$className] = $annotationClassName;
    }

    /**
     * @param string $className
     * @param string $propertyName
     * @param $objAnnotation
     *
     * @throws \ReflectionException
     * @throws FormUpgradeException
     */
    public static function registerFormItem(string $className, string $propertyName, $objAnnotation, array $setting, $field = null): void {
        $beanName = self::getBeanName($className, $objAnnotation);
        if (is_null($field)) {
            self::mergeSetting($beanName, $propertyName, $setting);
        } else {
            self::mergeSettingByField($beanName, $propertyName, $field, $setting);
        }
    }

    /**
     * @param string $className
     * @param string $propertyName
     * @param $objAnnotation
     * @param array $setting
     * @throws FormUpgradeException
     * @throws \ReflectionException
     */
    public static function registerFormAttr(string $className, string $propertyName, $objAnnotation, array $setting) {
        self::registerFormItem($className, $propertyName, $objAnnotation, $setting, 'attr');
    }

    /**
     * @param string $className
     * @param string $propertyName
     * @param $objAnnotation
     * @param array $setting
     * @throws FormUpgradeException
     * @throws \ReflectionException
     */
    public static function registerFormLay(string $className, string $propertyName, $objAnnotation, array $setting) {
        self::registerFormItem($className, $propertyName, $objAnnotation, $setting, 'lay');
    }

    /**
     * @param string $beanName
     * @param string $propertyName
     * @param array $setting
     */
    private static function mergeSetting(string $beanName, string $propertyName, array $setting) {
        $old_setting = !empty(self::$form_item[$beanName][$propertyName]) ? self::$form_item[$beanName][$propertyName] : [];

        $setting = array_merge($old_setting, $setting);
        self::$form_item[$beanName][$propertyName] = $setting;//$properties;
    }

    /**
     * @param string $beanName
     * @param string $propertyName
     * @param string $field
     * @param array $setting
     */
    private static function mergeSettingByField(string $beanName, string $propertyName, string $field, array $setting) {
        $old_setting = !empty(self::$form_item[$beanName][$propertyName][$field]) ? self::$form_item[$beanName][$propertyName][$field] : [];

        $setting = array_merge($old_setting, $setting);
        self::$form_item[$beanName][$propertyName][$field] = $setting;//$properties;
    }


    /**
     * @param string $className
     * @param $objAnnotation
     * @throws FormUpgradeException
     *
     * return string
     */
    private static function getBeanName(string $className, $objAnnotation): string {
        if (!isset(self::$form_class[$className])) {
            throw new FormUpgradeException(sprintf('%s must be define class `@FormUpgrade()`', get_class($objAnnotation)));
        }
        return self::$form_class[$className];
    }


    /**
     * @param string $className
     * @param string $propertyName
     * @param bool $isInline
     */
    public static function registerItemRelation(string $className, string $propertyName, bool $isInline): void {
        $beanName = self::$form_class[$className];
        $relation = self::$item_relation[$beanName];
        $lastItem = end($relation);
        if (is_array($lastItem)) {
            if ($isInline) {
                $lastItem[] = $propertyName;
                $lastIndex = count($relation) - 1;
                $relation[$lastIndex] = $lastItem;
            } else {
                $relation[] = $propertyName;
            }
        } else {
            if ($isInline) {
                $relation[] = [$propertyName];
            } else {
                $relation[] = $propertyName;
            }
        }
        self::$item_relation[$beanName] = $relation;
    }
}
