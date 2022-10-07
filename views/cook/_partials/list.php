<li class="cook__item--list">
    <a>
        <div class="cook__item--list__image">
            
            <!-- <img src="<?= $pathToImage;  ?>" alt="picture of <?= $item['firstname'] ?>"> -->
            <img src="/resources<?= $item['picture-url'];  ?>" alt="picture of <?= $item['firstname'] ?>">
        </div>
        <div class="cook__item--list__content">
            <div class="cook__item--list__name">
                <?= $item['firstname'] . ' ' . $item['lastname']; ?>    
                <!-- firstname
                lastname -->
            </div>
            <div class="cook__item--list__quote">
                quote
            </div>
        </div>
    </a>
<li>