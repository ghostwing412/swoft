<?php


namespace AppTest\Unit;


//use App\Annotation\Register\FormUpgradeModelRegister;
use App\Annotation\Register\FormUpgradeRegister;
use App\Model\Form\AuthForm;
use PHPUnit\Framework\TestCase;

class topTest extends TestCase {

    public function testA(){
        $bean = new AuthForm();
//        $bean = \Swoft::getBean(AuthForm::class);
        $bean->test();
//        var_dump(FormUpgradeRegister::$form_item);
    }
}
