<div class="h-layout">
    <h1>
        List of all our <span class="green-text">cooks</span>
    </h1>
    <ul class="cookGrid">
    <?php
    foreach ($cooks as $item) {
    ?>
        <li class="cookGrid__item" >
            <a href="/cook/detail/<?= $item->id ?>" class="cookGrid__item__image">
            <img src="/resources<?= $item->{'picture-url'} !== null ? $item->{'picture-url'} : '/images/cooks/placeholder.jpeg' ?>"/>
            </a>
            <div class="cookGrid__item__content">
                <a href="/cook/detail/<?= $item->id ?>" class="cookGrid__item__content__title">
                    <?= $item->firstname . ' ' . $item->lastname;?> 
                </a> 
                <q class="cookGrid__item__content__quote">
                    <?= $item->quote; ?>
                </q>
            </div>
        </li>    
    <?php
    }
    ?>
        <li class="cookGrid__item" >
            <a href="/cook/create" class="cookGrid__item__image">
                <img src="/resources/images/cooks/placeholder.jpeg"/>
            </a>
            <div class="cookGrid__item__content">
                <a href="/cook/create" class="cookGrid__item__content__title">
                    Your name Here
                </a> 
                <q class="cookGrid__item__content__quote">
                    Become a cook of your own and add your recipes
                </q>
            </div>
        </li>   
    </ul>
</div>
