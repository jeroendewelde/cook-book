-- -----------------------------------------------------
-- Seeder cookbook
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `cookbook`.`categories`
-- -----------------------------------------------------
INSERT INTO `categories` (`name`)
VALUES

    ('meat'),
    ('kid friendly'),
    ('within 30min'),
    ('poultry'),
    ('low dairy'),
    ('gluten free'),
    ('spicy'),
    ('vegan')
;


-- -----------------------------------------------------
-- Table `cookbook`.`cooks`
-- -----------------------------------------------------
INSERT INTO `cooks` (`firstname`, `lastname`, `bio`, `quote`, `picture-url`)
VALUES
    (
        'Lieke', 
        'Johnson', 
        "I've always been in love with food: as a 3-year-old I was afraid that the kindergarten teachers wouldn't heat up my spinach purture properly, at the age of nine I baked my first soufflé and just before I was ten I cooked my first four-course dinner (including roasted pepper soup, cornbread and a classic chocolate cake). My obsession with cooking has never gone away and I eat my way through all kitchens. My style is best described as hedonistic with a conscience. I love decadent food in every flavor, but I also love cooking with vegetables — and vegetables can be decadent too!",
        'My cooking style is hedonistic with a conscience: I love decadent food in every flavor, but I also love cooking with vegetables — and vegetables can be decadent too!',
        '/images/cooks/women/7.jpeg'
    ),
    (
        'Matthias',
        'Parker',
        "Crossover cooking is my specialty. Thanks to the years of experience I have gained in various starred restaurants, I know how to get the best out of experimental, traditional and exotic cuisine and combine it into a new whole. My dishes don't lose focus - I also call it 'controlled taste explosion'!",
        "Both traditional and experimental - the mix does it!",
        '/images/cooks/men/70.jpeg'
    ),
    (
        'Pia',
        'Ferguson',
        "Cooking is the best way for me to let my creativity run wild. I love coming up with recipes, combining new flavor combinations and trying different cuisines. I go for vegetarian recipes, with seasonal products and tasty fresh ingredients.",
        "Good food makes you happy!",
        '/images/cooks/women/17.jpeg'
    ),
    (
        'Elisabeth',
        'Brown',
        'When coming up with recipes, three important elements come together: creativity, cooking and enjoyment. I love to play with classic techniques, new aromas and special combinations. Taste and freshness are of course of great importance. So be creative and have fun cooking!',
        'For me, cooking is the best way to discover the world and bring people together!',
        '/images/cooks/women/17.jpeg'
    ),
    (
        'Tamara',
        'McKenzie',
        "For my recipes I was inspired by my travels (I've lived in five countries!) and the daily 'rut' of searching the fridge for the right ingredients to prepare a good meal for two hungry children in 20 minutes. to make. The Dutch weather always makes me feel like comfort food. Super-cheesy classics, worldly flavors and sometimes a lighter version - you'll find them all with me.",
        "Getting friends and family to the table is fantastic, and with delicious food it's even easier!",
        '/images/cooks/women/73.jpeg'
    )
;

-- -----------------------------------------------------
-- Table `cookbook`.`recipes`
-- -----------------------------------------------------
INSERT INTO `recipes` (`title`, `teaser-text`, `image-url`, `preparation-time`, `level`, `amount-of-people`, `cooks_id`)
VALUES
(
    'Spaghetti with goulash meatballs',
    'Today you are a variety of the American classic Spaghetti & Meatballs. You do that by giving the whole an Eastern European touch. You spice the meatballs with goulash spices and the tomato sauce with cumin. You serve a yogurt dip with garlic brief look and finally mushrooms should not be missing.',
    '/recipes/1/teaser.jpeg',
    40,
    2,
    2,
    1
),
(
    'Fast stir-fry with chicken',
    'A fast Asian stir-fry is always easy and tasty. Crispy baked vegetables with talse chicken fillet, delicious noodles and a spicy soy sauce. A real classic that it always does well!',
    '/recipes/2/teaser.jpeg',
    20,
    4,
    2,
    2
),
(
    'Folded Chili Con Carne',
    "A savory, well-filled Chili Con Carne is always a good idea. Every time we make it, we wonder why we don't eat this every day. This version has extra vegetables and is served on basmati rice and a generous amount of fresh crème fraîche.",
    '/recipes/3/teaser.jpeg',
    20,
    6,
    2,
    2
),
(
    'Dandan noodles with beef pasted',
    'Dandan noodles are originally from China, from the Szechuan region. The name refers to the street vendors who sold this dish to a special carrying stick, a Dandan, on the market. The dishes from this region are known for their spirit, but no worries: you decide how much sambal you add.',
    '/recipes/4/teaser.jpeg',
    20,
    8,
    2,
    3
),
(
    'Spicy curry rice balls',
    'Today you do make a very special variant on the Thai curry. In the creamy curry of spinach and carrot you serve crispy baked rice balls. The rice is not a side dish, but the central element. It takes a little more time to make the balls - you still have to cook the rice and let it cool down - but you get a special treat for that!',
    '/recipes/5/teaser.jpeg',
    30,
    2,
    2,
    4
),
(
    'Sloppy Joes from black beans',
    "The Sloppy Joe, the American Streetfood classic, is originally made with minced meat. Today the Vegan version is on the menu. You make 'em with black beans, onions and celery. The BBQ sauce and cajun spices ensure extra pit. If fresh contrast, you serve a colorful salad with jalapeño-mayodressing and smoked almonds. Yum!",
    '/recipes/6/teaser.jpeg',
    20,
    4,
    2,
    4
),
(
    'Chili con carne from pork pasture',
    'Chili Con Carne is an all time favorite, also under the Marley Spoon-Chefs. And that is why we found it high time for a new version. Chef Elisabeth transformed the famous recipe into a delicious creamy stew of potatoes and corn that takes you tops with a tomato stove of Mexican herbs and pork.',
    '/recipes/7/teaser.jpeg',
    30,
    2,
    2,
    5
),
(
    'Malaysian meat pan',
    'This Malaysian minced meat dish is really packed with taste! You first make your own herbal paste of lime grass, garlic, rendang spices and tamarind, and you fry the minced meat in RUL. Then you also turn a quick peanut sauce together with the rest of the tamarind. And the whole is also served at fragrant jasmine rice.',
    '/recipes/8/teaser.jpeg',
    20,
    6,
    2,
    2
),
(
    'Spaghetti Al Pollo',
    'We love zucchini. Honestly, the taste is not particularly spoken, but that makes it so versatile! Cooking, baking, grilling, slices, grated or in ribbons by a salad; You can really go on all sides. Today we mix it through a delicious creamy pasta sauce for an extra portion of vegetables.',
    '/recipes/9/teaser.jpeg',
    20,
    2,
    2,
    2
)
;


-- -----------------------------------------------------
-- Table `cookbook`.`recipe_has_categories`
-- -----------------------------------------------------
INSERT INTO `recipe_has_categories` (`recipes_id`, `categories_id`)
VALUES
    (1,1),
    (1,2),
    (2,2),
    (2,3),
    (2,4),
    (2,5),
    (3,1),
    (3,2),
    (3,3),
    (3,6),
    (4,1),
    (4,3),
    (4,5),
    (4,7),
    (5,5),
    (5,7),
    (5,8),
    (6,3),
    (6,5),
    (6,7),
    (6,8),
    (7,1),
    (7,3),
    (7,5),
    (7,6),
    (7,7),
    (8,1),
    (8,3),
    (8,5),
    (8,6),
    (9,2),
    (9,3),
    (9,4)
;




-- -----------------------------------------------------
-- Table `cookbook`.`ingredients`
-- -----------------------------------------------------
INSERT INTO `ingredients` (`name`, `image-url`)
VALUES
    ('yoghurt', '/ingredients/yoghurt.jpeg'),
    ('garlic chive', '/ingredients/garlic_chive.jpeg'),
    ('mushroom', '/ingredients/mushroom.jpeg'),
    ('spaghetti', '/ingredients/spaghetti.jpeg'),
    ('goulash-spice', '/ingredients/goulash_spice.jpeg'),
    ('minced beef and pork', '/ingredients/minced_beef_and_pork.jpeg'),
    ('caraway seeds', '/ingredients/caraway_seeds.jpeg'),
    ('tomato puree', '/ingredients/tomato_puree.jpeg'),
    ('carrot', '/ingredients/carrot.jpeg'),
    ('onion', '/ingredients/onion.jpeg'),
    ('soy sauce', '/ingredients/soy_sauce.jpeg'),
    ('garlic clove', '/ingredients/garlic_clove.jpeg'),
    ('fresh ginger', '/ingredients/fresh_ginger.jpeg'),
    ('red onion', '/ingredients/red_onion.jpeg'),
    ('spring onion', '/ingredients/spring_onion.jpeg'),
    ('green bell pepper', '/ingredients/green_bell_pepper.jpeg'),
    ('red bell pepper', '/ingredients/red_bell_pepper.jpeg'),
    ('chicken breast', '/ingredients/chicken_breast.jpeg'),
    ('noodles', '/ingredients/noodles.jpeg'),
    ('créme frache', '/ingredients/créme_frache.jpeg'),
    ('kidney beans', '/ingredients/kidney_beans.jpeg'),
    ('vegetable stock powder', '/ingredients/vegetable_stock_powder.jpeg'),
    ('mexican herbs', '/ingredients/mexican_herbs.jpeg'),
    ('minced beef', '/ingredients/minced_beef.jpeg'),
    ('green pepper', '/ingredients/green_pepper.jpeg'),
    ('basmatti rice', '/ingredients/basmatti_rice.jpeg'),
    ('fresh coriander', '/ingredients/fresh_coriander.jpeg'),
    ('chinese five spice mix', '/ingredients/chinese_five_spice.jpeg'),
    ('sambal oelek', '/ingredients/sambal_oelek.jpeg'),
    ('hoisinsauce', '/ingredients/hoisinsauce.jpeg'),
    ('fresh udon noodles', '/ingredients/fresh_udon_noodles.jpeg'),
    ('mini cucumber', '/ingredients/mini_cucumber.jpeg'),
    ('pak choi', '/ingredients/pak_choi.jpeg'),
    ('lime', '/ingredients/lime.jpeg'),
    ('coconut milk', '/ingredients/coconut_milk.jpeg'),
    ('yellow curry paste', '/ingredients/yellow_curry_paste.jpeg'),
    ('baby spinach', '/ingredients/baby_spinach.jpeg'),
    ('mesclun', '/ingredients/mesclun.jpeg'),
    ('burger buns', '/ingredients/burger_buns.jpeg'),
    ('vegan mayonnaise', '/ingredients/vegan_mayonnaise.jpeg'),
    ('red jalapeño pepper', '/ingredients/red_jalapeño_pepper.jpeg'),
    ('smoked almonds', '/ingredients/smoked_almonds.jpeg'),
    ('cherry tomatoes', '/ingredients/cherry_tomatoes.jpeg'),
    ('cajun spices', '/ingredients/cajun_spices.jpeg'),
    ('BBQ sauce', '/ingredients/BBQ_sauce.jpeg'),
    ('black beans', '/ingredients/black_beans.jpeg'),
    ('stalk celery', '/ingredients/stalk_celery.jpeg'),
    ('corn', '/ingredients/corn.jpeg'),
    ('beef stock powder', '/ingredients/beef_stock_powder.jpeg'),
    ('minced pork', '/ingredients/minced_pork.jpeg'),
    ('tomatoes', '/ingredients/tomatoes.jpeg'),
    ('floury potatoes', '/ingredients/floury_potatoes.jpeg'),
    ('salted peanuts', '/ingredients/salted_peanuts.jpeg'),
    ('tamarind paste', '/ingredients/tamarind_paste.jpeg'),
    ('stalk lemongrass', '/ingredients/stalk_lemongrass.jpeg'),
    ('jasmin rice', '/ingredients/jasmin_rice.jpeg'),
    ('zucchini', '/ingredients/zucchini.jpeg'),
    ('hard cheese', '/ingredients/hard_cheese.jpeg'),
    ('vegetable stock powder', '/ingredients/vegetable_stock_powder.jpeg'),
    ('ras el hanout', '/ingredients/ras_el_hanout.jpeg'),
    ('fresh parsley', '/ingredients/fresh_parsley.jpeg'),
    ('rendang herbs', '/ingredients/rendang_herb.jpeg')
;

-- -----------------------------------------------------
-- Table `cookbook`.`conversion-type`
-- -----------------------------------------------------
INSERT INTO `conversion-type` (`name`, `grams`)
VALUES
    ('none', 1 ),
    ('cup', 250),
    ('tablespoon', 15),
    ('teaspoon', 5),
    ('spice-bag', 15),
    ('small can', 70),
    ('g',1),
    ('ml',1),
    ('small can', 30),
    ('can',400),
    ('piece',1),
    ('net',500),
    ('block',50),
    ('sachet',5),
    ('pack', 200)
;

-- -----------------------------------------------------
-- Table `cookbook`.`recipe_has_ingredients`
-- -----------------------------------------------------
INSERT INTO `recipe_has_ingredients` (`recipes_id`, `ingredients_id`, `conversion-type_id`, `quantity`)
VALUES
    (1,1,2,1),
    (1,2,7,10),
    (1,3,7,250),
    (1,4,7,250),
    (1,5,5,1),
    (1,6,1,250),
    (1,7,5,1),
    (1,8,6,1),
    (1,9,1,1),
    (1,10,1,1),
    (2,11,8,50),
    (2,12,1,1),
    (2,13,1,1),
    (2,14,1,1),
    (2,15,1,2),
    (2,17,1,1),
    (2,18,1,1),
    (2,19,7,250),
    (3,8,6,1),
    (3,9,1,1),
    (3,12,1,1),
    (3,14,1,1),
    (3,15,1,1),
    (3,16,1,1),
    (3,20,2,1),
    (3,21,10,1),
    (3,22,5,1),
    (3,23,5,1),
    (3,24,1,250),
    (3,26,7,150),
    (4,11,8,25),
    (4,12,1,1),
    (4,15,1,1),
    (4,24,7,250),
    (4,27,1,10),
    (4,28,5,1),
    (4,29,8,25),
    (4,30,8,50),
    (4,31,7,400),
    (4,32,1,1),
    (4,33,1,1),
    (5,3,7,250),
    (5,9,1,1),
    (5,11,8,25),
    (5,13,11,1),
    (5,14,1,1),
    (5,27,7,10),
    (5,34,1,1),
    (5,35,15,1),
    (5,36,7,20),
    (5,37,7,100),
    (5,26,7,150),
    
    (6,1,7,100),
    (6,39,1,2),
    (6,40,14,1),
    (6,41,1,1),
    (6,42,7,25),
    (6,43,7,150),
    (6,32,1,1),
    (6,44,5,1),
    (6,45,8,30),
    (6,8,9,1),
    (6,46,10,1),
    (6,47,1,1),
    (6,14,1,1),
    (7,27,7,10),
    (7,48,10,1),
    (7,49,5,1),
    (7,23,5,1),
    (7,50,7,250),
    (7,14,1,1),
    (7,21,10,1),
    (7,51,1,2),
    (7,52,12,1),
    (8,37,7,100),
    (8,53,7,50),
    (8,32,1,1),
    (8,17,1,1),
    (8,24,7,250),
    (8,54,14,2),
    (8,62,5,1),
    (8,12,1,1),
    (8,55,1,1),
    (8,15,1,1),
    (8,56,7,150),
    (9,20,2,1),
    (9,9,1,1),
    (9,57,1,1),
    (9,58,13,1),
    (9,59,5,1),
    (9,60,14,1),
    (9,18,1,1),
    (9,61,7,10),
    (9,12,1,1),
    (9,10,1,1),
    (9,4,7,250)
;

-- -----------------------------------------------------
-- Table `cookbook`.`recipe-steps`
-- -----------------------------------------------------
INSERT INTO `recipe-steps` (`step-number`, `title`, `body`, `image-url`, `recipes_id`)
VALUES
    (
        1, 
        'Cutting vegetables', 
        'Halve and peel the onion. Cut 1 half into wedges and finely chop the other half. Peel or scrub the carrot, cut it lengthwise through quarters and then into cubes.',
        '/recipes/1/steps/1.jpeg',
        1 
    ),
    (
        2, 
        'Create sauce', 
        'Put the tomato puree, the carrot and half of the cumin (or more as desired) in a small saucepan with 2. Bake for approx. 2 minutes on high heat and then add 300ml of water with the onions, 1 / 2tl honey or sugar, 1 / 2tl salt and a pinch of pepper. Turn the heat medium and simmer for approx. 15 min gently until the sauce has been sealed. Stir regularly.',
        '/recipes/1/steps/2.jpeg',
        1 
    ),
    (
        3, 
        'Meatballs roast', 
        'Mix the minced meat with the chopped onion, the goulash spices and 1 / 2tl salt. Knead good and form approx. 8 meatballs. Heat a large frying pan on medium to high heat with 1el olive oil and roast the balls in around 3 minutes. Turn the heat and roast the balls about 8 minutes until they are completely done. Stir on a plate and do not clean the pan.',
        '/recipes/1/steps/3.jpeg',
        1 
    ),
    (
        4, 
        'Create dip', 
        'Bring enough salted water for the pasta to the boil in a medium-sized saucepan. Cut the garlic brief look into thin rings and mix with the yogurt, 1tl honey or sugar, 1tl mustard and a pinch of salt. Cut the mushrooms in quarters.',
        '/recipes/1/steps/4.jpeg',
        1 
    ),
    (
        5, 
        'Cook pasta', 
        'Add the pasta to the boiling water and cook until al dente in 7-9 minutes. Spoon a cup of cooking water from the pan, drain the pasta and put back into the pan.',
        '/recipes/1/steps/5.jpeg',
        1 
    ),
    (
        6, 
        'Bake mushrooms', 
        'Heat the used frying pan on very high heat with 1el olive oil and bake the mushrooms in 5-6min brown. Turn the heat medium and add the meatballs, sauce and a dash of cooking water. Warm up the whole in 1-2min, add the pasta and mix well. Divide over the plates and serve with the yoghurt sauce.',
        '/recipes/1/steps/6.jpeg',
        1 
    ),
    (
        1, 
        'Prepare chicken', 
        'Bring enough salt water for the noodles to a boil in a medium saucepan. Pat the chicken breast dry and cut it into strips. Mix them with 1 tbsp vegetable oil and set aside.',
        '/recipes/2/steps/1.jpeg',
        2 
    ),
    (
        2, 
        'Cooking noodles', 
        'Add the noodles to the boiling water and cook until al dente for 3-5 minutes. Remove a cup of cooking water from the pan, drain the noodles and rinse with cold water.',
        '/recipes/2/steps/2.jpeg',
        2 
    ),
    (
        3, 
        'Prepare vegetables', 
        'Remove the core and cut the peppers into strips. Cut the spring onions into thin rings and keep some of the greenery aside for garnish. Halve, peel and cut the onion into thin strips. Peel the ginger , peel the garlic and chop both finely.',
        '/recipes/2/steps/3.jpeg',
        2 
    ),
    (
        4, 
        'Searing chicken', 
        'Heat a large frying pan or wok over high heat and fry the chicken strips for 2-3 minutes. Sprinkle with salt and pepper and remove from the pan. Return the pan to medium heat.',
        '/recipes/2/steps/4.jpeg',
        2 
    ),
    (
        5, 
        'Stir-fry vegetables', 
        'Add 1 tbsp oil and fry the bell pepper , spring onion , onion and ginger for 5-7 minutes. Season with salt and pepper and add the garlic , meat and soy sauce . Stir-fry for about 1 more minute.',
        '/recipes/2/steps/5.jpeg',
        2 
    ),
    (
        6, 
        'Finish the stir-fry', 
        'Stir the noodles into the stir-fry and heat briefly. Add a dash of cooking water to bind the sauce and taste if you want to add salt or pepper. Spoon the noodle stir-fry and sprinkle with the remaining spring onions.',
        '/recipes/2/steps/6.jpeg',
        2 
    ),
    (
        1, 
        'Cut onion', 
        'Bring 300ml lightly salted water to a boil in a medium saucepan. Peel and finely chop the onion and garlic .',
        '/recipes/3/steps/1.jpeg',
        3 
    ),
    (
        2, 
        'Cooking rice', 
        'Wash the rice thoroughly in a sieve. Add to the boiling water and bring to a boil again. Turn the heat to low, put a lid on the pan and cook the rice for 10-12 minutes. Remove the pan from the heat and let the rice rest covered.',
        '/recipes/3/steps/2.jpeg',
        3 
    ),
    (
        3, 
        'Cutting vegetables', 
        'Remove the core and cut the bell pepper into cubes. Peel or scrub the carrot , cut into quarters lengthwise and then into cubes.',
        '/recipes/3/steps/3.jpeg',
        3 
    ),
    (
        4, 
        'Fry minced meat', 
        'Heat a large saucepan over high heat with 1 tbsp olive oil. Brown and brown the minced meat for 2-3 minutes. Lower the heat, add the onion , bell pepper and carrot and cook for a further 2-3 minutes.',
        '/recipes/3/steps/4.jpeg',
        3 
    ),
    (
        5, 
        'Chilli cooking', 
        'Add the garlic and Mexican herbs to taste. Stir the tomato puree with the stock powder and 250 ml water through the chili . Add the beans with liquid , stir and let the chili simmer for 5-7 minutes. Season with salt, pepper and optional. more mexican spices .',
        '/recipes/3/steps/5.jpeg',
        3 
    ),
    (
        6, 
        'Finish & Serve', 
        'Cut the spring onion into thin rings. Serve the chili with the rice , garnish each bowl with 1 tbsp crème frache and sprinkle with the spring onions .',
        '/recipes/3/steps/6.jpeg',
        3 
    ),
    (
        1, 
        'Cutting vegetables', 
        'Cut the pak choi into thin strips. Cut the cucumber lengthwise into quarters, remove if necessary. the seeds and cut it into diagonal slices. Cut the spring onion into slanting rings. Peel and slice the garlic .',
        '/recipes/4/steps/1.jpeg',
        4 
    ),
    (
        2, 
        'Fry minced meat', 
        'Heat a large frying pan over high heat with 1 tbsp oil. Brown the minced meat for 4-5 minutes.',
        '/recipes/4/steps/2.jpeg',
        4 
    ),
    (
        3, 
        'Making herb sauce', 
        'Bring enough salted water for the noodles to a boil in a small saucepan. Mix the hoisin sauce , soy sauce , 1-2 tsp sambal and 1-2 tbsp water into a sauce . Add more sambal if you like it spicy.',
        '/recipes/4/steps/3.jpeg',
        4 
    ),
    (
        4, 
        'Cooking noodles', 
        'Add the noodles to the boiling water, turn the heat to low and cook for 1-2 minutes, stirring the noodles . Drain and let drain.',
        '/recipes/4/steps/4.jpeg',
        4 
    ),
    (
        5, 
        'Bake vegetables', 
        'Add the pak choi to the minced meat and fry for 1-2 minutes. Then add the cucumber , spring onion and garlic and stir. Pour in the sauce , mix well and remove the pan from the heat.',
        '/recipes/4/steps/5.jpeg',
        4 
    ),
    (
        6, 
        'Add noodles', 
        'Add the noodles and season the stir-fry with the Chinese 5-spice mix and optionally. the rest of the sambal . Finely chop the coriander incl. stalks . Serve the dandan noodles sprinkled with the coriander .',
        '/recipes/4/steps/6.jpeg',
        4 
    ),
    (
        1, 
        'Cooking rice', 
        'Preheat the oven to 240°C (220°C hot air). Bring 300ml lightly salted water to a boil in a small saucepan. Wash the rice thoroughly in a sieve. Add to the boiling water and bring to a boil again. Turn the heat to low, put a lid on the pan and cook the rice for 10-12 minutes. Remove the pan from the heat and let the rice rest covered.',
        '/recipes/5/steps/1.jpeg',
        5 
    ),
    (
        2, 
        'Prepare vegetables', 
        'Sort the spinach if necessary. and remove the tough stems, cut the spinach into strips. Brush the mushrooms if necessary. clean and cut into quarters. Peel and cut the onion into thin strips. Peel and finely chop or grate the ginger . Peel or scrub the carrot and slice it.',
        '/recipes/5/steps/2.jpeg',
        5 
    ),
    (
        3, 
        'Cooking curry', 
        'Heat a large frying pan or wok over medium heat with 1 tbsp oil. Saute the onion for 1-2 minutes until translucent. Add the ginger and fry for about 2 minutes. Add the carrot and 1-2 tsp curry paste and fry for about 1 minute . Deglaze with the coconut milk and 50 ml of water and let everything simmer for 15-20 minutes. Add the mushrooms halfway through the cooking time . Toss in the spinach at the end.',
        '/recipes/5/steps/3.jpeg',
        5 
    ),
    (
        4, 
        'Making rice balls', 
        'Rinse the rice in a sieve with cold water and drain. Mix the rice with 1-2 tsp curry paste and 1-2 tbsp flour and season with salt. Take 1 tbsp rice at a time and roll it into balls with damp hands .',
        '/recipes/5/steps/4.jpeg',
        5 
    ),
    (
        5, 
        'Bake rice balls', 
        'Divide the rice balls on a baking tray lined with baking paper and drizzle with 1-2 tsp oil. Bake the balls in the oven for about 10 minutes until golden brown and crispy. Turn them over once halfway through.',
        '/recipes/5/steps/5.jpeg',
        5 
    ),
    (
        6, 
        'Chop coriander', 
        'Pick the coriander leaves and chop coarsely. Cut the lemon into wedges. Season the curry with lime juice from the wedges as desired, half of the soy sauce and optionally. a pinch of salt and pepper. Spoon the curry with the rice balls on top. Sprinkle with the coriander and serve with the rest of the lime wedges.',
        '/recipes/5/steps/6.jpeg',
        5 
    ),
    (
        1, 
        'Cutting vegetables', 
        'Preheat the oven to 180°C (160°C hot air). Halve and peel the onion and finely chop. Cut the celery into small cubes. Rinse the black beans in a sieve with cold water and drain.',
        '/recipes/6/steps/1.jpeg',
        6 
    ),    
    (
        2, 
        'Making Filling', 
        'Heat a medium saucepan over medium-high heat with 1 tbsp oil. Fry the onion and celery with a pinch of salt for about 1 min. Add the beans , half of the tomato paste , BBQ sauce , half of the Cajun seasoning and 2 tbsp water. Simmer for 10-13 minutes over medium heat, until the celery is soft. Stir occasionally.',
        '/recipes/6/steps/2.jpeg',
        6 
    ),    
    (
        3, 
        'Prepare ingredients', 
        'Cut the mini cucumber in half lengthwise and then into thin slices. Halve the cherry tomatoes . Roughly chop the almonds . Slice 1/4 of the jalapeño pepper, or more to taste, into thin rings. Remove the seeds if you want it less spicy.',
        '/recipes/6/steps/3.jpeg',
        6 
    ),    
    (
        4, 
        'Making Dressing', 
        'Beat a creamy dressing of the vegan mayonnaise , the jalapeño pepper , 1-2 tbsp vinegar and 3 tbsp water. Taste and season with salt.',
        '/recipes/6/steps/4.jpeg',
        6 
    ),    
    (
        5, 
        'Baking sandwiches', 
        'Cut the citizen rolls open and bake them crisp in the oven for 2-3min. Rotate them if necessary. half way around.',
        '/recipes/6/steps/5.jpeg',
        6 
    ),    
    (
        6, 
        'Mix salad', 
        'Season the bean stew with salt, pepper and optionally. more cajun seasoning . Top the buns with the stew . Mix the salad with the cucumber slices , the cherry tomatoes and the dressing . Sprinkle the salad with the almonds , and serve it with the Sloppy Joes .',
        '/recipes/6/steps/6.jpeg',
        6 
    ),    
    (
        1, 
        'Slicing tomatoes', 
        'Bring enough salted water for the potatoes to a boil in a medium saucepan. Roughly chop the tomatoes .',
        '/recipes/7/steps/1.jpeg',
        7 
    ),
    (
        2, 
        'Prepare ingredients', 
        'Drain the beans and rinse them in a sieve. Peel and cut the onion into quarters. Cut 3/4th of the onion into thin strips.',
        '/recipes/7/steps/2.jpeg',
        7 
    ),
    (
        3, 
        'Boiling potatoes', 
        'Peel and halve the potatoes , cut larger ones in quarters. Add when the water is boiling and cook for 15-20 minutes. Remove a cup of cooking water from the pan and drain the potatoes . Keep warm in the pan.',
        '/recipes/7/steps/3.jpeg',
        7 
    ),
    (
        4, 
        'Cooking Chili', 
        'Heat a large skillet over medium heat with 1 tbsp olive oil. Add the onion strips , the minced meat and 1 tsp Mexican herbs . Bake for 3-4 minutes. Add the tomato , beans and half of the stock powder with 100ml of water. Place a lid on the pan and let the chili simmer for about 10 minutes.',
        '/recipes/7/steps/4.jpeg',
        7 
    ),
    (
        5, 
        'Mashing potatoes', 
        'Mash the potatoes into a creamy puree . Add some cooking water and Add a knob of butter for extra creaminess. Drain half of the corn (or more if you are very hungry) and fold through the mash . Taste to see if you want to add more salt and pepper.',
        '/recipes/7/steps/5.jpeg',
        7 
    ),
    (
        6, 
        'Finish stew', 
        'Chop the rest of the onion as finely as possible. Roughly chop the coriander incl . stalks and stir 3/4 through the puree . Serve the mashed potatoes with the chilli on top and sprinkle with the rest of the coriander and the finely chopped onion .',
        '/recipes/7/steps/6.jpeg',
        7 
    ),
    (
        1, 
        'Cooking rice', 
        'Bring 300ml lightly salted water to a boil in a small saucepan. Wash the rice thoroughly in a sieve. Add to the boiling water and bring to a boil again. Turn the heat to low, put a lid on the pan and cook the rice for 10-12 minutes. Remove the pan from the heat and let the rice rest covered.',
        '/recipes/8/steps/1.jpeg',
        8
    ),
    (
        2, 
        'Making spice paste', 
        'Cut the spring onion into 3-4 pieces. Crush the lemongrass with the flat side of your knife, remove the outer leaf and roughly chop. Peel and coarsely chop the garlic . Put the garlic , spring onion , lemon grass , rendang herbs , half of the tamarind , 2 tbsp oil and 1 tsp salt in a high (measuring) cup. Puree to a coarse spice paste .',
        '/recipes/8/steps/2.jpeg',
        8
    ),
    (
        3, 
        'Fry minced meat', 
        'Heat a large frying pan or wok over medium to high heat with 1 tbsp oil. Bake the spice paste for about 1 minute and then add the minced meat . Bake for 6-8 minutes until brown and loose.',
        '/recipes/8/steps/3.jpeg',
        8
    ),
    (
        4, 
        'Prepare vegetables', 
        'Remove the core and cut the bell pepper into thin strips. Add to the minced meat and cook for 3-4 minutes, until the bell pepper is softer. Place the cucumber on a cutting board and bruise with a heavy pan or meat beater until the skin breaks and the cucumber shatters into rough chunks. Then cut into bite-sized cubes.',
        '/recipes/8/steps/4.jpeg',
        8
    ),
    (
        5, 
        'Making peanut sauce', 
        'Place the peanuts in the used measuring cup with the rest of the tamarind , 1 tsp sugar, 1 tbsp oil and 2-3 tbsp water. Puree until smooth and add. Add some extra water if you think the sauce is too thick. Season with salt, pepper and sugar.',
        '/recipes/8/steps/5.jpeg',
        8
    ),
    (
        6, 
        'Add spinach', 
        'Remove the meatloaf from the heat, add the spinach and let it wilt. Add half of the peanut sauce and taste if you want to add more salt and pepper. Divide the rice between bowls or deep plates and serve the mincemeat mixture on top. Garnish with the smashed cucumber and sprinkle with the rest of the peanut sauce .',
        '/recipes/8/steps/6.jpeg',
        8
    ),
    (
        1, 
        'Cut onion', 
        'Bring enough salted water for the pasta to a boil in a medium saucepan. Peel and finely chop the onion and garlic . Also finely chop the parsley incl. stalks .',
        '/recipes/9/steps/1.jpeg',
        9
    ),
    (
        2, 
        'Roast chicken', 
        'Pat the chicken breast dry and cut it into cubes. Toss with the ras el hanout and 1 tbsp olive oil. Heat a large frying pan or wok over medium heat and sear the chicken pieces on all sides for 2-3 minutes. Add the onion and garlic and fry for 2-3 minutes.',
        '/recipes/9/steps/2.jpeg',
        9
    ),
    (
        3, 
        'Set up sauce', 
        'Pour 200-250ml of water into the pan and stir in half of the stock powder. Bring to the boil and let the sauce simmer for 8-10 minutes. Meanwhile, finely grate the cheese .',
        '/recipes/9/steps/3.jpeg',
        9
    ),
    (
        4, 
        'Cooking pasta', 
        'Add the pasta to the boiling water and cook for 7-9 minutes. Remove a cup of cooking water from the pan and drain the pasta in a sieve or colander. Let it drain.',
        '/recipes/9/steps/4.jpeg',
        9
    ),
    (
        5, 
        'Grate vegetables', 
        'Coarsely grate the zucchini and carrot . Heat the used saucepan over medium heat with 1 tbsp olive oil and fry the zucchini and carrot for 2-3 minutes.',
        '/recipes/9/steps/5.jpeg',
        9
    ),
    (
        6, 
        'Finish Pasta', 
        'Add the crème frache and parsley to the sauce in the frying pan and taste if you want to add more salt and pepper. Add the sauce with the pasta to the saucepan with vegetables and mix well. Add some cooking water to thicken the sauce and serve.',
        '/recipes/9/steps/6.jpeg',
        9
    )

;
