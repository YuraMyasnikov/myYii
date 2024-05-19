<?php
/**
 * @var \app\widgets\ReviewWidget $review
 */
?>
<div class="test">
    <div class="wrapper">
        <div class="wrapper_head">
            <div class="wrapper_head_person">
                <p class="name"><?php echo $review->user->name; ?></p>
            </div>
            <div class="wrapper_head_infa"><?php echo $review->reviewsProduct->brand->name ?> <?php echo $review->reviewsProduct->name ?> <?php echo $review->reviewsProduct->mark ?> какая то инфа</div>
        </div>
        <div class="wrapper_text">
            <div class="wrap">
                <div class="like">
                    <span class="status">Преимущества</span>: <?php echo $review->like ?>
                </div>
                <div class="dislike">
                    <span class="status">Недостатки</span>: <?php echo $review->dislike ?>
                </div>
                <div class="comment">
                    <span class="status">Комментарий</span>: <?php echo $review->text ?>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .test{
        display: flex;
        align-content: center;
        flex-direction: column;
        position: relative;
        width: 100%;

    }
    .wrapper{
        /*background: rgba(0, 0, 0, 0.32);*/
        border: 2px solid rgba(0, 0, 0, 0.54);
        border-radius: 5px;
        width: auto;
        height: 400px;
        margin: 10px;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        flex-wrap: nowrap;
        align-items: stretch;
        position:relative;

    }
    .wrapper_head{
       /* background: rgba(234, 40, 40, 0.56);*/
        height:30%;
        width: 100%;
        position: absolute;
        display: flex;
    }
    .wrapper_head_person{
       /* background: rgba(76, 140, 79, 0.39);*/
        width: 25%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .wrapper_head_infa{
       /* background: rgba(188, 255, 66, 0.61);*/
        width: 75%;
    }
    .wrapper_text{
       /* background: rgba(83, 54, 168, 0.66);*/
        height: 70%;
        width: 100%;
        position: absolute;
        transform: translate(0,43%);
    }
    .wrapper_text .wrap{
        margin: 10px;
    }
    .wrapper_text .wrap .status{
        margin-top: 20px;
    }
</style>

