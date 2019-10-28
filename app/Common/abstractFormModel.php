<?php
/**
 * form表单便捷配置模型,兼容前端layui的form_upgrade.js插件
 * 自动获取实例属性，利用属性配置表单控件
 * 表单控件类型格式
 * 公共：[type=>'',name=>'',title=>'',value=>'']
 * 额外：[attr=>[],lay=>[]]
 * 文本框: [type=>'text', ]
 */

namespace App\Common;

/**
 * Trait FormModelTrait
 * @package App\Concern
 */
abstract class abstractFormModel {
    const TEXT = 'text';
    /**
     * @var array
     */
    protected $options;


    public function __construct() {
        $this->analyse();
    }

    private function analyse() {
        $vars = get_object_vars($this);
        unset($vars['options']);
        foreach ($vars as $var => $type) {
            if (!is_null($type)) {
                $func = '_analyse' . ucfirst($type);
            }
        }
    }

    private function _analyseText($name) {
        $name = ucfirst(strtolower($name));
        call_user_func_array([$this, "set{$name}Base"], [self::TEXT, $name,]);
    }

    private function setTitle(string $name, string $title=null) {
        $this->upProperty($name, 'title', $title);
    }

    private function setValue(string $name, string $value) {
        $this->upProperty($name, 'value', $value);
    }

    private function setAttr(string $name, array $value){
        $this->upPropertyInArray($name, 'attr', $value);
    }

    private function setLay(string $name, array $value){
        $this->upPropertyInArray($name, 'lay', $value);
    }

    private function upPropertyInArray(string $name, string $field, array $value){
        $temp = $this->$name;
        $temp[$field] = array_merge($temp[$field], $value);
        $this->$name = $temp;
    }

    private function upProperty(string $name, string $field, string $value) {
        $this->$name = array_merge($this->$name, [$field => $value]);
    }


}
