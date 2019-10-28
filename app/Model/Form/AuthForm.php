<?php declare(strict_types=1);


namespace App\Model\Form;

use App\Annotation\Mapping\FormAttr;
use App\Annotation\Mapping\FormBase;
use App\Annotation\Mapping\FormText;
use App\Annotation\Mapping\FormUpgrade;
use App\Annotation\Mapping\FormVerify;
use App\Annotation\Register\FormUpgradeRegister;

/**
 * Class AuthForm
 * @package App\Model\Form
 * @FormUpgrade(name="AuthForm")
 */
class AuthForm {
    /**
     * @FormBase(name="name",title="name",isInline=true)
     * @FormText(placeholder="输入姓名")
     * @FormAttr(attr={"title":"test"})
     * @FormVerify(type="required")
     * @var string
     */
    private $name = '123';

    /**
     * @FormBase(name="password",title="password",isInline=true)
     * @var string
     */
    private $password = '';


    public function test(){
//        var_dump(FormUpgradeRegister::$form_class);
//        var_dump(FormUpgradeRegister::$item_relation);
        var_dump(FormUpgradeRegister::$form_item);
    }
}
