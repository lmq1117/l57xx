<?php
/**
 * 工具类，使用该类来实现自动依赖注入。
 * Created by PhpStorm.
 * User: limq
 * Date: 2018/9/27
 * Time: 9:09
 * https://blog.csdn.net/qq_20678155/article/details/70158374
 */

class Ioc
{
    /**
     * 获得类的对象实例
     * @param $className
     * @return object
     * @throws ReflectionException
     */
    public static function getInstance($className)
    {
        $paramArr = self::getMethodParams($className);
        return (new ReflectionClass($className))->newInstanceArgs($paramArr);
    }

    /**
     * 执行类的方法
     * @param $className
     * @param $metchodName
     * @param array $params
     * @return mixed
     * @throws ReflectionException
     */
    public static function make($className,$methodName,$params = [])
    {
        $instance = self::getInstance($className);
        $paramArr = self::getMethodParams($className,$methodName);
        //在调用函数的时候，使用 ... 运算符， 将 数组 和 可遍历 对象展开为函数参数。
        return $instance->{$methodName}(...array_merge($paramArr,$params));
    }

    /**
     * 获得类的方法参数(只获取有类型的参数)
     * @param $className
     * @param string $methodName
     * @return array
     * @throws ReflectionException
     */
    protected static function getMethodParams($className, $methodName = '__construct')
    {
        $class = new ReflectionClass($className);
        $paramArr = [];
        if($class->hasMethod($methodName))
        {
            $construct = $class->getMethod($methodName);
            $params = $construct->getParameters();

            if(count($params) > 0)
            {
                foreach ($params as $key => $param)
                {
                    if($paramClass = $param->getClass())
                    {
                        $paramClassName = $paramClass->getName();

                        $args = self::getMethodParams($paramClassName);
                        $paramArr[] = (new ReflectionClass($paramClass->getName()))->newInstanceArgs($args);
                    }
                }
            }
        }
        return $paramArr;

    }
}


class A {
    protected $bObj;

    public function __construct(C $c)
    {
        $this->cObj = $c;
    }

    public function aa()
    {
        echo 'this A->aa方法<br>';
    }

    public function callCcAtA()
    {
        echo 'callCcAtA----';
        $this->cObj->cc();
    }
}

class C
{
    public function cc()
    {
        echo 'this is C->cc方法<br>';
    }
}

class B
{
    protected $aObj;

    //测试构造函数依赖注入
    public function __construct(A $a)
    {
       $this->aObj = $a;
    }

    public function bb(C $c,$b)
    {
        echo 'Bbb---';
        $c->cc();
        echo 'params '. $b;
        //echo '<br>';
    }

    public function bbb()
    {
        echo 'Bbbb----';
        $this->aObj->callCcAtA();
    }
}

//$bObj = Ioc::getInstance('B');
//$bObj->bbb();
//var_dump($bObj);

Ioc::make('B','bb',['xxxxxxx']);
