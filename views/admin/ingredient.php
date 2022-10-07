<div class="h-layout">
    <h1 class="alter-title">Admin</h1>
    <ul class="admin--menu">
        <li>
            <a href="/admin/recipe">Recipes</a>
        </li>
        <li>
            <a href="/admin/cook">Cooks</a>
        </li>
        <li class="active"> 
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
                    name
                </th>
                <th>
                    image-url
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
                    <a href="/ingredient/create" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><path d="M12 5v14M5 12h14"/></svg>
                    </a>
                </td>
                <td>
                    <a href="/ingredient/create" class="admin-button">
                        Add new ingredient
                    </a>
                </td>
            </tr>
            <?php foreach ($ingredients as $ingredient) { ?>
            <tr>
                <td>
                    <?= $ingredient->id ?>
                </td>
                <td>
                    <?= $ingredient->name ?>
                </td>
                <td>
                    <?= $ingredient->{'image-url'} ?>
                </td>
                <td>
                    <a href="/ingredient/update/<?=$ingredient->id?>" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </a>
                </td>
                <td>
                    <a class="admin-button remove-record-admin" id="ingredient-<?=$ingredient->id?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>

<script>

    const removeIngredient = async(e) => {
            let id = e.target.id || e.target.parentNode.id;
            id = id.split('-')[1];
            
            try {
                const response = await fetch('/api/deleteIngredient/' + id, {
                    method: 'DELETE',        
                });

                window.location.reload(true);                
            } catch (error) {
                console.error(error);
            }
        }

        const $removeIngredient = document.querySelectorAll('.remove-record-admin');
        $removeIngredient.forEach($element => {
            $element.addEventListener('click', removeIngredient);
        });
</script>