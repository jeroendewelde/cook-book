<div class="h-layout">
    <h1 class="alter-title">Admin</h1>

    <ul class="admin--menu">
        <li>
            <a href="/admin/recipe">Recipes</a>
        </li>
        <li class="active"> 
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
                    firstname
                </th>
                <th>
                    lastname
                </th>
                <th>
                    bio
                </th>
                <th>
                    quote
                </th>
                <th>
                    picture-url
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
                    <a href="/cook/create" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><path d="M12 5v14M5 12h14"/></svg>
                    </a>
                </td>
                <td>
                    <a href="/cook/create" class="admin-button">
                        Add new cook
                    </a>
                </td>
            </tr>
            <?php foreach ($cooks as $cook) { ?>
            <tr>
                <td>
                    <?= $cook->id ?>
                </td>
                <td>
                    <?= $cook->firstname ?>
                </td>
                <td>
                    <?= $cook->lastname ?>
                </td>
                <td>
                    <?= $cook->getShortBio() ?>
                </td>
                <td>
                    <?= $cook->getShortQuote() ?>
                </td>
                <td>
                    <?= $cook->getOnlyFileName()?>
                </td>
                <td>
                    <a href="/cook/update/<?=$cook->id?>" class="admin-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </a>
                </td>
                <td>
                    <a class="admin-button remove-record-admin" id="cook-<?=$cook->id?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>

<script>
    const removeCook = async(e) => {
        let id = e.target.id || e.target.parentNode.id;
        id = id.split('-')[1];
            try {
                const response = await fetch('/api/deleteCook/' + id, {
                    method: 'DELETE'             
                });
                window.location.reload(true);
                
            } catch (error) {
                console.error(error);
            }
        }

        const $removeCook = document.querySelectorAll('.remove-record-admin');
        $removeCook.forEach($element => {
            $element.addEventListener('click', removeCook);
        });
</script>