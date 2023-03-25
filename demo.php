<?php
class Todo
{
    public $arr;

    public function __construct(string $arr)
    {
        try {
            if (is_array($arr)) {
                $this->arr =  $arr;
                echo "true";
            } else {
                throw new Exception("wrong yar bro");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function display()
    {
        echo "Todo is Displayed";
    }
}



$t1 = new Todo("hello");
var_dump($t1->arr[0]);

?>
<pre>
    <?php
    // var_dump($t1);
    ?>
</pre>