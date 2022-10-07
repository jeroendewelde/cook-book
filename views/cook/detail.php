<div class="h-layout">
    <div class="cookDetail">
        <div class="cookDetail__top">
            <div class="cookDetail__top__image">
                <img src="/resources<?= $cook->{'picture-url'} !== null ? $cook->{'picture-url'} : '/images/cooks/placeholder.jpeg' ?>"/>
            </div>
            
            <div class="cookDetail__top__title">
                <h1><?= $cook->firstname . ' ' . $cook->lastname;?> </h1>
                <q><?= $cook->quote; ?></q>        
            </div>
        </div>        

        <div class="cookDetail__bottom">
            <p>
                <?= $cook->bio; ?>
            </p>
        </div>
    </div>
</div>