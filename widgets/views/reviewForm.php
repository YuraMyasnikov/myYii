<?php
    /**
     * @var \app\widgets\ReviewFormWidget $model;
     * @var \app\widgets\ReviewFormWidget $product;
     * @var \app\widgets\ReviewFormWidget $user;
     */
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
?>

<?php $form = ActiveForm::begin(['method' => 'POST', 'action' => ['review/index', 'id' => $product]]) ?>
    <?php echo $form->field($model, 'like')->textInput()?>
    <?php  echo $form->field($model, 'dislike')->textInput()?>
    <?php echo $form->field($model, 'text')->input('text')?>
    <?php echo $form->field($model, 'user_id')->hiddenInput(['value' => $user])->label(false)?>
    <?php echo $form->field($model, 'reviews_product')->hiddenInput(['value' => $product])->label(false)?>

    <?php echo Html::submitButton('отправить', ['class' => 'btn btn-outline-success btnAjax', 'id' => 'form']) ?>
    <?php echo Html::button('ajax', ['class' => 'btn btn-outline-success btnAjax', 'id' => 'form']) ?>
<?php ActiveForm::end() ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
       $('.btnAjax').on('click',function (){
           let like = $('input#reviews-like').val();
           let dislike = $('input#reviews-dislike').val();
           let text = $('input#reviews-text').val();
           let user_id = $('input#reviews-user_id').val();
           let product = $('input#reviews-reviews_product').val();
           console.log(like,dislike,text,user_id,product);
           $.ajax({
               method:"POST",
               url:'/review/index?id='+ product,
               data:{like:like, dislike:dislike, text:text, user_id:user_id, review_product:product}
           })

       })
    });
</script>