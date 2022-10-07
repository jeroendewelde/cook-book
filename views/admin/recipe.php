<div class="h-layout">
    <h1 class="alter-title">Admin</h1>
    <ul class="admin--menu">
        <li class="active"> 
            <a href="/admin/recipe">Recipes</a>
        </li>
        <li>
            <a href="/admin/cook">Cooks</a>
        </li>
        <li>
            <a href="/admin/ingredient">Ingredients</a>
        </li>
        <li>
            <a href="/admin">Dashboard</a>
        </li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th>
                    id
                </th>
                <th>
                    title
                </th>
                <th>
                    teaser-text
                </th>
                <th>
                    image-url
                </th>
                <th>
                    preparation-time
                </th>
                <th>
                    level
                </th>
                <th>
                    amount-of-people
                </th>
                <th>
                    cooks_id
                </th>
                <th>
                    
                </th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="new-record" >
                <td>
                    <a href="/recipe/create" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><path d="M12 5v14M5 12h14"/></svg>
                    </a>
                </td>
                <td>
                    <a href="/recipe/create" class="admin-button">
                        Add new recipe
                    </a>
                </td>
            </tr>
            <?php foreach ($recipes as $recipe) { ?>
            <tr>
                <td>
                    <?= $recipe->id ?>
                </td>
                <td>
                    <?= $recipe->title ?>
                </td>
                <td>
                    <?= $recipe->getShortTeaserText() ?>
                </td>
                <td>
                    <?= $recipe->getImageUrl() ?>
                </td>
                <td>
                    <?= $recipe->{'preparation-time'} ?>
                </td>
                <td>
                    <?= $recipe->level ?>
                </td>
                <td>
                    <?= $recipe->{'amount-of-people'}?>
                </td>
                <td>
                    <?= $recipe->cooks_id ?>
                </td>
                <td>
                    <a href="/recipe/update/<?=$recipe->id?>" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </a>
                </td>
                <td>
                    <a class="admin-button remove-record-admin" id="recipe-<?=$recipe->id?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </a>
                </td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>

<script>
    const removeRecipe = async(e) => {
        let id = e.target.id || e.target.parentNode.id;
        id = id.split('-')[1];
            try {
                const response = await fetch('/api/deleteRecipe/' + id, {
                    method: 'DELETE',
                });


                window.location.reload(true);
                
            } catch (error) {
                console.error(error);
            }
        }

        const $removeCook = document.querySelectorAll('.remove-record-admin');
        $removeCook.forEach($element => {
            $element.addEventListener('click', removeRecipe);
        });
</script>