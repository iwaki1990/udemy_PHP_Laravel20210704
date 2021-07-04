<?php

//class,object
//class データと関数をセットで持っている変数
//プロパティ：データ
//メソッド：処理のかたまり、関数

class Dog
{
    public $name = "Hachi";

    public function bark(){
        echo "ワン";
    }
}

$a = new Dog();//オブジェクトを生成する

//$a->bark();

echo $a->name;
echo"\n";