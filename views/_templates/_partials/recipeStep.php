<li class="recipeStep">
    <div class="recipeStep__image">
        <img src="/resources/images<?=$step['image-url'] ?>" alt="">
    </div>

    <div class="recipeStep__content">
        <p class="recipeStep__content__title">
            <?= $step['step-number'] ?>. <?=$step['title'] ?>
        </p>
        <p class="recipeStep__content__body">
            <?= $step['body'] ?>
        </p>
    </div>
</li>