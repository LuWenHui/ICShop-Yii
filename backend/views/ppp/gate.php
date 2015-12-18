hallo

<?php

$js = <<<'JS'
uiLoad.load(jp_config['pingpp-pc']).then(function() {
    $.post('/ppp/pay', function(charge) {
        console.log(charge);
        // throw Error('aaa');
        pingppPc.createPayment(charge, function(result, err){
            // 处理错误信息
            console.log(result);
            console.log(err);
        });
    });
});
JS;
$this->registerJs($js);

?>
