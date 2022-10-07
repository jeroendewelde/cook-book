<div class="hero h-layout <?= $reverse ?> ">
    <div class="hero__left">
        <h1>
            <?= $heroText; ?>
        </h1>
        <p class="hero__subText">
            <?= $heroSubText;?>
        </p>

        <div class="button-group">
            <a href='<?= $primaryButtonUrl ?>' class="button button--primary" >
                <?= $primaryButtonText; ?>
            </a>
            <?php 
            if($secondaryButtonText !== '') {
                ?>
            <a href='<?= $secondaryButtonUrl ?>' class="button button--secondary" >
                <?= $secondaryButtonText; ?>
            </a>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="hero__right">
        <div class="hero__image">
            <img src="<?= $imagePath; ?>">
        </div>
    </div>
</div>